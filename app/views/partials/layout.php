<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? "SEMS | Student & Employee Management System" ?></title>
    <link rel="stylesheet" href="/semsys/public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/semsys/public/assets/css/styles.css">
    <link rel="stylesheet" href="/semsys/public/assets/css/app.css">
</head>

<body>

    <?php
    $url = $_GET['url'] ?? '';
    $publicPages = ['home', 'login', 'register'];
    ?>
    <?php if (in_array($url, $publicPages)) : ?>
        <?php require_once __DIR__ . '/navbar.php'; ?>
        <main>
            <?= $content ?? '' ?>
        </main>
    <?php else : ?>
        <?php require_once __DIR__ . '/partials/navbar.php'; ?>
        <div class="d-flex">
            <?php require_once __DIR__ . '/partials/sidebar.php'; ?>
            <main class="flex-grow-1 bg-light p-4" style="min-height: 100vh;">
                <?= $content ?? '' ?>
            </main>
        </div>
    <?php endif; ?>


    <script src="/semsys/public/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/semsys/public/assets/js/scripts.js"></script>
    <script src="/semsys/public/assets/js/editUserModal.js"></script>
    <script src="/semsys/public/assets/js/changePasswordModal.js"></script>
</body>

</html>