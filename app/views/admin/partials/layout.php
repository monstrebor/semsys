<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Admin Dashboard | SEMSYS' ?></title>

    <link rel="stylesheet" href="/semsys/public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/semsys/public/assets/css/styles.css">
</head>

<body class="bg-light">

<div class="d-flex min-vh-100">

    <main class="flex-grow-1 p-4">
        <?php require_once __DIR__ . '/../../partials/navbar.php'; ?>
        <?php if (isset($content)) echo $content; ?>
    </main>

</div>

<script src="/semsys/public/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
