<?php

    $link = Conection();
    
    $query = "SELECT * FROM sys_logs";
    echo $query;
    
    function LoadCurrentModel()
    {
        $current_model = GetCurrentController();
        
        if($current_model != "home")
        {
            require_once MODELS_DIR . $current_model. '.php';
        }
    }

    function DoQuery($query)
    {
        $result = AskQuery($GLOBALS['link'], $query);
    }
    
    function Select($nazwatabeli,$nazwykolumn=array())
    {
       $i=0;
    foreach($nazwykolumn as $klucz)
        {
            if ($i == 0){
            $kolumny = $klucz;
             $i++;
            }
            else { 
            $kolumny .= ','.$klucz;
            }
        }
        $query="SELECT $kolumny FROM $nazwatabeli";
        return $query;
    }
    
    //$result = DoQuery(Select(tabela,rzecz));
    
   // Select(Tabel,rzecz) = "SELECT rzecz FROM tabela";
    
    //LoadCurrentModel();
    
    DoQuery($query);
    $result = DoQuery(Select('sys_logs',array('query','user','message')));
