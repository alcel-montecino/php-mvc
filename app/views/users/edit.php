<div class="modal-header">
    <h5 class="modal-title"><?= isset($data['user']) ? 'Edit User' : 'Add User' ?></h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>
<div class="modal-body">
<form method="POST" action="<?= isset($data['user']) ? '/mvc-crud/user/edit/'.$data['user']['id'] : '/mvc-crud/user/add' ?>">
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input name="name" class="form-control" value="<?= $data['user']['name'] ?? '' ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input name="email" type="email" class="form-control" value="<?= $data['user']['email'] ?? '' ?>" required>
    </div>
    <button type="submit" class="btn btn-success"><?= isset($data['user']) ? 'Update' : 'Add' ?></button>
</form>
</div>
