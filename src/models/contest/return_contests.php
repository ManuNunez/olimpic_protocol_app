<?php

require_once '../backend/config/con.php';

$conn = connection();

function returnContests($conn) {
    try {
        // Definir la consulta incluyendo todas las columnas de niveles
        $query = "SELECT id, name, duration_minutes, contest_date, phase_type, level_1, level_2, level_3, level_4, level_5, level_6, level_7, level_8 FROM contests";
        $stmt = $conn->prepare($query);

        // Verificar si la preparación del statement fue exitosa
        if ($stmt === false) {
            throw new Exception("Failed to prepare statement: " . $conn->errorInfo()[2]);
        }

        // Ejecutar el statement
        $stmt->execute();

        // Verificar si la ejecución fue exitosa
        if ($stmt->errorInfo()[0] !== '00000') {
            throw new Exception("Failed to execute statement: " . $stmt->errorInfo()[2]);
        }

        // Obtener todos los resultados en un array
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Devolver los resultados como JSON
        return json_encode(array("status" => "1", "data" => $results));
    } catch (PDOException $e) {
        // Manejo de errores específicos de PDO
        return json_encode(array("status" => "0", "error" => "Error interno, intentelo de nuevo", "dataError" => $e->getMessage(), "line" => $e->getLine()));
    } catch (Exception $e) {
        // Manejo de otros errores
        return json_encode(array("status" => "0", "error" => $e->getMessage(), "line" => $e->getLine()));
    } finally {
        $conn = null;
    }
}

// Encabezado para JSON
// header('Content-Type: application/json');
// echo returnContests($conn);
?>
