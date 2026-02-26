<?php require __DIR__ . '/../../../views/layouts/header.php'; ?>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card-glass p-5" style="width: 420px;">

        <h3 class="text-center mb-4">User Login</h3>

        <form method="POST" action="/ASSET-TRACKING-PORTAL/public/user/login">

            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="Enter user email" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter password" required>
            </div>

            <button type="submit" class="btn btn-light w-100 mt-3">
                Login as User
            </button>

        </form>

        <div class="text-center mt-3">
            <a href="/ASSET-TRACKING-PORTAL/public/" class="text-white text-decoration-none">
                ← Back to Home
            </a>
        </div>

    </div>
</div>

<?php require __DIR__ . '/../../../views/layouts/footer.php'; ?>