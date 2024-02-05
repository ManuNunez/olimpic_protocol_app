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
</head>

<body>
    <?php
    include('components/nav.php');
    ?>

    <?php
    include('/components/footer.php');
    ?>

    <script src="resources/js/jquery-3.3.1.min.js"></script>
    <script src="resources/js/NavToggle.js"></script>
</body>