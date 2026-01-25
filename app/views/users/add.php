<h2>Add New User</h2>
<form method="POST" class="mt-3">
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input name="email" type="email" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Add User</button>
    <a href="/mvc-crud/" class="btn btn-secondary">Cancel</a>
</form>
