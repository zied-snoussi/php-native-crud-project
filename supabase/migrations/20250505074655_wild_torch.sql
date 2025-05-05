-- Create the database
CREATE DATABASE IF NOT EXISTS user_management;
USE user_management;

-- Create users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(20),
    role ENUM('admin', 'manager', 'user') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert sample data
INSERT INTO users (name, email, phone, role) VALUES
('John Doe', 'john@example.com', '+1 (555) 123-4567', 'admin'),
('Jane Smith', 'jane@example.com', '+1 (555) 987-6543', 'manager'),
('Robert Johnson', 'robert@example.com', '+1 (555) 567-8901', 'user'),
('Sarah Williams', 'sarah@example.com', '+1 (555) 234-5678', 'user'),
('Michael Brown', 'michael@example.com', '+1 (555) 345-6789', 'manager'),
('Emily Davis', 'emily@example.com', '+1 (555) 456-7890', 'user'),
('David Miller', 'david@example.com', '+1 (555) 678-9012', 'user'),
('Jennifer Wilson', 'jennifer@example.com', '+1 (555) 789-0123', 'user'),
('James Taylor', 'james@example.com', '+1 (555) 890-1234', 'manager'),
('Elizabeth Anderson', 'elizabeth@example.com', '+1 (555) 901-2345', 'user'),
('Daniel Thomas', 'daniel@example.com', '+1 (555) 012-3456', 'user'),
('Mary Jackson', 'mary@example.com', '+1 (555) 123-4567', 'user');