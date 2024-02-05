<?php
// Puedes cambiar la importación según tus necesidades
// Si deseas datos reales
// include_once 'read_location.php';
// Si deseas datos de prueba
include_once '../controller/read_locations_beta.php';
include_once '/create_location.php';
$datos;

// Cambia este valor según tus necesidades
$idSede = 1;

// Si quieres datos reales descomenta esta línea y comenta la siguiente
// $datos = getLocationData($idSede);
// Si quieres datos de prueba descomenta esta línea y comenta la anterior
$datos = getTestData();
?>

<?php if ($datos) : ?>
    <div class="border p-4">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Detalles de Sede</h2>
            <button onclick="openModal()" class="bg-blue-500 text-white px-4 py-2 rounded">Crear Sede</button>

        </div>

        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nombre de la Sede
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php foreach ($datos as $dato) : ?>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900"><?php echo $dato['id']; ?></div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900"><?php echo $dato['locationName']; ?></div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else : ?>
    <p class="text-red-500">No se encontraron datos para la sede con ID <?php echo $idSede; ?></p>
<?php endif; ?>
