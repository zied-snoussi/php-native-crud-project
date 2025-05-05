<?php
/**
 * Database class to handle connection with PDO
 */
class Database {
    private $host = DB_HOST;
    private $dbName = DB_NAME;
    private $username = DB_USER;
    private $password = DB_PASS;
    private $charset = DB_CHARSET;
    private $conn;
    
    /**
     * Get database connection
     * 
     * @return PDO
     */
    public function getConnection() {
        try {
            $this->conn = null;
            $dsn = "mysql:host={$this->host};dbname={$this->dbName};charset={$this->charset}";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            
            $this->conn = new PDO($dsn, $this->username, $this->password, $options);
            return $this->conn;
        } catch (PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
            exit;
        }
    }
    
    /**
     * Execute a query
     * 
     * @param string $query
     * @param array $params
     * @return PDOStatement
     */
    public function executeQuery($query, $params = []) {
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            echo "Query Error: " . $e->getMessage();
            exit;
        }
    }
    
    /**
     * Execute a query and return a single row
     * 
     * @param string $query
     * @param array $params
     * @return array|false
     */
    public function fetchRow($query, $params = []) {
        $stmt = $this->executeQuery($query, $params);
        return $stmt->fetch();
    }
    
    /**
     * Execute a query and return all rows
     * 
     * @param string $query
     * @param array $params
     * @return array
     */
    public function fetchAll($query, $params = []) {
        $stmt = $this->executeQuery($query, $params);
        return $stmt->fetchAll();
    }
    
    /**
     * Get the last inserted ID
     * 
     * @return string
     */
    public function lastInsertId() {
        return $this->conn->lastInsertId();
    }
}