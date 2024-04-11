<head>
    <link href="resources/main.css" rel="stylesheet">
    <meta charset="UTF-8">
</head>

<header class="bg-white">
    <nav class="mx-auto flex max-w-7xl items-center justify-between p-2 lg:px-1" aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="index.php" class="-m-1.5 p-1.5">
                <span class="sr-only">OMRCH</span>
                <img class="w-16" src="resources/imgs/LogoOlimpiada.png" alt="">
            </a>
        </div>
        <div class="hidden lg:flex lg:gap-x-9">

            <a href="?section=accounts" class="block text-gray-800 mb-2 leading-6">Cuentas</a>
            <a href="?section=contest" class="block text-gray-800 mb-2 leading-6">Concursos</a>
            <a href="?section=timer" class="block text-gray-800 mb-2 leading-6">Cronómetro</a>
            <a href="?section=chat" class="block text-gray-800 mb-2 leading-6">Chat</a>
            <a href="?section=attendanceList" class="block text-gray-800 mb-2 leading-6">Lista de Asistencia</a>
            <a href="?section=registration" class="block text-gray-800 mb-2 leading-6">Registro</a>
            <a href="?section=locations" class="block text-gray-800 mb-2 leading-6" >Sedes</a>

        </div>
        <div class="hidden lg:flex lg:flex-1 lg:justify-end lg:gap-x-4">
            <a href="#" class="text-m font-semibold leading-6 text-gray-900">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 3.75v4.5m0-4.5h-4.5m4.5 0-6 6m3 12c-8.284 0-15-6.716-15-15V4.5A2.25 2.25 0 0 1 4.5 2.25h1.372c.516 0 .966.351 1.091.852l1.106 4.423c.11.44-.054.902-.417 1.173l-1.293.97a1.062 1.062 0 0 0-.38 1.21 12.035 12.035 0 0 0 7.143 7.143c.441.162.928-.004 1.21-.38l.97-1.293a1.125 1.125 0 0 1 1.173-.417l4.423 1.106c.5.125.852.575.852 1.091V19.5a2.25 2.25 0 0 1-2.25 2.25h-2.25Z" />
                </svg>
            </a>
            <a href="#" class="text-md font-semibold leading-6 text-gray-900">
                Llamar
            </a>
        </div>


    </nav>

    <!-- Mobile menu, show/hide based on menu open state. -->
    <div  class="lg:hidden" role="dialog" aria-modal="true">
        <!-- Background backdrop, show/hide based on slide-over state. -->
        <div class="fixed inset-0 z-10"></div>
        <div id="menu" class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
            <div class="flex items-center justify-between">
                <a href="#" class="-m-1.5 p-1.5">
                    <span class="sr-only">OMRCH</span>
                    <img class="h-16 w-auto" src="resources/imgs/LogoOlimpiada.png" alt="">
                </a>
                <button id="menuBtn"  type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Close menu</span>
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
            <div   class="mt-6 flow-root" >
                <div class="-my-6 divide-y divide-gray-500/10">
                    <div class="space-y-2 py-6">

                        <a href="?section=chat" class="block text-gray-800 mb-2">Chat</a>
                        <a href="?section=timer" class="block text-gray-800 mb-2">Cronómetro</a>
                        <a href="?section=attendanceList" class="block text-gray-800 mb-2">Lista de Asistencia</a>
                        <a href="?section=registration" class="block text-gray-800 mb-2">Registro</a>
                        <a href="?section=contest" class="block text-gray-800 mb-2">Concursos</a>
                        <a href="?section=locations" class="block text-gray-800 mb-2">Sedes</a>
                        <a href="?section=accounts" class="block text-gray-800 mb-2">Cuentas</a>


                    </div>
                </div>

            </div>
        </div>
    </div>

</header>
<?php

include_once 'selector.php';

$section = isset($_GET['section']) ? $_GET['section'] : '';

if (function_exists('contentSelector')) {
    contentSelector($section);
} else {
    echo 'The function contentSelector is not defined.';
}

?>
