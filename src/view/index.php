<?php
session_start();
/*
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
*/
?>
<!DOCTYPE HTML>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Contest Protocol</title>
    <link href="resources/main.css" rel="stylesheet">
    <?php
    $carpeta_css = 'resources/styles/';
    $archivos_css = glob($carpeta_css . '*.css');

    foreach ($archivos_css as $archivo) {
        echo '<link rel="stylesheet" href="' . $archivo . '">' . PHP_EOL;
    }
    ?>
</head>

<body>
    <?php include('components/nav.php'); ?>
    
    <div class="center-container">
        <div class="container">
            <?php
            include_once 'selector.php';
            contentSelector(isset($_GET['section']) ? $_GET['section'] : '');
            ?>
        </div>
    </div>

    <?php include('components/footer.php'); ?>

    <script src="resources/js/jquery-3.3.1.min.js"></script>
    <script src="resources/js/NavToggle.js"></script>
</body>
