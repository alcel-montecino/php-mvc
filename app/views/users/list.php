
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>User Panel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    </head>
    <body>

        <div class="container">
            <!-- Panel: Add User -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>User List</h2>
                <button class="btn btn-success" id="addUserBtn">Add User</button>
            </div>

            <!-- Users Table -->
            <table class="table table-condensed table-bordered table-striped" id="users-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($users)): ?>
                        <?php foreach($users as $user): ?>
                            <tr id="user-<?= $user['id'] ?>">
                                <td><?= htmlspecialchars($user['id']) ?></td>
                                <td><?= htmlspecialchars($user['name']) ?></td>
                                <td><?= htmlspecialchars($user['email']) ?></td>
                                <td>
                                    <!-- Edit icon -->
                                    <i class="bi bi-pencil-square text-primary edit-icon" style="cursor:pointer;" 
                                    data-id="<?= $user['id'] ?>" title="Edit"></i>

                                    &nbsp;&nbsp;

                                    <!-- Delete icon -->
                                    <i class="bi bi-trash text-danger delete-icon" style="cursor:pointer;" 
                                    data-id="<?= $user['id'] ?>" title="Delete"></i>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">No users found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Modal for Add/Edit -->
        <div class="modal fade" id="userModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-content">
            <!-- Content loaded via JS -->
            </div>
        </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            const modal = new bootstrap.Modal(document.getElementById('userModal'));

            // Handle Add User button
            document.getElementById('addUserBtn').addEventListener('click', async () => {
                const res = await fetch('/user/add');
                const html = await res.text();
                document.getElementById('modal-content').innerHTML = html;
                modal.show();
                bindFormSubmit();
            });

            document.getElementById('users-table').addEventListener('click', async (e) => {
                const id = e.target.dataset.id;

                // Delete user
                if (e.target.classList.contains('delete-icon')) {
                    if (confirm('Are you sure you want to delete this user?')) {
                        const res = await fetch(`/user/delete/${id}?ajax=1`);
                        const data = await res.json();
                        if (data.success) {
                            document.getElementById('user-' + id).remove();
                        } else {
                            alert('Failed to delete user');
                        }
                    }

                // Edit user
                } else if (e.target.classList.contains('edit-icon')) {
                    const res = await fetch(`/user/edit/${id}`);
                    const html = await res.text();
                    document.getElementById('modal-content').innerHTML = html;
                    modal.show();
                    bindFormSubmit();
                }
            });

            // Bind form submission inside modal (AJAX)
            function bindFormSubmit(){
                const form = document.querySelector('#userModal form');
                if(!form) return;

                form.addEventListener('submit', async (e) => {
                    e.preventDefault();
                    const formData = new FormData(form);
                    formData.append('ajax', 1);
                    const action = form.action;
                    const res = await fetch(action, { method: 'POST', body: formData });
                    const data = await res.json();
                    if(data.success){
                        location.reload(); // reload table, or update row dynamically
                    }
                });
            }
        </script>
    </body>
</html>
