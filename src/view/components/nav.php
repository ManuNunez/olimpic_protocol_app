<!-- nav.php -->
<nav class="bg-blue-500 p-4">
  <div class="container mx-auto flex justify-between items-center">
    <a href="index.php" class="text-white text-2xl font-bold">INICIO</a>
    
    <div class="flex space-x-4">
      <div class="md:hidden">
        <button id="menuBtn" class="text-white">
          <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
          </svg>
        </button>
      </div>
    </div>
  </div>
  
  <div id="menu" class="md:hidden hidden transition-all duration-300 ease-in-out">
    <a href="?section=chat" class="block text-gray-800 mb-2">Chat</a>
    <a href="?section=timer" class="block text-gray-800 mb-2">cronometro</a>
    <a href="?section=attendanceList" class="block text-gray-800 mb-2">Lista de Asistencia</a>
    <a href="?section=registration" class="block text-gray-800 mb-2">Registro</a>
    <a href="?section=contest" class="block text-gray-800 mb-2">Concursos</a>
    <a href="?section=locations" class="block text-gray-800 mb-2">Sedes</a>
    <a href="?section=accounts" class="block text-gray-800 mb-2">Cuentas</a>
  </div>
</nav>
<?php

include_once 'selector.php';

$section = isset($_GET['section']) ? $_GET['section'] : '';

if (function_exists('contentSelector')) {
    contentSelector($section);
} else {
    echo 'The function contentSelector is not defined.';
}

?>
