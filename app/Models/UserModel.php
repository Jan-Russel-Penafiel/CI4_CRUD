<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $validationRules = [
        'username' => 'required|min_length[3]|max_length[50]|is_unique[users.username]|alpha_numeric_punct',
        'password' => 'required|min_length[6]|max_length[255]'
    ];

    protected $validationMessages = [
        'username' => [
            'required' => 'Username is required',
            'min_length' => 'Username must be at least 3 characters long',
            'max_length' => 'Username cannot exceed 50 characters',
            'is_unique' => 'Username already exists',
            'alpha_numeric_punct' => 'Username can only contain letters, numbers, and basic punctuation'
        ],
        'password' => [
            'required' => 'Password is required',
            'min_length' => 'Password must be at least 6 characters long',
            'max_length' => 'Password cannot exceed 255 characters'
        ]
    ];

    /**
     * Create a new user with hashed password
     *
     * @param array $data
     * @return bool|int
     */
    public function createUser(array $data)
    {
        // Validate password strength
        if (isset($data['password'])) {
            $this->validatePasswordStrength($data['password']);
            
            // Hash the password using bcrypt with cost factor 12 for enhanced security
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT, ['cost' => 12]);
        }

        return $this->insert($data);
    }

    /**
     * Authenticate user credentials with enhanced security
     *
     * @param string $username
     * @param string $password
     * @return array|false
     */
    public function authenticateUser(string $username, string $password)
    {
        // Clean and validate input
        $username = trim($username);
        
        if (empty($username) || empty($password)) {
            return false;
        }

        $user = $this->where('username', $username)->first();
        
        if ($user && password_verify($password, $user['password'])) {
            // Check if password needs rehashing (for security upgrades)
            if (password_needs_rehash($user['password'], PASSWORD_BCRYPT, ['cost' => 12])) {
                $this->update($user['id'], [
                    'password' => password_hash($password, PASSWORD_BCRYPT, ['cost' => 12])
                ]);
            }
            
            // Remove sensitive data from returned user
            unset($user['password']);
            return $user;
        }

        return false;
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
            $errors[] = 'Password must contain at least one special character';
        }

        if (!empty($errors)) {
            throw new \Exception('Password strength validation failed: ' . implode(', ', $errors));
        }

        return true;
    }

    /**
     * Get user by username
     *
     * @param string $username
     * @return array|null
     */
    public function getUserByUsername(string $username)
    {
        return $this->where('username', $username)->first();
    }

    /**
     * Check if username exists
     *
     * @param string $username
     * @return bool
     */
    public function usernameExists(string $username): bool
    {
        return $this->where('username', $username)->countAllResults() > 0;
    }

    /**
     * Update user password
     *
     * @param int $userId
     * @param string $newPassword
     * @return bool
     */
    public function updatePassword(int $userId, string $newPassword): bool
    {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        return $this->update($userId, ['password' => $hashedPassword]);
    }
}