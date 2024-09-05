<head>
    <link rel="stylesheet" href="resources/main.css">
</head>
<?php

// Obtener los datos de concursos
include_once '../models/contest/return_contests.php';
$contests = json_decode(returnContests($conn), true);

?>

<div class="border p-4">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold hover:text-blue-400 hover:underline text-blue-500">
            Proximos Concursos
        </h2>
    </div>

    <div class="mb-4">
        <input type="text" id="searchInput" placeholder="Buscar concurso..." class="p-2 border rounded-md">
    </div>

    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Nombre del concurso
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Fecha
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Duración
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Acciones
            </th>
        </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
        <?php if ($contests['status'] == "1" && !empty($contests['data'])): ?>
            <?php foreach ($contests['data'] as $contest): ?>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900"><?php echo htmlspecialchars($contest['name'], ENT_QUOTES, 'UTF-8'); ?></div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900"><?php echo htmlspecialchars($contest['contest_date'], ENT_QUOTES, 'UTF-8'); ?></div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900"><?php echo htmlspecialchars($contest['duration_minutes'], ENT_QUOTES, 'UTF-8'); ?> minutos</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">

                            <button class="text-blue-500">Por definir</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3" class="px-6 py-4 whitespace-nowrap text-red-500">No se encontraron datos.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<div id="modal" class="fixed inset-0 bg-gray-800 bg-opacity-75 z-50 hidden">
    <div class="flex items-center justify-center h-screen">
        <div class="bg-white p-8 rounded shadow-md w-1/2">
            <h2 id="modalTitle" class="text-2xl font-bold mb-4">Inscribirme</h2>
            <form id="inscripcionForm" method="POST">
                
                <label for="coachName" class="block text-sm font-medium text-gray-700 mt-4">Nombre de tu profesor:</label>
                <input type="text" id="coachName" name="coachName" class="mt-1 p-2 border rounded-md w-full text-black" required>

                
                <label for="coachEmail" class="block text-sm font-medium text-gray-700 mt-4">Correo de tu profesor:</label>
                <input type="email" id="coachEmail" name="coachEmail" class="mt-1 p-2 border rounded-md w-full text-black" required>

                <label for="school" class="block text-sm font-medium text-gray-700 mt-4">CCT de tu Escuela:</label>
                <input type="text" id="school" name="school" class="mt-1 p-2 border rounded-md w-full text-black" required>
                
                <label for="campusSelect" class="block text-sm font-medium text-gray-700 mt-4">Selecciona un campus:</label>
                <select id="campusSelect" name="campus" class="mt-1 p-2 border rounded-md w-full text-black">
                    <!-- Opciones dinámicas -->
                </select>
                
                <!-- Select para nivel -->
                <label for="levelSelect" class="block text-sm font-medium text-gray-700 mt-4">Selecciona un nivel:</label>
                <select id="levelSelect" name="levelSelect" class="mt-1 p-2 border rounded-md w-full text-black">
                    <option value="1">Nivel 1 (1 - 5 de Primaria)</option>
                    <option value="2">Nivel 2 (6 de Primaria)</option>
                    <option value="3">Nivel 3 (1 de Secundaria)</option>
                    <option value="4">Nivel 4 (2 de Secundaria)</option>
                    <option value="5">Nivel 5 (3 de Secundaria)</option>
                    <option value="6">Nivel 6 (1 - 2 de Preparatoria)</option>
                    <option value="7">Nivel 7 (3 - 4 de Preparatoria)</option>
                    <option value="8">Nivel 8 (5 - 6 de Preparatoria)</option>
                </select>

                <div class="mt-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Registrarme</button>
                    <button type="button" onclick="closeModal()" class="ml-2 text-gray-600">Regresar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal de Error -->
<div id="errorModal" tabindex="-1" aria-hidden="true" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="fixed inset-0 bg-black opacity-50" aria-hidden="true"></div>
    <div class="relative bg-white p-6 rounded-lg shadow-lg max-w-sm mx-auto z-10">
        <button type="button" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600" data-modal-hide="hideErrorModalButton">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Close modal</span>
        </button>
        <div class="text-center">
            <h3 id="errorModalTitle" class="text-lg font-medium text-gray-900">Error</h3>
            <p id="errorModalMessage" class="mt-2 text-sm text-gray-600"></p>
            <button data-modal-hide="hideErrorModalButton" type="button" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-800">
                Cerrar
            </button>
        </div>
    </div>
</div>

<script type="module" src=""></script>
