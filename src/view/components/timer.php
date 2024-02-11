<head>
    <link rel="stylesheet" href="../resources/main.css">
</head>
<?php
session_start();

if (isset($_POST['start'])) {
    $_SESSION['start_time'] = time();
    // TODO: Realizar la inserción en la base de datos (ver más adelante)
}

$elapsed_time = isset($_SESSION['start_time']) ? time() - $_SESSION['start_time'] : 0;
?>

<div class="timer-container">
    <h1 class="timer-title">Cronómetro</h1>
    <p class="timer-text">Tiempo transcurrido: <?php echo gmdate("H:i:s", $elapsed_time); ?></p>
    <form method="post">
        <button type="submit" name="start" class="start-button">
            Iniciar Cronómetro
        </button>
    </form>
</div>
