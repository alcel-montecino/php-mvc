<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow" style="min-width: 300px; max-width: 400px; width: 100%;">
        <h2 class="text-center mb-4">Register</h2>
        <form method="POST">
            <?php if(isset($data['error']) && $data['error']): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($data['error']) ?></div>
            <?php endif; ?>
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input name="name" type="text" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input name="email" type="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input name="password" type="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Register</button>

            <div class="mt-3 text-center">
                <a href="/auth/login" class="btn btn-outline-secondary w-100">Login</a>
            </div>
        </form>
    </div>
</div>
