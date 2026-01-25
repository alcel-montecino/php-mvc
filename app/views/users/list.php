<h2>Users List</h2>
<table class="table table-striped table-bordered" id="users-table">
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
        <tr id="user-<?= $u['id'] ?>">
            <td><?= $u['id'] ?></td>
            <td><?= $u['name'] ?></td>
            <td><?= $u['email'] ?></td>
            <td>
                <button class="btn btn-sm btn-warning edit-btn" data-id="<?= $u['id'] ?>">Edit</button>
                <button class="btn btn-sm btn-danger delete-btn" data-id="<?= $u['id'] ?>">Delete</button>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<!-- Modal for Add/Edit -->
<div class="modal fade" id="userModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="modal-content">
      <!-- Content loaded via JS -->
    </div>
  </div>
</div>

<script>
const table = document.getElementById('users-table');
const modal = new bootstrap.Modal(document.getElementById('userModal'));

table.addEventListener('click', async (e) => {
    const id = e.target.dataset.id;
    if(e.target.classList.contains('delete-btn')){
        if(confirm('Are you sure to delete?')){
            const res = await fetch(`/mvc-crud/user/delete/${id}?ajax=1`);
            const data = await res.json();
            if(data.success){
                document.getElementById('user-'+id).remove();
            }
        }
    } else if(e.target.classList.contains('edit-btn')){
        const res = await fetch(`/mvc-crud/user/edit/${id}`);
        const html = await res.text();
        document.getElementById('modal-content').innerHTML = html;
        modal.show();
        bindFormSubmit();
    }
});

// Add User button
document.querySelector('.navbar .btn-light').addEventListener('click', async () => {
    const res = await fetch('/mvc-crud/user/add');
    const html = await res.text();
    document.getElementById('modal-content').innerHTML = html;
    modal.show();
    bindFormSubmit();
});

// Handle form submit via AJAX
function bindFormSubmit(){
    const form = document.querySelector('#userModal form');
    form.addEventListener('submit', async (e)=>{
        e.preventDefault();
        const formData = new FormData(form);
        formData.append('ajax',1);
        const action = form.action;
        const res = await fetch(action, {method:'POST', body: formData});
        const data = await res.json();
        if(data.success){
            location.reload(); // reload table, or you can update row dynamically
        }
    });
}
</script>
