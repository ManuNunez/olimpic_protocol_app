<head>
    <link href="resources/main.css" rel="stylesheet">
    <meta charset="UTF-8">
    <script src="resources/js/jquery-3.3.1.min.js"></script>
    <script src="resources/js/NavToggle.js"></script>
</head>
<body>


<header class="bg-white ">
    <nav class=" flex justify-between px-2 " aria-label="Global">
        <div class="flex">
            <a href="index.php" class="">
                <span class="sr-only">OMRCH</span>
                <img class="h-16 my-3" src="resources/imgs/LogoOMRCHVector.svg" alt="">
            </a>
        </div>

        <div class="hidden  lg:flex lg:gap-x-5  my-3 w-full justify-center    lg:text-lg ">

            <?php if($_SESSION['logged'] == true && $_SESSION['user_type'] == 'manager') : ?> 
                <a href="?section=accounts" class="py-4 text-gray-800 mb-2 leading-6">Cuentas</a>
                <a href="?section=contest" class="py-4  text-gray-800 mb-2 leading-6">Concursos</a>
                <a href="?section=timer" class="py-4  text-gray-800 mb-2 leading-6">Cronómetro</a>
                <a href="?section=chat" class="py-4  text-gray-800 mb-2 leading-6">Chat</a>
                <a href="?section=attendanceList" class="py-4  text-gray-800 mb-2 leading-6">Lista de Asistencia</a>
                <a href="?section=registration" class="py-4  text-gray-800 mb-2 leading-6">Registro</a>
                <a href="?section=locations" class="py-4  text-gray-800 mb-2 leading-6" >Sedes</a>
            <?php elseif($_SESSION['logged'] == true && $_SESSION['userType'] == 'organizer') : ?>
                <a href="?section=attendanceList" class="py-4  text-gray-800 mb-2 leading-6">Lista de Asistencia</a>
                <a href="?section=chat" class="py-4  text-gray-800 mb-2 leading-6">Chat</a>

            <?php elseif($_SESSION['logged'] == true && $_SESSION['user_type'] == 'staff') : ?>
                <a href="?section=attendanceList" class="py-4  text-gray-800 mb-2 leading-6">Lista de Asistencia</a>


            <?php elseif($_SESSION['logged'] == true && $_SESSION['user_type'] == 'classroom') : ?>
                <a href="?section=attendanceList" class="py-4  text-gray-800 mb-2 leading-6">Lista de Asistencia</a>
                <a href="?section=chat" class="py-4  text-gray-800 mb-2 leading-6">Chat</a>


            <?php endif; ?>
            

        </div>



        <div class="  lg:hidden  sm:p-2.5 sm:justify-end sm:flex ">
            <button class="rounded-md p-2.5 text-gray-700 lg:hidden" type="button" id="openMenuBtn">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>

    </nav>

    <!-- Mobile menu, show/hide based on menu open state. -->
    <div  class="hidden" role="dialog" id="menu" aria-modal="true">
        <div class="fixed inset-0 z-10"></div>
        <div  class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
            <div id="" class="flex items-center justify-between">
                <a href="index.php" class="-m-1.5 p-1.5">
                    <span class="sr-only">OMRCH</span>
                    <img class="h-16 w-auto" src="resources/imgs/LogoOlimpiada.png" >
                </a>
                <button id="closeMenuBtn"  type="button" class="rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Close menu</span>
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
            <div   class="mt-6 flow-root" >
                <div class="-my-6 divide-y divide-gray-500/10">

                    <div class="space-y-2 py-6">
                        <?php if($_SESSION['logged'] == true && $_SESSION['userType'] == 'manager') : ?>
                            <a href="?section=accounts" class="py-4 text-gray-800 mb-2 leading-6">Cuentas</a>
                            <a href="?section=contest" class="py-4  text-gray-800 mb-2 leading-6">Concursos</a>
                            <a href="?section=timer" class="py-4  text-gray-800 mb-2 leading-6">Cronómetro</a>
                            <a href="?section=chat" class="py-4  text-gray-800 mb-2 leading-6">Chat</a>
                            <a href="?section=attendanceList" class="py-4  text-gray-800 mb-2 leading-6">Lista de Asistencia</a>
                            <a href="?section=registration" class="py-4  text-gray-800 mb-2 leading-6">Registro</a>
                            <a href="?section=locations" class="py-4  text-gray-800 mb-2 leading-6" >Sedes</a>
                        <?php elseif($_SESSION['logged'] == true && $_SESSION['userType'] == 'organizer') : ?>
                            <a href="?section=attendanceList" class="py-4  text-gray-800 mb-2 leading-6">Lista de Asistencia</a>
                            <a href="?section=chat" class="py-4  text-gray-800 mb-2 leading-6">Chat</a>

                        <?php elseif($_SESSION['logged'] == true && $_SESSION['userType'] == 'staff') : ?>
                            <a href="?section=attendanceList" class="py-4  text-gray-800 mb-2 leading-6">Lista de Asistencia</a>


                        <?php elseif($_SESSION['logged'] == true && $_SESSION['userType'] == 'classroom') : ?>
                            <a href="?section=attendanceList" class="py-4  text-gray-800 mb-2 leading-6">Lista de Asistencia</a>
                            <a href="?section=chat" class="py-4  text-gray-800 mb-2 leading-6">Chat</a>


                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

</header>





</body>
    <?php

    include_once 'selector.php';

    $section = isset($_GET['section']) ? $_GET['section'] : '';

    if (function_exists('contentSelector')) {
        contentSelector($section);
    } else {
        echo 'The function contentSelector is not defined.';
    }

    ?>
