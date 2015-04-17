<?php

    $link = Conection();
    
<<<<<<< HEAD
    //$query = "SELECT * FROM sys_logs";
    //echo $query;
    
=======
>>>>>>> origin/master
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
        
        return $result;
    }
        
    function Condition($columnname,$sign,$value)
    {
        return $condition = $columnname.$sign.'"'.$value.'"';
    }
    
    function Select($tablename,$columnnames=array(),$mathematicalconditions=array(),$logicalconditions=array())
    {
<<<<<<< HEAD
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
=======
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
>>>>>>> origin/master
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
    
<<<<<<< HEAD
    function ResultExtract($tabel_name, $columns_name=array())
    {
        $result = DoQuery(Select($tabel_name, $columns_name));
        
        $i = 0;
        
        while($row = mysqli_fetch_assoc($result))
	{
            for($j = 0; $j < count($columns_name); $j++)
            {
                $data_array[$i][$columns_name[$j]] = $row[$columns_name[$j]];
            }        
            $i++;
	}        
        
        mysqli_free_result($result);
        return $data_array;
    }
=======
  //Select('sys_logs',array('id','user','message'),array(Condition('id','>','5'),Condition('user','=','Tweester'),Condition('message','=','Poprawne zapytanie')),array('and','or')); 
  //Select('sys_logs',array('id','user','message'),NULL,NULL); 

   //$result = DoQuery(Select(tabela,rzecz));
    
   // Select(Tabel,rzecz) = "SELECT rzecz FROM tabela";
>>>>>>> origin/master
    
    //$result = DoQuery(Select('sys_logs',array('query','user','message')));

    $data = ResultExtract('sys_logs', array('query','user'));
    
<<<<<<< HEAD
    for($i = 0; $i < count($data); $i++)
    {
        echo "User: " . $data[$i]["user"] . "<br />";
        echo "Query: " . $data[$i]["query"] . "<br />";        
        //echo "Message: " . $data[$i]["message"] . "<br /><br />";
    }
=======
    //DoQuery($query);
    //$result = DoQuery(Select('sys_logs',array('query','user','message')));
>>>>>>> origin/master
