<?php
session_start();

if (isset($_POST['start'])) {
    $_SESSION['start_time'] = time();

    // TODO: Realizar la inserción en la base de datos (ver más adelante)
}

$elapsed_time = isset($_SESSION['start_time']) ? time() - $_SESSION['start_time'] : 0;
?>

<div class="flex justify-center items-center">
    <div class="text-center">
        <h1 class="text-4xl font-bold mb-4">Cronómetro</h1>
        <p class="text-2xl mb-4">Tiempo transcurrido: <?php echo gmdate("H:i:s", $elapsed_time); ?></p>
        <form method="post">
            <button type="submit" name="start" class="bg-blue-500 text-white px-4 py-2 rounded">Iniciar Cronómetro</button>
        </form>
    </div>
</div>
