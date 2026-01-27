<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>API Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">API Endpoints</h2>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Endpoint</th>
                <th>Method</th>
                <th>Description</th>
                <th>Test</th>
            </tr>
        </thead>
        <tbody>
            <!-- Users API -->
            <tr>
                <td>1</td>
                <td><code>/api/users</code></td>
                <td>GET</td>
                <td>Get all users in JSON format</td>
                <td><a href="/api/users" target="_blank" class="btn btn-sm btn-primary">Test</a></td>
            </tr>
            <tr>
                <td>2</td>
                <td><code>/api/users/{id}</code></td>
                <td>GET</td>
                <td>Get a single user by ID</td>
                <td>Use Postman / API client</td>
            </tr>
            <tr>
                <td>3</td>
                <td><code>/api/users</code></td>
                <td>POST</td>
                <td>Create a new user</td>
                <td>Use Postman / API client</td>
            </tr>
            <tr>
                <td>4</td>
                <td><code>/api/users/{id}</code></td>
                <td>PUT</td>
                <td>Update a user by ID</td>
                <td>Use Postman / API client</td>
            </tr>
            <tr>
                <td>5</td>
                <td><code>/api/users/{id}</code></td>
                <td>DELETE</td>
                <td>Delete a user by ID</td>
                <td>Use Postman / API client</td>
            </tr>

            <!-- Posts API -->
            <tr>
                <td>6</td>
                <td><code>/api/posts</code></td>
                <td>GET</td>
                <td>Get all posts in JSON format</td>
                <td><a href="/api/posts" target="_blank" class="btn btn-sm btn-primary">Test</a></td>
            </tr>
            <tr>
                <td>7</td>
                <td><code>/api/posts/{id}</code></td>
                <td>GET</td>
                <td>Get a single post by ID</td>
                <td>Use Postman / API client</td>
            </tr>
            <tr>
                <td>8</td>
                <td><code>/api/posts</code></td>
                <td>POST</td>
                <td>Create a new post</td>
                <td>Use Postman / API client</td>
            </tr>
            <tr>
                <td>9</td>
                <td><code>/api/posts/{id}</code></td>
                <td>PUT</td>
                <td>Update a post by ID</td>
                <td>Use Postman / API client</td>
            </tr>
            <tr>
                <td>10</td>
                <td><code>/api/posts/{id}</code></td>
                <td>DELETE</td>
                <td>Delete a post by ID</td>
                <td>Use Postman / API client</td>
            </tr>
        </tbody>
    </table>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
