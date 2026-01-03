<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
    <div class="container">
        <a href="index.php?url=home"
           style="text-decoration: none; color: black; font-weight: bolder; display: flex; align-items: center; gap: 10px;">
            <div class="icon1" style="width: 50px; height: 50px;"></div>
            <div>SEMSYS</div>
        </a>

        <div class="ms-auto">
            <?php if (isset($_SESSION['user'])): ?>
                <a href="#" class="btn btn-outline-secondary me-2">
                    Profile
                </a>
                <a href="index.php?url=logout" class="btn btn-danger">
                    Logout
                </a>
            <?php else: ?>
                <a href="index.php?url=login" class="btn btn-outline-primary me-2">Login</a>
                <a href="index.php?url=register" class="btn btn-primary">Register</a>
            <?php endif; ?>
        </div>
    </div>
</nav>
