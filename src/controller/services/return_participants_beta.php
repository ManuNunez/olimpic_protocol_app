<?php

function getTestData()
{
    // You can return test data directly without the need for a database connection
    $testData = [
        ['name' => "Iker Famoso", 'level' => '6', 'school' => 'Escuela 1'],
        ['name' => "Manualidades ", 'level' => '6', 'school' => 'Escuela 2'],
        ['name' => "Alexis se la come", 'level' => '1', 'school' => 'Escuela 3'],
    ];
    //echo $testData;
    return $testData;
}

?>
