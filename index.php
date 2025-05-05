<?php
require_once 'config.php';
require_once 'classes/Database.php';
require_once 'classes/User.php';
require_once 'classes/UserRepository.php';
require_once 'classes/UserController.php';
require_once 'classes/Validator.php';

// Initialize the database connection
$database = new Database();
$db = $database->getConnection();

// Initialize the user repository and controller
$userRepository = new UserRepository($db);
$userController = new UserController($userRepository);
$validator = new Validator();

// Handle routing
$action = isset($_GET['action']) ? $_GET['action'] : 'list';
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;

// Process the request based on the action
switch ($action) {
    case 'create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userData = [
                'name' => $_POST['name'] ?? '',
                'email' => $_POST['email'] ?? '',
                'phone' => $_POST['phone'] ?? '',
                'role' => $_POST['role'] ?? ''
            ];
            
            $errors = $validator->validateUser($userData);
            
            if (empty($errors)) {
                $userController->createUser($userData);
                header('Location: index.php?status=created');
                exit;
            }
            
            include 'views/users/create.php';
        } else {
            include 'views/users/create.php';
        }
        break;
        
    case 'edit':
        if (!$id) {
            header('Location: index.php');
            exit;
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userData = [
                'id' => $id,
                'name' => $_POST['name'] ?? '',
                'email' => $_POST['email'] ?? '',
                'phone' => $_POST['phone'] ?? '',
                'role' => $_POST['role'] ?? ''
            ];
            
            $errors = $validator->validateUser($userData);
            
            if (empty($errors)) {
                $userController->updateUser($userData);
                header('Location: index.php?status=updated');
                exit;
            }
            
            $user = $userController->getUserById($id);
            include 'views/users/edit.php';
        } else {
            $user = $userController->getUserById($id);
            if (!$user) {
                header('Location: index.php');
                exit;
            }
            include 'views/users/edit.php';
        }
        break;
        
    case 'delete':
        if (!$id) {
            header('Location: index.php');
            exit;
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userController->deleteUser($id);
            header('Location: index.php?status=deleted');
            exit;
        } else {
            $user = $userController->getUserById($id);
            if (!$user) {
                header('Location: index.php');
                exit;
            }
            include 'views/users/delete.php';
        }
        break;
        
    case 'view':
        if (!$id) {
            header('Location: index.php');
            exit;
        }
        
        $user = $userController->getUserById($id);
        if (!$user) {
            header('Location: index.php');
            exit;
        }
        include 'views/users/view.php';
        break;
        
    case 'list':
    default:
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $limit = 10;
        
        $users = $userController->getUsers($page, $limit, $search);
        $totalUsers = $userController->getTotalUsers($search);
        $totalPages = ceil($totalUsers / $limit);
        
        include 'views/users/list.php';
        break;
}
?>