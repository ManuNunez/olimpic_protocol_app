<?php

function getTestData() {
    $datos_prueba = [
        [
            'id' => 1,
            'nombre' => 'OMAJ Norte',
            'sede' => 'Sede A',
            'fecha' => '2024-03-01',
            'no_alumnos' => 25,
            'status' => 'Esperando Convocatoria'
        ],
        [
            'id' => 2,
            'nombre' => 'OMAJ Sur',
            'sede' => 'Sede B',
            'fecha' => '2024-03-02',
            'no_alumnos' => 30,
            'status' => 'Inscripciones'
        ],
        [
            'id' => 3,
            'nombre' => 'OMAJ Este',
            'sede' => 'Sede A',
            'fecha' => '2024-03-03',
            'no_alumnos' => 20,
            'status' => 'Asignacion de salones'
        ],
        [
            'id' => 4,
            'nombre' => 'OMAJ Oeste',
            'sede' => 'Sede C',
            'fecha' => '2024-03-04',
            'no_alumnos' => 35,
            'status' => 'Calificando'
        ],
        [
            'id' => 5,
            'nombre' => 'OMAJ Centro',
            'sede' => 'Sede B',
            'fecha' => '2024-03-05',
            'no_alumnos' => 22,
            'status' => 'Inactivo'
        ]
    ];

    return json_encode($datos_prueba);
}

?>
