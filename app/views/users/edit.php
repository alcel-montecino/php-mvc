<h2>Edit User</h2>
<form method="POST" class="mt-3">
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input name="name" class="form-control" value="<?= $data['user']['name'] ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input name="email" type="email" class="form-control" value="<?= $data['user']['email'] ?>" required>
    </div>
    <button type="submit" class="btn btn-success">Update User</button>
    <a href="/mvc-crud/" class="btn btn-secondary">Cancel</a>
</form>
