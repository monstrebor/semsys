<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Student & Employee System</title>
    <link rel="stylesheet" href="/semsys/public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/semsys/public/assets/css/styles.css">
</head>
<body class="bg-image1">

<div class="container min-vh-100 d-flex justify-content-center align-items-center">
    <div class="col-md-5 col-lg-4">

        <div class="card shadow border-0 rounded-4">
            <div class="card-header bg-primary text-white text-center py-4 rounded-top-4">
                <h4 class="mb-0">Welcome Back</h4>
                <small>Student & Employee Management System</small>
            </div>

            <div class="card-body p-4">

                <?php if (isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $_SESSION['error']; unset($_SESSION['error']); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <form method="POST" novalidate>
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control form-control-lg" placeholder="you@example.com" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control form-control-lg" placeholder="••••••••" required>
                    </div>

                    <div class="d-grid mt-4">
                        <button class="btn btn-primary btn-lg">
                            Login
                        </button>
                    </div>
                </form>

            </div>

            <div class="card-footer text-center bg-white border-0 pb-4">
                <span class="text-muted">Don't have an account?</span>
                <a href="register" class="text-decoration-none fw-semibold">
                    Register here
                </a>
            </div>
        </div>

    </div>
</div>

<script src="/semsys/public/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
