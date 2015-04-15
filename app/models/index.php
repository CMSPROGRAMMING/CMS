<?php

    $link = Conection();
    
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
    
    function Condition($nazwakolumny,$znak,$wartosc)
    {
        return $warunek = $nazwakolumny.$znak.$wartosc;
    }
    
    function SelectCondition($nazwatabeli,$nazwykolumn=array(),$warunkimat=array(),$warunkilog=array())
    {
       $i=0;
    foreach($nazwykolumn as $klucz)
        {
            if ($i == 0)
            {
                $kolumny = $klucz;
                $i++;
            }
            else 
            { 
                $kolumny .= ','.$klucz;
            }
        }
         $i=0;
    foreach ($warunkimat as $klucz)
        {
            if ($i == 0)
            {
                $warunki = $klucz;
                $i++;
            }
            else
            {                
                $warunki .= ' '.$warunkilog[$i-1].' '.$klucz;
                $i++;
            }
                
        }
        $query="SELECT $kolumny FROM $nazwatabeli WHERE $warunki";
        return $query;
    }
    //SelectCondition('sys_logs',array('query','user','message'),array(Condition('query','=','cos'),Condition('user','>','4'),Condition('message','<','5')),array('and','or')); 
    
   //$result = DoQuery(Select(tabela,rzecz));
    
   // Select(Tabel,rzecz) = "SELECT rzecz FROM tabela";
    
    //LoadCurrentModel();
    
    //DoQuery($query);
    //$result = DoQuery(Select('sys_logs',array('query','user','message')));
