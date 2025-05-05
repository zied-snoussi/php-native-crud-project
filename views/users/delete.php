<?php include 'views/layout/header.php'; ?>

<div class="page-header">
    <h1>Delete User</h1>
    <a href="index.php" class="btn btn-outline">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z" fill="currentColor"/>
        </svg>
        Back to List
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h2>Confirm Deletion</h2>
    </div>
    
    <div class="card-body">
        <div class="alert alert-danger">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 21h22L12 2 1 21zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z" fill="currentColor"/>
            </svg>
            <div>
                <h3>Warning!</h3>
                <p>Are you sure you want to delete this user? This action cannot be undone.</p>
            </div>
        </div>
        
        <div class="user-profile">
            <div class="user-avatar">
                <svg width="64" height="64" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" fill="currentColor"/>
                </svg>
            </div>
            
            <div class="user-details">
                <div class="detail-row">
                    <div class="detail-label">Name</div>
                    <div class="detail-value"><?= htmlspecialchars($user->getName()) ?></div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-label">Email</div>
                    <div class="detail-value"><?= htmlspecialchars($user->getEmail()) ?></div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-label">Role</div>
                    <div class="detail-value">
                        <span class="badge badge-<?= $user->getRole() ?>">
                            <?= ucfirst($user->getRole()) ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        
        <form action="index.php?action=delete&id=<?= $user->getId() ?>" method="POST" class="form">
            <div class="form-group form-actions delete-actions">
                <button type="submit" class="btn btn-danger">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z" fill="currentColor"/>
                    </svg>
                    Yes, Delete User
                </button>
                <a href="index.php" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
</div>

<?php include 'views/layout/footer.php'; ?>