<head>
    <link rel="stylesheet" href="resources/main.css">
</head>
<?php
// Obtener los datos de concursos
$contest_data_json = file_get_contents('http://localhost/controller/services/contest_return.php');
$contest_data = json_decode($contest_data_json, true);

// Obtener los datos de sedes
$location_data_json = file_get_contents('http://localhost/controller/services/return_sedes.php');
$location_data = json_decode($location_data_json, true);

// Verificar errores en los datos de concursos
if (isset($contest_data['error'])) {
    echo "<p class='text-red-500'>No se encontraron datos de concursos activos.</p>";
    return;
}

// Verificar errores en los datos de sedes
if (isset($location_data['error'])) {
    echo "<p class='text-red-500'>No se encontraron datos de sedes activas.</p>";
    return;
}
?>

<script>
    console.log(<?php echo json_encode($contest_data); ?>);
</script>

<div class="border p-4">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold">CONCURSOS</h2>
        <button onclick="openModal('newContest', -1)" class="bg-blue-500 text-white px-4 py-2 rounded">Nuevo Concurso</button>
    </div>

    <div class="mb-4">
        <input type="text" id="searchInput" placeholder="Buscar Concurso..." class="p-2 border rounded-md">
    </div>

    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sede</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Duración (minutos)</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Niveles</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <?php foreach ($contest_data as $contest) : ?>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900"><?php echo $contest['name']; ?></div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">
                            <?php
                            foreach ($location_data as $location) {
                                if ($location['id'] == $contest['sede_id']) {
                                    echo $location['locationName'];
                                    break;
                                }
                            }
                            ?>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900"><?php echo $contest['contest_date']; ?></div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900"><?php echo $contest['duration_minutes']; ?></div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">
                            <?php echo implode(', ', array_filter([
                                $contest['m_V_primaria'] ? 'Menores de 5to de Primaria' : '',
                                $contest['V_primaria'] ? '5to de Primaria' : '',
                                $contest['VI_primaria'] ? '6to de Primaria' : '',
                                $contest['I_secundaria'] ? '1ro de Secundaria' : '',
                                $contest['II_secundaria'] ? '2do de Secundaria' : '',
                                $contest['II_t_secundaria'] ? '3ro de Secundaria' : '',
                                $contest['I_to_II_prepa'] ? '1ro-2do de Prepa' : '',
                                $contest['III_to_IV_prepa'] ? '3ro-4to de Prepa' : '',
                                $contest['V_to_VI_prepa'] ? '5to-6to de Prepa' : '',
                            ])); ?>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900"><?php echo $contest['status']; ?></div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <button onclick="openModal('editModal', <?php echo $contest['id']; ?>)" class="bg-blue-500 text-white px-4 py-2 rounded">Editar</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
