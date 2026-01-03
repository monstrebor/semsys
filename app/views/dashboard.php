<div class="d-flex min-vh-100">

    <!-- SIDEBAR -->
    <nav class="bg-primary text-white p-3 flex-shrink-0" style="width: 250px;">
        <div class="text-center mb-4">
            <div class="icon1 mx-auto mb-2"></div>
            <h4 class="fw-bold">SEMSYS</h4>
            <small>Welcome, <?= $_SESSION['user']['name']; ?></small>
        </div>

        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a href="index.php?url=dashboard" class="nav-link text-white">🏠 Dashboard</a>
            </li>
            <li class="nav-item mb-2">
                <a href="#" class="nav-link text-white">📚 Students</a>
            </li>
            <li class="nav-item mb-2">
                <a href="#" class="nav-link text-white">👥 Employees</a>
            </li>
            <li class="nav-item mb-2">
                <a href="index.php?url=logout" class="nav-link text-white">🚪 Logout</a>
            </li>
        </ul>
    </nav>

    <!-- MAIN CONTENT -->
    <main class="flex-grow-1 bg-light p-4">
        <div class="container-fluid">
            <div class="alert alert-success">
                ✅ Login successful! Welcome <?= $_SESSION['user']['name']; ?>
            </div>

            <h2 class="mb-4">Dashboard</h2>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Total Students</h5>
                            <p class="card-text display-6">120</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Total Employees</h5>
                            <p class="card-text display-6">35</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Pending Tasks</h5>
                            <p class="card-text display-6">8</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <h4>Recent Activity</h4>
                <ul class="list-group">
                    <li class="list-group-item">New student registered: John Doe</li>
                    <li class="list-group-item">Employee Jane Smith updated record</li>
                    <li class="list-group-item">Password reset for user Mike Lee</li>
                </ul>
            </div>
        </div>
    </main>
</div>