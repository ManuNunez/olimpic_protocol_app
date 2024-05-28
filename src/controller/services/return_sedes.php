<head>
    <link rel="stylesheet" href="resources/main.css">
</head>

<div class="container mt-4">
    <?php
    // Incluir el archivo que devuelve los datos de los concursos
    include_once '../controller/services/return_contests.php';

    // Decodificar los datos JSON obtenidos
    $contests = json_decode($ans, true);

    // Verificar si hay datos o mostrar un mensaje de error
    if ($contests && !isset($contests['error'])) :
    ?>
    <div class="border p-4">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Administrar Concursos</h2>
            <button onclick="openModal('crear')" class="bg-blue-500 text-white px-4 py-2 rounded">Crear Concurso</button>
        </div>

        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nombre del Concurso
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Sede
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Fecha del Concurso
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Duración (minutos)
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php foreach ($contests as $contest) : ?>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900"><?php echo $contest['id']; ?></div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900"><?php echo $contest['name']; ?></div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900"><?php echo obtenerNombreSedePorID($contest['sede_id']); ?></div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900"><?php echo $contest['contest_date']; ?></div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900"><?php echo $contest['duration_minutes']; ?></div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <button onclick="openModal('editar', <?php echo $contest['id']; ?>)" class="text-blue-500">Editar</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php else : ?>
    <p class="text-red-500">No se encontraron concursos activos.</p>
    <?php endif; ?>

    <div id="modal" class="fixed inset-0 bg-gray-800 bg-opacity-75 z-50 hidden">
        <div class="flex items-center justify-center h-screen">
            <div class="bg-white p-8 rounded shadow-md w-1/2">
                <h2 id="modal-title" class="text-2xl font-bold mb-4">Crear/Editar Concurso</h2>
                <form id="concursoForm" method="POST">
                    <!-- Aquí van los campos para crear/editar el concurso -->
                    <div class="mb-4">
                        <label for="nombreConcurso" class="block text-sm font-medium text-gray-700">Nombre del Concurso:</label>
                        <input type="text" id="nombreConcurso" name="nombreConcurso" class="mt-1 p-2 border rounded-md w-full">
                    </div>
                    <div class="mb-4">
                        <label for="sedeConcurso" class="block text-sm font-medium text-gray-700">Sede:</label>
                        <!-- Aquí podrías mostrar un select con las sedes disponibles -->
                        <input type="text" id="sedeConcurso" name="sedeConcurso" class="mt-1 p-2 border rounded-md w-full">
                    </div>
                    <div class="mb-4">
                        <label for="fechaConcurso" class="block text-sm font-medium text-gray-700">Fecha del Concurso:</label>
                        <input type="date" id="fechaConcurso" name="fechaConcurso" class="mt-1 p-2 border rounded-md w-full">
                    </div>
                    <div class="mb-4">
                        <label for="duracionConcurso" class="block text-sm font-medium text-gray-700">Duración (minutos):</label>
                        <input type="number" id="duracionConcurso" name="duracionConcurso" class="mt-1 p-2 border rounded-md w-full">
                    </div>
                </form>
                <div class="mt-4">
                    <button type="submit" form="concursoForm" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar</button>
                    <button type="button" onclick="closeModal()" class="ml-2 text-gray-600">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Incluir jQuery y Bootstrap JS para funcionalidades y estilos -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- Scripts personalizados -->
<script src="resources/js/modal.js"></script>
<script src="resources/js/administrar_concursos.js"></script>

<!-- Script adicional si necesitas obtener el nombre de la sede por su ID -->
<script>
function obtenerNombreSedePorID(sede_id) {
    // Función para obtener el nombre de la sede por su ID
    // Implementa la lógica que corresponda según tu aplicación
    return "Nombre de la Sede";
}
</script>
