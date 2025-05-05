<?php include 'views/layout/header.php'; ?>

<div class="page-header">
    <h1>User Management</h1>
    <a href="index.php?action=create" class="btn btn-primary">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z" fill="currentColor"/>
        </svg>
        Add User
    </a>
</div>

<div class="card">
    <div class="card-header">
        <form action="index.php" method="GET" class="search-form">
            <input type="hidden" name="action" value="list">
            <div class="search-container">
                <input 
                    type="text" 
                    name="search" 
                    placeholder="Search users..." 
                    class="search-input"
                    value="<?= htmlspecialchars($search) ?>"
                >
                <button type="submit" class="search-btn">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" fill="currentColor"/>
                    </svg>
                </button>
            </div>
            <?php if (!empty($search)): ?>
            <a href="index.php" class="clear-search">Clear Search</a>
            <?php endif; ?>
        </form>
    </div>
    
    <div class="card-body">
        <?php if (empty($users)): ?>
            <div class="empty-state">
                <svg width="64" height="64" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 6c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2m0 10c2.7 0 5.8 1.29 6 2H6c.23-.72 3.31-2 6-2m0-12C9.79 4 8 5.79 8 8s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 10c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" fill="currentColor"/>
                </svg>
                <?php if (!empty($search)): ?>
                    <p>No users found matching "<strong><?= htmlspecialchars($search) ?></strong>"</p>
                <?php else: ?>
                    <p>No users found</p>
                <?php endif; ?>
                <a href="index.php?action=create" class="btn btn-primary">Add User</a>
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= $user->getId() ?></td>
                            <td><?= htmlspecialchars($user->getName()) ?></td>
                            <td><?= htmlspecialchars($user->getEmail()) ?></td>
                            <td><?= htmlspecialchars($user->getPhone() ?: 'N/A') ?></td>
                            <td>
                                <span class="badge badge-<?= $user->getRole() ?>">
                                    <?= ucfirst($user->getRole()) ?>
                                </span>
                            </td>
                            <td><?= $userController->formatDate($user->getCreatedAt()) ?></td>
                            <td class="actions">
                                <div class="btn-group">
                                    <a href="index.php?action=view&id=<?= $user->getId() ?>" class="btn btn-sm btn-info" title="View">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z" fill="currentColor"/>
                                        </svg>
                                    </a>
                                    <a href="index.php?action=edit&id=<?= $user->getId() ?>" class="btn btn-sm btn-warning" title="Edit">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z" fill="currentColor"/>
                                        </svg>
                                    </a>
                                    <a href="index.php?action=delete&id=<?= $user->getId() ?>" class="btn btn-sm btn-danger" title="Delete">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z" fill="currentColor"/>
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            
            <?php if ($totalPages > 1): ?>
            <div class="pagination">
                <?php if ($page > 1): ?>
                    <a href="index.php?page=<?= $page - 1 ?>&search=<?= urlencode($search) ?>" class="pagination-link">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z" fill="currentColor"/>
                        </svg>
                        Previous
                    </a>
                <?php endif; ?>
                
                <div class="pagination-info">
                    Page <?= $page ?> of <?= $totalPages ?>
                </div>
                
                <?php if ($page < $totalPages): ?>
                    <a href="index.php?page=<?= $page + 1 ?>&search=<?= urlencode($search) ?>" class="pagination-link">
                        Next
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z" fill="currentColor"/>
                        </svg>
                    </a>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>

<?php include 'views/layout/footer.php'; ?>