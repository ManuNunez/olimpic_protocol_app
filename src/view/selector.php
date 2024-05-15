<?php

function contentSelector($section) 
{
    $filename = 'components/' . $section . '.php';
    

    if (file_exists($filename)) {
        include_once $filename;
    }
}
?>
