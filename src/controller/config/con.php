<?php

// *** Server dataBase ***
define("HOST", '45.79.19.252'); // Database Ipv4
define("PORT", '5432'); // Database port
define("BD", 'postgres'); // Database name
define("USER_BD", 'clu'); // Database Username
define("PASS_BD", 'Iker4554');

function connection() {
    $dsn = "pgsql:host=" . HOST . ";port=" . PORT . ";dbname=" . BD;
    try {
        $con = new PDO($dsn, USER_BD, PASS_BD);
        // Establecer el modo de error de PDO a excepción
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $con;
    } catch (PDOException $e) {
        die("Fail connection: " . $e->getMessage());
    }
}


?>
