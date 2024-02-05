<!-- CrearSedeComponent.php -->
<div id="modal" class="fixed inset-0 bg-gray-800 bg-opacity-75 z-50 hidden">
    <div class="flex items-center justify-center h-screen">
        <div class="bg-white p-8 rounded shadow-md w-1/2">
            <!-- Contenido del formulario para crear sede -->
            <h2 class="text-2xl font-bold mb-4">Crear Sede</h2>
            <!-- Agrega aquí el formulario para la creación de la sede -->
            <!-- Ejemplo de formulario básico -->
            <form action="crear_sede.php" method="POST">
                <label for="nombre_sede" class="block text-sm font-medium text-gray-700">Nombre de la Sede:</label>
                <input type="text" id="nombre_sede" name="nombre_sede" class="mt-1 p-2 border rounded-md w-full">
                <div class="mt-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar</button>
                    <button type="button" onclick="closeModal()" class="ml-2 text-gray-600">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById('modal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('modal').classList.add('hidden');
    }
</script>
