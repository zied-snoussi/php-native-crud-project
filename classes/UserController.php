<?php
/**
 * UserController class for handling business logic
 */
class UserController {
    private $userRepository;
    
    /**
     * Class constructor
     * 
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }
    
    /**
     * Get users with pagination and search
     * 
     * @param int $page
     * @param int $limit
     * @param string $search
     * @return array
     */
    public function getUsers($page = 1, $limit = 10, $search = '') {
        $users = $this->userRepository->getAll($page, $limit, $search);
        $result = [];
        
        foreach ($users as $userData) {
            $result[] = new User($userData);
        }
        
        return $result;
    }
    
    /**
     * Get total users count
     * 
     * @param string $search
     * @return int
     */
    public function getTotalUsers($search = '') {
        return $this->userRepository->count($search);
    }
    
    /**
     * Get a user by ID
     * 
     * @param int $id
     * @return User|null
     */
    public function getUserById($id) {
        $userData = $this->userRepository->getById($id);
        
        if (!$userData) {
            return null;
        }
        
        return new User($userData);
    }
    
    /**
     * Create a new user
     * 
     * @param array $userData
     * @return int
     */
    public function createUser($userData) {
        return $this->userRepository->create($userData);
    }
    
    /**
     * Update an existing user
     * 
     * @param array $userData
     * @return bool
     */
    public function updateUser($userData) {
        return $this->userRepository->update($userData);
    }
    
    /**
     * Delete a user
     * 
     * @param int $id
     * @return bool
     */
    public function deleteUser($id) {
        return $this->userRepository->delete($id);
    }
    
    /**
     * Check if email exists
     * 
     * @param string $email
     * @param int|null $userId
     * @return bool
     */
    public function emailExists($email, $userId = null) {
        return $this->userRepository->emailExists($email, $userId);
    }
    
    /**
     * Format date for display
     * 
     * @param string $dateString
     * @return string
     */
    public function formatDate($dateString) {
        if (!$dateString) {
            return '';
        }
        
        $date = new DateTime($dateString);
        return $date->format('M d, Y h:i A');
    }
    
    /**
     * Get user roles as options for select
     * 
     * @param string $selectedRole
     * @return string
     */
    public function getRoleOptions($selectedRole = '') {
        $roles = [
            'admin' => 'Administrator',
            'manager' => 'Manager',
            'user' => 'Regular User'
        ];
        
        $options = '';
        foreach ($roles as $value => $label) {
            $selected = ($value === $selectedRole) ? 'selected' : '';
            $options .= "<option value=\"{$value}\" {$selected}>{$label}</option>";
        }
        
        return $options;
    }
}