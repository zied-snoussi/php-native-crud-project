<?php
/**
 * Validator class for input validation
 */
class Validator {
    private $errors = [];
    
    /**
     * Validate user data
     * 
     * @param array $userData
     * @return array
     */
    public function validateUser($userData) {
        $this->errors = [];
        
        // Validate name
        if (empty($userData['name'])) {
            $this->errors['name'] = 'Name is required';
        } elseif (strlen($userData['name']) < 2) {
            $this->errors['name'] = 'Name must be at least 2 characters';
        } elseif (strlen($userData['name']) > 100) {
            $this->errors['name'] = 'Name cannot exceed 100 characters';
        }
        
        // Validate email
        if (empty($userData['email'])) {
            $this->errors['email'] = 'Email is required';
        } elseif (!filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = 'Please enter a valid email address';
        } elseif (strlen($userData['email']) > 100) {
            $this->errors['email'] = 'Email cannot exceed 100 characters';
        }
        
        // Validate phone (optional but must be valid if provided)
        if (!empty($userData['phone'])) {
            // Simple regex for phone validation
            if (!preg_match('/^[0-9+\-\s()]{7,20}$/', $userData['phone'])) {
                $this->errors['phone'] = 'Please enter a valid phone number';
            }
        }
        
        // Validate role
        if (empty($userData['role'])) {
            $this->errors['role'] = 'Role is required';
        } elseif (!in_array($userData['role'], ['admin', 'manager', 'user'])) {
            $this->errors['role'] = 'Please select a valid role';
        }
        
        return $this->errors;
    }
    
    /**
     * Check if data has validation errors
     * 
     * @return bool
     */
    public function hasErrors() {
        return !empty($this->errors);
    }
    
    /**
     * Get validation errors
     * 
     * @return array
     */
    public function getErrors() {
        return $this->errors;
    }
    
    /**
     * Get error for a specific field
     * 
     * @param string $field
     * @return string|null
     */
    public function getError($field) {
        return $this->errors[$field] ?? null;
    }
    
    /**
     * Sanitize input
     * 
     * @param string $input
     * @return string
     */
    public function sanitize($input) {
        return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
    }
}