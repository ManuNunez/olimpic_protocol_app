<?php

require_once '../backend/config/con.php';

$conn = connection();

function returnContestCampuses($conn) {
    try {
        // Consulta para seleccionar todos los campos de la tabla contest_campuses
        $query = "
            SELECT 
                cc.contest_id, 
                cc.campus_id, 
                c.campus_name 
            FROM 
                contest_campuses cc
            JOIN 
                campuses c ON cc.campus_id = c.id";

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
// echo returnContestCampuses($conn);
?>
