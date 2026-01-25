<h2>Users List</h2>
<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($data['users'] as $u): ?>
        <tr>
            <td><?= $u['id'] ?></td>
            <td><?= $u['name'] ?></td>
            <td><?= $u['email'] ?></td>
            <td>
                <a class="btn btn-sm btn-warning" href="/mvc-crud/user/edit/<?= $u['id'] ?>">Edit</a>
                <a class="btn btn-sm btn-danger delete-btn" href="javascript:void(0)" data-url="/mvc-crud/user/delete/<?= $u['id'] ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<script>
document.querySelectorAll('.delete-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        if(confirm('Are you sure to delete this user?')){
            window.location.href = btn.dataset.url;
        }
    });
});
</script>
