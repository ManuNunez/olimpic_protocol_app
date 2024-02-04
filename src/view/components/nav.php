<nav class="bg-blue-500 p-4">
    <div class="container mx-auto flex justify-between items-center">

        <div class="flex items-center">
            <a href="#" class="text-white font-bold text-lg">Inicio</a>
        </div>

        <div class="lg:hidden">
            <button id="menu-toggle" class="text-white focus:outline-none">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>

        <div class="hidden lg:flex space-x-4">
            <a href="#" class="text-white">Chat</a>
            <a href="#" class="text-white">Cronómetro</a>
            <a href="#" class="text-white">Lista de Asistencia</a>
            <a href="#" class="text-white">Registro</a>
            <a href="#" class="text-white">Olimpiadas</a>
            <a href="#" class="text-white">Sedes</a>
            <a href="#" class="text-white">Cuentas</a>
        </div>
    </div>
</nav>

<div id="mobile-menu" class="lg:hidden hidden bg-white p-4">
    <a href="#" class="block text-gray-800 mb-2">Chat</a>
    <a href="#" class="block text-gray-800 mb-2">Cronómetro</a>
    <a href="#" class="block text-gray-800 mb-2">Lista de Asistencia</a>
    <a href="#" class="block text-gray-800 mb-2">Registro</a>
    <a href="#" class="block text-gray-800 mb-2">Olimpiadas</a>
    <a href="#" class="block text-gray-800 mb-2">Sedes</a>
    <a href="#" class="block text-gray-800 mb-2">Cuentas</a>
</div>


<script src="../resources/js/NavToggle.js"></script>