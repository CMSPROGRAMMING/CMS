<?php

    $link = Conection();

    function LoadCurrentModel()
    {
        //require_once MODELS_DIR . "index.php";
        $current_model = GetCurrentController();
        $filename = MODELS_DIR . $current_model. '.php';
        
        if($current_model != "home")
        {
            if(file_exists($filename))
            {
                require_once $filename;
            }
            else
            {
                ModelLoadError($current_model);
            }            
        }        
    }
    
    LoadCurrentModel();

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

    
    function Update($tablename, $columnnames=array(), $value=array(),$mathematicalconditions=array(),$logicalconditions=array())
    { 
        $i=0;
        foreach($columnnames as $key)
        {
            if ($i == 0)
            {
                $column = $key.'=\''.$value[$i].'\'';
                $i++;
            }
            else 
            { 
                $column .= ','.$key.'=\''.$value[$i].'\'';
                $i++;
            }
        }              
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
        $query="UPDATE $tablename SET $column WHERE $values";
        return $query;     

    }      

    
    
    function Insert($tablename,$columnnames=array(),$value=array())
    {
        $i = 0;
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
                $i++;
            }
        }        
        
        $i = 0;
        foreach($value as $key)
        {
            if ($i == 0)
            {
                $values = '\''.$key.'\'';
                $i++;
            }
            else 
            { 
                $values .= ','.'\''.$key.'\'';
                $i++;
            }
        }
        
        $query="INSERT INTO $tablename ($column) VALUES ($values)";
        return $query;
    }
    
    function Delete($tablename,$mathematicalconditions=array(),$logicalconditions=array())
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
        $query="DELETE FROM $tablename WHERE $values";
        return $query;  
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

    function CheckPermission($controller,$action,$dataPermission)
    {
        $search =0;
        $length = count($dataPermission);
        for ($i=0 ; $i < $length ; $i++)
        {
            if (($dataPermission[$i]['controller'] == $controller) && ($dataPermission[$i]['action'] == $action))
                {
                  ++$search;
                }
        }
        if ($search != 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    function SelectSort($tablename,$columnnames=array(),$mathematicalconditions=array(),$logicalconditions=array(),$sortowanie=array())
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
        $i = 0;
        foreach($sortowanie as $key)
        {
            if ($i == 0)
            {
                $sort = $key;
                $i++;
            }
            else 
            { 
                $sort .= ','.$key;
            }
        }
        if (count($mathematicalconditions)==0)
        {
            $query="SELECT $column FROM $tablename ORDER BY $sort DESC";
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
            
            $query="SELECT $column FROM $tablename WHERE $values ORDER BY $sort DESC";
            return $query;
        }
    }
    
    function ResultExtractSort($tabel_name, $columns_name=array(), $mathematicalconditions=array(),$logicalconditions=array(),$sort=array())
    {
        $result = DoQuery(SelectSort($tabel_name, $columns_name, $mathematicalconditions, $logicalconditions,$sort));
        
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
    
    
    //DoQuery(update('sys_logs',array('user','message'),array('Krolik','Wal sie leszczu'),Condition('id','=','95')));

 
  //DoQuery(Insert('module',array('name','path','active','language'),array('nazwa','katalog/nazwa','1','niemiecki')));
  //DoQuery(Delete('module',array(Condition('id','<=','1'),Condition('language','=','niemi'),Condition('active','=','1')),array('or','and')));
  //DoQuery(Update('sys_logs',array('user','message'),array('Marcin','Jest Ok'),array(Condition('id','=','114'),Condition('user','=','Tweester'),Condition('id','=','6')),array('and','or')));

  //Select('sys_logs',array('id','user','message'),array(Condition('id','>','5'),Condition('user','=','Tweester'),Condition('message','=','Poprawne zapytanie')),array('and','or')); 
  //Select('sys_logs',array('id','user','message'),NULL,NULL); 

   //$result = DoQuery(Select(tabela,rzecz));
    
   // Select(Tabel,rzecz) = "SELECT rzecz FROM tabela";

    //$result = DoQuery(Select('sys_logs',array('query','user','message')));

    //$data = ResultExtract('sys_logs', array('query','user'), array(Condition('id','<','5')), NULL);
    

    /*for($i = 0; $i < count($data); $i++)
    {
        echo "User: " . $data[$i]["user"] . "<br />";
        echo "Query: " . $data[$i]["query"] . "<br />";        
        //echo "Message: " . $data[$i]["message"] . "<br /><br />";
    }

    //DoQuery($query);
    //$result = DoQuery(Select('sys_logs',array('query','user','message')));*/

