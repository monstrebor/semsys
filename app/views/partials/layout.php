<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? "SEMS | Student & Employee Management System" ?></title>
    <link rel="stylesheet" href="/semsys/public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/semsys/public/assets/css/styles.css">
</head>

<body>

    <!-- NAVBAR -->
    <?php require_once __DIR__ . '/navbar.php'; ?>

    <!-- MAIN CONTENT -->
    <main>
        <?php
        if (isset($content)) {
            echo $content;
        }
        ?>
    </main>

    <script src="/semsys/public/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/semsys/public/assets/js/scripts.js"></script>
</body>

</html>
