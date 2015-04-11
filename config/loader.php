<?php

/* 
 * Ładuje wszystko co potrzebne
 */

function LoadMainFile($file_name)
{
    if(file_exists(CONFIG_DIR.$file_name))
    {
        echo 'Poprawnie zaladowany: ' . $file_name . '<br />';
        require_once CONFIG_DIR . $file_name;
    }
    else
    {
        echo 'Błąd ładowania' . $file_name;
    }   
}

    LoadMainFile('constans.php');
    LoadMainFile('db.php');
    LoadMainFile('error.php');
    LoadMainFile('functions.php');
