<?php

    $link = Conection();
    
    //$query = "SELECT * FROM sys_logs";
    //echo $query;
    
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
    
    //$result = DoQuery(Select('sys_logs',array('query','user','message')));

    $data = ResultExtract('sys_logs', array('query','user'));
    
    for($i = 0; $i < count($data); $i++)
    {
        echo "User: " . $data[$i]["user"] . "<br />";
        echo "Query: " . $data[$i]["query"] . "<br />";        
        //echo "Message: " . $data[$i]["message"] . "<br /><br />";
    }
