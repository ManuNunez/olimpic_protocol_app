<head>
    <link rel="stylesheet" href="resources/main.css">
</head>
<?php

include_once '../controller/services/read_contest_beta.php';

$data_json = getTestData();
$datos = json_decode($data_json, true);
include_once '../controller/services/return_sedes.php';
$idSede = 1;
$location_data = json_decode($ans, true);
?>

<script>
    console.log(<?php echo json_encode($datos); ?>);
</script>

<?php if (!isset($datos['error'])) : ?>
    <div class="border p-4">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">CONCURSOS</h2>
            <button onclick="openModal()" class="bg-blue-500 text-white px-4 py-2 rounded">Nuevo Concurso</button>
        </div>

        <div class="mb-4">
            <input type="text" id="searchInput" placeholder="Buscar alumno..." class="p-2 border rounded-md">
        </div>

        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Sede
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Fecha
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        No. de Alumnos
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php foreach ($datos as $dato) : ?>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900"><?php echo $dato['nombre']; ?></div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900"><?php echo $dato['sede']; ?></div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900"><?php echo $dato['fecha']; ?></div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900"><?php echo $dato['no_alumnos']; ?></div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900"><?php echo $dato['status']; ?></div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <button onclick="editarAlumno(<?php echo $dato['id']; ?>)" class="bg-blue-500 text-white px-4 py-2 rounded">Editar</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else : ?>
    <p class="text-red-500">No se encontraron datos para la sede con ID <?php echo $idSede; ?></p>
<?php endif; ?>

<div id="modal" class="fixed inset-0 bg-gray-800 bg-opacity-75 z-50 hidden">
    <div class="flex items-center justify-center h-screen">
        <div class="bg-white p-8 rounded shadow-md w-1/2">
            <h2 id="modalTitle" class="text-2xl font-bold mb-4">Crear Concurso</h2>
            <form id="concursoForm" method="POST">
                <label for="contest_name" class="block text-sm font-medium text-gray-700">Nombre del Concurso:</label>
                <input type="text" id="contest_name" name="contest_name" class="mt-1 p-2 border rounded-md w-full">

                <label for="sede" class="block text-sm font-medium text-gray-700">Selecciona la Sede:</label>
                <select id="sede" name="sede" class="mt-1 p-2 border rounded-md w-full">
                    <?php foreach ($location_data as $location) : ?>
                        <option value="<?php echo $location['locationName']; ?>"><?php echo $location['locationName']; ?></option>
                    <?php endforeach; ?>
                </select>


                <label for="contest_date" class="block text-sm font-medium text-gray-700">Fecha del Concurso:</label>
                <input type="date" id="contest_date" name="contest_date" class="mt-1 p-2 border rounded-md w-full">

                <div class="mt-1 grid grid-cols-3 gap-4">
                    <div><input type="checkbox" name="contest_level[]" value="Menores de 5to de Primaria"> Menores de 5to de Primaria</div>
                    <div><input type="checkbox" name="contest_level[]" value="5to de Primaria"> 5to de Primaria</div>
                    <div><input type="checkbox" name="contest_level[]" value="6to de Primaria"> 6to de Primaria</div>
                    <div><input type="checkbox" name="contest_level[]" value="1ro de Secundaria"> 1ro de Secundaria</div>
                    <div><input type="checkbox" name="contest_level[]" value="2do de Secundaria"> 2do de Secundaria</div>
                    <div><input type="checkbox" name="contest_level[]" value="3ro de Secundaria"> 3ro de Secundaria</div>
                    <div><input type="checkbox" name="contest_level[]" value="1ro-2do de Prepa"> 1ro-2do de Prepa</div>
                    <div><input type="checkbox" name="contest_level[]" value="3ro-4to de Prepa"> 3ro-4to de Prepa</div>
                    <div><input type="checkbox" name="contest_level[]" value="5to-6to de Prepa"> 5to-6to de Prepa</div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded" onclick="validateData()">Guardar</button>
                    <button type="button" onclick="closeModal()" class="ml-2 text-gray-600">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="resources/js/modal.js"></script>
<script src="resources/js/new_contest.js"></script>