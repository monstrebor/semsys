<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="/auth-system/public/assets/bootstrap/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
  <span class="navbar-brand">Dashboard</span>
  <a href="logout" class="btn btn-danger btn-sm">Logout</a>
</nav>

<div class="container mt-4">
    <div class="alert alert-success">
        ✅ Login successful! Welcome <?= $_SESSION['user']['name']; ?>
    </div>
</div>

</body>
</html>
