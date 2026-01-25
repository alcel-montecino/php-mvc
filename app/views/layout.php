<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP MVC CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container">
        <a class="navbar-brand" href="/mvc-crud/">PHP MVC CRUD</a>
        <div>
            <a class="btn btn-light" href="/mvc-crud/user/add">Add User</a>
        </div>
    </div>
</nav>

<div class="container">
    <?php require $view; ?>
</div>

</body>
</html>
