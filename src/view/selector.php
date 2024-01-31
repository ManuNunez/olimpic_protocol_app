<?php

    function contentSelector($section) 
    {
        $filename = 'components/' . $section . '.php';
        include_once $filename;
    }
?>