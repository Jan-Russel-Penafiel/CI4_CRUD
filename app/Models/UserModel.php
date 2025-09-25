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
        'username' => 'required|min_length[3]|max_length[50]|is_unique[users.username]',
        'password' => 'required|min_length[6]'
    ];

    protected $validationMessages = [
        'username' => [
            'required' => 'Username is required',
            'min_length' => 'Username must be at least 3 characters long',
            'max_length' => 'Username cannot exceed 50 characters',
            'is_unique' => 'Username already exists'
        ],
        'password' => [
            'required' => 'Password is required',
            'min_length' => 'Password must be at least 6 characters long'
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
        // Hash the password before storing
        if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }

        return $this->insert($data);
    }

    /**
     * Authenticate user credentials
     *
     * @param string $username
     * @param string $password
     * @return array|false
     */
    public function authenticateUser(string $username, string $password)
    {
        $user = $this->where('username', $username)->first();
        
        if ($user && password_verify($password, $user['password'])) {
            // Remove password from returned data
            unset($user['password']);
            return $user;
        }

        return false;
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