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
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Validate input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required|min_length[3]',
            'password' => 'required|min_length[6]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Please check your input and try again.')
                ->with('validation_errors', $validation->getErrors());
        }

        // Authenticate user
        $user = $this->userModel->authenticateUser($username, $password);

        if ($user) {
            // Set session data
            $sessionData = [
                'user_id' => $user['id'],
                'username' => $user['username'],
                'logged_in' => true
            ];
            
            $this->session->set($sessionData);

            return redirect()->to(base_url())
                ->with('success', 'Welcome back, ' . $user['username'] . '!');
        } else {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Invalid username or password.');
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
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $confirmPassword = $this->request->getPost('confirm_password');

        // Validate input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required|min_length[3]|max_length[50]|is_unique[users.username]',
            'password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]'
        ], [
            'username' => [
                'required' => 'Username is required',
                'min_length' => 'Username must be at least 3 characters long',
                'max_length' => 'Username cannot exceed 50 characters',
                'is_unique' => 'Username already exists'
            ],
            'password' => [
                'required' => 'Password is required',
                'min_length' => 'Password must be at least 6 characters long'
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

        // Create user
        $userData = [
            'username' => $username,
            'password' => $password
        ];

        $userId = $this->userModel->createUser($userData);

        if ($userId) {
            return redirect()->to(base_url('auth/login'))
                ->with('success', 'Registration successful! Please login with your credentials.');
        } else {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Registration failed. Please try again.');
        }
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