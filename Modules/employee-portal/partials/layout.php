<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$pageTitle = $_SESSION['pageTitle'] ?? 'Employee Portal';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="/semsys/Modules/employee-portal/css/styles.css">
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
</head>

<body>

    <?php include __DIR__ . '/../includes/sidebar.php'; ?>
    <?php include __DIR__ . '/../includes/header.php'; ?>

    <main class="main-content">
        <div class="container">
            <?php
            if (isset($moduleContent)) {
                echo $moduleContent;
            } else {
                echo '<h2>Welcome to the Employee Portal</h2><p>Select a module from the sidebar.</p>';
            }
            ?>
        </div>
    </main>

    <?php include __DIR__ . '/../includes/footer.php'; ?>

    <script src="/semsys/Modules/employee-portal/js/hamburger.js"></script>
</body>

</html>
