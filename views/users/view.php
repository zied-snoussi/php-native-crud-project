<?php include 'views/layout/header.php'; ?>

<div class="page-header">
    <h1>User Details</h1>
    <div class="btn-group">
        <a href="index.php" class="btn btn-outline">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z" fill="currentColor"/>
            </svg>
            Back to List
        </a>
        <a href="index.php?action=edit&id=<?= $user->getId() ?>" class="btn btn-warning">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z" fill="currentColor"/>
            </svg>
            Edit
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h2><?= htmlspecialchars($user->getName()) ?></h2>
        <span class="badge badge-<?= $user->getRole() ?>">
            <?= ucfirst($user->getRole()) ?>
        </span>
    </div>
    
    <div class="card-body">
        <div class="user-profile">
            <div class="user-avatar">
                <svg width="80" height="80" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" fill="currentColor"/>
                </svg>
            </div>
            
            <div class="user-details">
                <div class="detail-row">
                    <div class="detail-label">ID</div>
                    <div class="detail-value"><?= $user->getId() ?></div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-label">Name</div>
                    <div class="detail-value"><?= htmlspecialchars($user->getName()) ?></div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-label">Email</div>
                    <div class="detail-value">
                        <a href="mailto:<?= htmlspecialchars($user->getEmail()) ?>" class="email-link">
                            <?= htmlspecialchars($user->getEmail()) ?>
                        </a>
                    </div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-label">Phone</div>
                    <div class="detail-value">
                        <?php if ($user->getPhone()): ?>
                            <a href="tel:<?= htmlspecialchars($user->getPhone()) ?>" class="phone-link">
                                <?= htmlspecialchars($user->getPhone()) ?>
                            </a>
                        <?php else: ?>
                            <span class="text-muted">Not provided</span>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-label">Role</div>
                    <div class="detail-value">
                        <span class="badge badge-<?= $user->getRole() ?>">
                            <?= ucfirst($user->getRole()) ?>
                        </span>
                    </div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-label">Created</div>
                    <div class="detail-value"><?= $userController->formatDate($user->getCreatedAt()) ?></div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-label">Last Updated</div>
                    <div class="detail-value"><?= $userController->formatDate($user->getUpdatedAt()) ?></div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card-footer">
        <div class="btn-group">
            <a href="index.php?action=edit&id=<?= $user->getId() ?>" class="btn btn-warning">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z" fill="currentColor"/>
                </svg>
                Edit User
            </a>
            <a href="index.php?action=delete&id=<?= $user->getId() ?>" class="btn btn-danger">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z" fill="currentColor"/>
                </svg>
                Delete User
            </a>
        </div>
    </div>
</div>

<?php include 'views/layout/footer.php'; ?>