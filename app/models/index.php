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
        
    function Condition($columnname,$sign,$value)
    {
        return $condition = $columnname.$sign.'"'.$value.'"';
    }
    
    function Select($tablename,$columnnames=array(),$mathematicalconditions=array(),$logicalconditions=array())
    {
       $i=0;

    foreach($columnnames as $key)
        {
            if ($i == 0)
            {
                $column = $key;
                $i++;
            }
            else 
            { 
                $column .= ','.$key;
            }
        }
    if (count($mathematicalconditions)==0)
    {
        echo "SELECT $column FROM $tablename";
        $query="SELECT $column FROM $tablename";
        return $query;
    }
    else
    {
         $i=0;
    foreach ($mathematicalconditions as $key)
        {
            if ($i == 0)
            {
                $values = $key;
                $i++;
            }
            else
            {                
                $values .= ' '.$logicalconditions[$i-1].' '.$key;
                $i++;
            }
                
        }
        echo "SELECT $column FROM $tablename WHERE $values";
        $query="SELECT $column FROM $tablename WHERE $values";
        return $query;
    }
    }
    
  //Select('sys_logs',array('id','user','message'),array(Condition('id','>','5'),Condition('user','=','Tweester'),Condition('message','=','Poprawne zapytanie')),array('and','or')); 
  //Select('sys_logs',array('id','user','message'),NULL,NULL); 

   //$result = DoQuery(Select(tabela,rzecz));
    
   // Select(Tabel,rzecz) = "SELECT rzecz FROM tabela";
    
    //LoadCurrentModel();
    
    //DoQuery($query);
    //$result = DoQuery(Select('sys_logs',array('query','user','message')));
