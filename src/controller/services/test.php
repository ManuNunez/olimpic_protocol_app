<?php
require_once '../config/con.php';
require_once 'omrchdb.php';



$query ="SELECT * FROM Sedes WHERE status = .";
$params = [1];

$consulta = new omrchdb();
$consulta->select($query,$params[]);


``