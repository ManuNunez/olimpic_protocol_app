<head>
    <link rel="stylesheet" href="resources/main.css">
</head>


<div class=" items-center justify-center flex w-full">
    <div  class="bg-gray-50  p-8 rounded shadow-md w-2/6 h">
        <div class="text-center mb-6">
            <h2 class="text-2xl font-semibold">Iniciar Sesión</h2>
        </div>

        <form id="record">
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-black">Nombre de Usuario</label>
                <input type="text" id="username" name="username" class="mt-1 p-2 w-full bg-gray-200 text-black border rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-black">Contraseña</label>
                <input  type="password" id="password" name="password" class="mt-1 p-2 w-full bg-gray-200 text-black border rounded-md" required>
            </div>

            <button type="button" onclick="validateData()" class="bg-blue-500 text-white px-4 py-2 rounded-md w-full">Iniciar Sesión</button>
        </form>
    </div>
<<<<<<< Updated upstream

    <form id="record">
        <div class="mb-4">
            <label for="username" class="block text-sm font-medium text-black">Nombre de Usuario</label>
            <input type="text" id="username" name="username" class="mt-1 p-2 w-full bg-gray-100 text-black border rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-black">Contraseña</label>
            <input  type="password" id="password" name="password" class="mt-1 p-2 w-full bg-gray-100 text-black border rounded-md" required>
        </div>

        <button type="button" onclick="validateData(event)" class="bg-blue-500 text-white px-4 py-2 rounded-md w-full">Iniciar Sesión</button>
    </form>
=======
>>>>>>> Stashed changes
</div>

<script src="resources/js/login.js"></script>