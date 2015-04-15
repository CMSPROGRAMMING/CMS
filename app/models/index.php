<?php

    $link = Conection();
    
    $query = "SELECT * FROM sys_logs";
    echo $query;
    
    function LoadCurrentModel()
    {
        $current_model = GetCurrentController();
        echo $current_model;
        
        if($current_model != "home")
        {
            require_once MODELS_DIR . $current_model. '.php';
        }
    }

    function DoQuery($query)
    {
        AskQuery($GLOBALS['link'], $query);
    }
    
    $result = DoQuery(Select(tabela,rzecz));
    
    Select(Tabel,rzecz) = "SELECT rzecz FROM tabela";
    
    //LoadCurrentModel();
    
    //DoQuery($query);
    