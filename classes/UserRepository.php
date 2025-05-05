<?php
/**
 * UserRepository class for data access operations
 */
class UserRepository {
    private $db;
    private $table = 'users';
    
    /**
     * Class constructor
     * 
     * @param PDO $db
     */
    public function __construct($db) {
        $this->db = $db;
    }
    
    /**
     * Get all users with pagination and search
     * 
     * @param int $page
     * @param int $limit
     * @param string $search
     * @return array
     */
    public function getAll($page = 1, $limit = 10, $search = '') {
        $offset = ($page - 1) * $limit;
        
        $query = "SELECT * FROM {$this->table}";
        $params = [];
        
        if (!empty($search)) {
            $query .= " WHERE name LIKE ? OR email LIKE ? OR phone LIKE ?";
            $searchTerm = "%{$search}%";
            $params = [$searchTerm, $searchTerm, $searchTerm];
        }
        
        $query .= " ORDER BY created_at DESC LIMIT ?, ?";
        $params[] = (int)$offset;
        $params[] = (int)$limit;
        
        $stmt = $this->db->prepare($query);
        
        // Binding parameters with their types
        $paramIndex = 1;
        foreach ($params as $param) {
            $type = is_int($param) ? PDO::PARAM_INT : PDO::PARAM_STR;
            $stmt->bindValue($paramIndex++, $param, $type);
        }
        
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Count total users for pagination
     * 
     * @param string $search
     * @return int
     */
    public function count($search = '') {
        $query = "SELECT COUNT(*) as total FROM {$this->table}";
        $params = [];
        
        if (!empty($search)) {
            $query .= " WHERE name LIKE ? OR email LIKE ? OR phone LIKE ?";
            $searchTerm = "%{$search}%";
            $params = [$searchTerm, $searchTerm, $searchTerm];
        }
        
        $stmt = $this->db->prepare($query);
        $stmt->execute($params);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return (int)$result['total'];
    }
    
    /**
     * Get a single user by ID
     * 
     * @param int $id
     * @return array|false
     */
    public function getById($id) {
        $query = "SELECT * FROM {$this->table} WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    /**
     * Create a new user
     * 
     * @param array $userData
     * @return int
     */
    public function create($userData) {
        $query = "INSERT INTO {$this->table} (name, email, phone, role, created_at, updated_at) 
                VALUES (?, ?, ?, ?, NOW(), NOW())";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            $userData['name'],
            $userData['email'],
            $userData['phone'],
            $userData['role']
        ]);
        
        return $this->db->lastInsertId();
    }
    
    /**
     * Update an existing user
     * 
     * @param array $userData
     * @return bool
     */
    public function update($userData) {
        $query = "UPDATE {$this->table} 
                SET name = ?, email = ?, phone = ?, role = ?, updated_at = NOW() 
                WHERE id = ?";
        
        $stmt = $this->db->prepare($query);
        $result = $stmt->execute([
            $userData['name'],
            $userData['email'],
            $userData['phone'],
            $userData['role'],
            $userData['id']
        ]);
        
        return $result;
    }
    
    /**
     * Delete a user
     * 
     * @param int $id
     * @return bool
     */
    public function delete($id) {
        $query = "DELETE FROM {$this->table} WHERE id = ?";
        $stmt = $this->db->prepare($query);
        
        return $stmt->execute([$id]);
    }
    
    /**
     * Check if an email already exists (excluding current user)
     * 
     * @param string $email
     * @param int|null $userId
     * @return bool
     */
    public function emailExists($email, $userId = null) {
        $query = "SELECT COUNT(*) as count FROM {$this->table} WHERE email = ?";
        $params = [$email];
        
        if ($userId) {
            $query .= " AND id != ?";
            $params[] = $userId;
        }
        
        $stmt = $this->db->prepare($query);
        $stmt->execute($params);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $result['count'] > 0;
    }
}