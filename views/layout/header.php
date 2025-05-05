<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="header-content">
                <a href="index.php" class="logo">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15h-2v-6h2v6zm4 0h-2v-6h2v6zm1-9.5h-8v-2h8v2z" fill="currentColor"/>
                    </svg>
                    <span><?= APP_NAME ?></span>
                </a>
                <nav class="main-nav">
                    <ul>
                        <li><a href="index.php" class="nav-link">Users</a></li>
                        <li><a href="index.php?action=create" class="nav-link">Add User</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main class="main">
        <div class="container">
            <?php if (isset($_GET['status'])): ?>
                <?php if ($_GET['status'] === 'created'): ?>
                    <div class="alert alert-success">
                        <span>✓</span> User created successfully!
                        <button class="close-btn" onclick="this.parentElement.style.display='none'">×</button>
                    </div>
                <?php elseif ($_GET['status'] === 'updated'): ?>
                    <div class="alert alert-success">
                        <span>✓</span> User updated successfully!
                        <button class="close-btn" onclick="this.parentElement.style.display='none'">×</button>
                    </div>
                <?php elseif ($_GET['status'] === 'deleted'): ?>
                    <div class="alert alert-success">
                        <span>✓</span> User deleted successfully!
                        <button class="close-btn" onclick="this.parentElement.style.display='none'">×</button>
                    </div>
                <?php endif; ?>
            <?php endif; ?>