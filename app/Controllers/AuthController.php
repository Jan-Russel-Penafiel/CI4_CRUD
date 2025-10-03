<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    protected $userModel;
    protected $session;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->session = \Config\Services::session();
    }

    /**
     * Display login form
     */
    public function login()
    {
        // If user is already logged in, redirect to dashboard
        if ($this->session->get('user_id')) {
            return redirect()->to(base_url());
        }

        $data = [
            'show_login' => true,
            'title' => 'Login - Products Management'
        ];

        return view('index', $data);
    }

    /**
     * Process login form submission
     */
    public function processLogin()
    {
        // Get and sanitize input
        $username = trim($this->request->getPost('username'));
        $password = $this->request->getPost('password');

        // Validate input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required|min_length[3]|max_length[50]',
            'password' => 'required|min_length[6]'
        ], [
            'username' => [
                'required' => 'Username is required',
                'min_length' => 'Username must be at least 3 characters long',
                'max_length' => 'Username cannot exceed 50 characters'
            ],
            'password' => [
                'required' => 'Password is required',
                'min_length' => 'Password must be at least 6 characters long'
            ]
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Please check your input and try again.')
                ->with('validation_errors', $validation->getErrors());
        }

        // Check for empty fields (additional security)
        if (empty($username) || empty($password)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Please fill in all required fields.');
        }

        try {
            // Authenticate user using bcrypt verification
            $user = $this->userModel->authenticateUser($username, $password);

            if ($user) {
                // Set session data for successful login
                $sessionData = [
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'logged_in' => true,
                    'login_time' => time(),
                    'last_activity' => time()
                ];
                
                $this->session->set($sessionData);

                // Log successful login (optional)
                log_message('info', 'User ' . $user['username'] . ' logged in successfully from IP: ' . $this->request->getIPAddress());

                return redirect()->to(base_url())
                    ->with('success', 'Welcome back, ' . $user['username'] . '!');
            } else {
                // Log failed login attempt
                log_message('warning', 'Failed login attempt for username: ' . $username . ' from IP: ' . $this->request->getIPAddress());
                
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Invalid username or password. Please check your credentials and try again.');
            }
        } catch (\Exception $e) {
            log_message('error', 'Login error: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'An error occurred during login. Please try again.');
        }
    }

    /**
     * Display registration form
     */
    public function register()
    {
        // If user is already logged in, redirect to dashboard
        if ($this->session->get('user_id')) {
            return redirect()->to(base_url());
        }

        $data = [
            'title' => 'Register - Products Management'
        ];

        return view('register', $data);
    }

    /**
     * Process registration form submission
     */
    public function processRegister()
    {
        // Get and sanitize input
        $username = trim($this->request->getPost('username'));
        $password = $this->request->getPost('password');
        $confirmPassword = $this->request->getPost('confirm_password');

        // Validate input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required|min_length[3]|max_length[50]|is_unique[users.username]|alpha_numeric_punct',
            'password' => 'required|min_length[6]|max_length[255]',
            'confirm_password' => 'required|matches[password]'
        ], [
            'username' => [
                'required' => 'Username is required',
                'min_length' => 'Username must be at least 3 characters long',
                'max_length' => 'Username cannot exceed 50 characters',
                'is_unique' => 'Username already exists. Please choose a different username.',
                'alpha_numeric_punct' => 'Username can only contain letters, numbers, and basic punctuation'
            ],
            'password' => [
                'required' => 'Password is required',
                'min_length' => 'Password must be at least 6 characters long',
                'max_length' => 'Password cannot exceed 255 characters'
            ],
            'confirm_password' => [
                'required' => 'Please confirm your password',
                'matches' => 'Passwords do not match'
            ]
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Please check your input and try again.')
                ->with('validation_errors', $validation->getErrors());
        }

        // Additional password strength validation
        try {
            $this->validatePasswordStrength($password);
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', $e->getMessage());
        }

        // Check for empty fields (additional security)
        if (empty($username) || empty($password) || empty($confirmPassword)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Please fill in all required fields.');
        }

        try {
            // Create user with bcrypt hashed password
            $userData = [
                'username' => $username,
                'password' => $password
            ];

            $userId = $this->userModel->createUser($userData);

            if ($userId) {
                // Log successful registration
                log_message('info', 'New user registered: ' . $username . ' from IP: ' . $this->request->getIPAddress());

                return redirect()->to(base_url('auth/login'))
                    ->with('success', 'Registration successful! Your account has been created with secure password encryption. Please login with your credentials.');
            } else {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Registration failed. Please try again.');
            }
        } catch (\Exception $e) {
            log_message('error', 'Registration error: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }

    /**
     * Validate password strength
     *
     * @param string $password
     * @return bool
     * @throws \Exception
     */
    private function validatePasswordStrength(string $password): bool
    {
        $errors = [];

        // Check minimum length
        if (strlen($password) < 6) {
            $errors[] = 'Password must be at least 6 characters long';
        }

        // Check for at least one uppercase letter
        if (!preg_match('/[A-Z]/', $password)) {
            $errors[] = 'Password must contain at least one uppercase letter';
        }

        // Check for at least one lowercase letter
        if (!preg_match('/[a-z]/', $password)) {
            $errors[] = 'Password must contain at least one lowercase letter';
        }

        // Check for at least one number
        if (!preg_match('/[0-9]/', $password)) {
            $errors[] = 'Password must contain at least one number';
        }

        // Check for at least one special character
        if (!preg_match('/[^A-Za-z0-9]/', $password)) {
            $errors[] = 'Password must contain at least one special character (!@#$%^&*)';
        }

        if (!empty($errors)) {
            throw new \Exception('Password requirements not met: ' . implode(' • ', $errors));
        }

        return true;
    }

    /**
     * Logout user
     */
    public function logout()
    {
        $this->session->destroy();
        
        return redirect()->to(base_url('auth/login'))
            ->with('success', 'You have been logged out successfully.');
    }

    /**
     * Check if user is authenticated (AJAX endpoint)
     */
    public function checkAuth()
    {
        $isLoggedIn = $this->session->get('logged_in') ? true : false;
        
        return $this->response->setJSON([
            'authenticated' => $isLoggedIn,
            'user_id' => $this->session->get('user_id'),
            'username' => $this->session->get('username')
        ]);
    }

    /**
     * Middleware to check if user is authenticated
     */
    public function isAuthenticated()
    {
        return $this->session->get('logged_in') ? true : false;
    }
}