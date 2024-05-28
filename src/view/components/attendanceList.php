<head>
    <link rel="stylesheet" href="../view/resources/main.css">
</head>

<?php
session_start();

$userType = "teacher";
if($userType === "teacher"){
    $_SESSION['userType'] = 'teacher';
    include_once '../controller/services/return_participants_beta.php';
}else{
    $_SESSION['userType'] = 'other';
}

$datos = getTestData();

?>




<?php if (isset($_SESSION['userType']) && $_SESSION['userType'] === 'teacher') : ?>
    <div class="border p-4">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Lista de participantes</h2>
            
        </div>

        <div class="mb-4">
            <input type="text" id="searchInput" placeholder="Buscar sede..." class="p-2 border rounded-md">
        </div>

        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nivel
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Escuela
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php foreach ($datos as $dato) : ?>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900"><?php echo $dato['name']; ?></div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900"><?php echo $dato['level']; ?></div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900"><?php echo $dato['school']; ?></div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <button class="text-blue-500">Asistencia</button>
                            <!--- <button onclick="borrarSede(<?php echo $dato['name']; ?>)" class="text-red-500 ml-2">Borrar</button> -->
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else : ?>
    <p class="text-red-500">Esta cuenta no tiene los permisos necesario para esta sección</p>
<?php endif; ?>


