<head>
    <link rel="stylesheet" href="../view/resources/main.css">
</head>
<?php

    include_once '../controller/services/return_sedes.php';
    

    $datos = json_decode($ans, true);

?>

<?php if ($datos) : ?>
    <div class="border p-4">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Sedes registradas</h2>
        </div>

        <div class="mb-4">
            <input type="text" id="searchInput" placeholder="Buscar sede..." class="p-2 border rounded-md">
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
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Acciones
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
                        <td class="px-6 py-4 whitespace-nowrap">
                            
                            <button id="consultar-btn" onclick="openModal('consultar', <?php echo $dato['id']; ?>)" class="text-blue-500">Consultar</button>
                            
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
            <h2 id="modal-title" class="text-2xl font-bold mb-4">Cuentas asignadas</h2>
            <table id="modal-content" class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            USUARIO
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Cuentas asignadas -->
                </tbody>
            </table>
            <button type="button" onclick="closeModal()" class="ml-2 text-gray-600">Salir</button>
        </div>
    </div>
</div>

<!-- <script src="resources/js/modal.js"></script> -->
<script src="resources/js/return_sedeAccounts.js"></script>


