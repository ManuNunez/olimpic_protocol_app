<?php

    echo 'entro al test <br>';
    $sede_name = 'string vemos';
    echo strlen($sede_name);
    echo '<br>';
    echo $sede_name;
    echo '<br>';

    $sede_name_holder = $sede_name;




    for($i = 0; $i != strlen($sede_name_holder); $i++) {
        if($sede_name_holder[$i] != ' ') $sede_name[$i] = $sede_name_holder[$i];
        else $sede_name[$i] = '-';
    }

    echo $sede_name;

?>