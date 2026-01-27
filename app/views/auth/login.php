<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow" style="min-width: 300px; max-width: 400px; width: 100%;">
        <h2 class="text-center mb-4">Login</h2>
        <form method="POST" action="/auth/login">
            <?php if(isset($error) && $error): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input name="email" type="text" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input name="password" type="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>

        <!-- Register Button -->
        <div class="mt-3 text-center">
            <a href="/auth/register" class="btn btn-outline-secondary w-100">Register</a>
        </div>
    </div>
</div>
