<?php include 'views/layout/header.php'; ?>

<div class="page-header">
    <h1>Edit User</h1>
    <a href="index.php" class="btn btn-outline">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z" fill="currentColor"/>
        </svg>
        Back to List
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h2>Update User: <?= htmlspecialchars($user->getName()) ?></h2>
    </div>
    
    <div class="card-body">
        <form action="index.php?action=edit&id=<?= $user->getId() ?>" method="POST" class="form">
            <div class="form-group">
                <label for="name">Name*</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>" 
                    value="<?= isset($_POST['name']) ? htmlspecialchars($_POST['name']) : htmlspecialchars($user->getName()) ?>" 
                    required
                >
                <?php if (isset($errors['name'])): ?>
                    <div class="invalid-feedback"><?= $errors['name'] ?></div>
                <?php endif; ?>
            </div>
            
            <div class="form-group">
                <label for="email">Email*</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" 
                    value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : htmlspecialchars($user->getEmail()) ?>" 
                    required
                >
                <?php if (isset($errors['email'])): ?>
                    <div class="invalid-feedback"><?= $errors['email'] ?></div>
                <?php endif; ?>
            </div>
            
            <div class="form-group">
                <label for="phone">Phone</label>
                <input 
                    type="tel" 
                    id="phone" 
                    name="phone" 
                    class="form-control <?= isset($errors['phone']) ? 'is-invalid' : '' ?>" 
                    value="<?= isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : htmlspecialchars($user->getPhone()) ?>"
                >
                <?php if (isset($errors['phone'])): ?>
                    <div class="invalid-feedback"><?= $errors['phone'] ?></div>
                <?php endif; ?>
            </div>
            
            <div class="form-group">
                <label for="role">Role*</label>
                <select 
                    id="role" 
                    name="role" 
                    class="form-control <?= isset($errors['role']) ? 'is-invalid' : '' ?>" 
                    required
                >
                    <option value="">Select a role</option>
                    <?= $userController->getRoleOptions(isset($_POST['role']) ? $_POST['role'] : $user->getRole()) ?>
                </select>
                <?php if (isset($errors['role'])): ?>
                    <div class="invalid-feedback"><?= $errors['role'] ?></div>
                <?php endif; ?>
            </div>
            
            <div class="form-group form-actions">
                <button type="submit" class="btn btn-primary">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z" fill="currentColor"/>
                    </svg>
                    Update User
                </button>
                <a href="index.php" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
</div>

<?php include 'views/layout/footer.php'; ?>