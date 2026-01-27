<?php
$username = $_SESSION['user_name'] ?? 'Guest';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP MVC CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php if(!isset($noHeader) || !$noHeader): ?>
<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="/home">MyApp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/user">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/api">API</a>
                </li>
            </ul>
            <span class="navbar-text me-3">
                Logged in as: <strong><?= htmlspecialchars($username) ?></strong>
            </span>
            <a href="/auth/logout" class="btn btn-outline-danger">Logout</a>
        </div>
    </div>
</nav>
<?php endif; ?>

<div class="container">
    <?php require $viewFile; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
