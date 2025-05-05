<?php
/**
 * User class for user entity
 */
class User {
    private $id;
    private $name;
    private $email;
    private $phone;
    private $role;
    private $created_at;
    private $updated_at;
    
    /**
     * Class constructor
     * 
     * @param array $userData
     */
    public function __construct($userData = []) {
        $this->id = $userData['id'] ?? null;
        $this->name = $userData['name'] ?? null;
        $this->email = $userData['email'] ?? null;
        $this->phone = $userData['phone'] ?? null;
        $this->role = $userData['role'] ?? null;
        $this->created_at = $userData['created_at'] ?? null;
        $this->updated_at = $userData['updated_at'] ?? null;
    }
    
    /**
     * Get user ID
     * 
     * @return int
     */
    public function getId() {
        return $this->id;
    }
    
    /**
     * Set user ID
     * 
     * @param int $id
     * @return User
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }
    
    /**
     * Get user name
     * 
     * @return string
     */
    public function getName() {
        return $this->name;
    }
    
    /**
     * Set user name
     * 
     * @param string $name
     * @return User
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }
    
    /**
     * Get user email
     * 
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }
    
    /**
     * Set user email
     * 
     * @param string $email
     * @return User
     */
    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }
    
    /**
     * Get user phone
     * 
     * @return string
     */
    public function getPhone() {
        return $this->phone;
    }
    
    /**
     * Set user phone
     * 
     * @param string $phone
     * @return User
     */
    public function setPhone($phone) {
        $this->phone = $phone;
        return $this;
    }
    
    /**
     * Get user role
     * 
     * @return string
     */
    public function getRole() {
        return $this->role;
    }
    
    /**
     * Set user role
     * 
     * @param string $role
     * @return User
     */
    public function setRole($role) {
        $this->role = $role;
        return $this;
    }
    
    /**
     * Get created date
     * 
     * @return string
     */
    public function getCreatedAt() {
        return $this->created_at;
    }
    
    /**
     * Get updated date
     * 
     * @return string
     */
    public function getUpdatedAt() {
        return $this->updated_at;
    }
    
    /**
     * Convert user object to array
     * 
     * @return array
     */
    public function toArray() {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'role' => $this->role,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}