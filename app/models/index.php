<?php

    $link = Conection();
    
    $query = "SELECT * FROM sys_logs";
    echo $query;

    function DoQuery($query)
    {
        AskQuery($GLOBALS['link'], $query);
    }
    
    DoQuery($query);
    