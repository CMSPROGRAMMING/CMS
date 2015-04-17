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
        
        return $result;
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
            $query="SELECT $column FROM $tablename";
            return $query;
        }
        else
        {
            $i=0;
            foreach($mathematicalconditions as $key)
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
            
            $query="SELECT $column FROM $tablename WHERE $values";
            return $query;
        }
    }

    function ResultExtract($tabel_name, $columns_name=array(), $mathematicalconditions=array(),$logicalconditions=array())
    {
        $result = DoQuery(Select($tabel_name, $columns_name, $mathematicalconditions, $logicalconditions));
        
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
        if(!empty($data_array))
        {
            return $data_array;
        }
        else
        {
            $data_array = NULL;
        }
    }

  //Select('sys_logs',array('id','user','message'),array(Condition('id','>','5'),Condition('user','=','Tweester'),Condition('message','=','Poprawne zapytanie')),array('and','or')); 
  //Select('sys_logs',array('id','user','message'),NULL,NULL); 

   //$result = DoQuery(Select(tabela,rzecz));
    
   // Select(Tabel,rzecz) = "SELECT rzecz FROM tabela";

    //$result = DoQuery(Select('sys_logs',array('query','user','message')));

    $data = ResultExtract('sys_logs', array('query','user'), array(Condition('id','<','5')), NULL);
    

    for($i = 0; $i < count($data); $i++)
    {
        echo "User: " . $data[$i]["user"] . "<br />";
        echo "Query: " . $data[$i]["query"] . "<br />";        
        //echo "Message: " . $data[$i]["message"] . "<br /><br />";
    }

    //DoQuery($query);
    //$result = DoQuery(Select('sys_logs',array('query','user','message')));

