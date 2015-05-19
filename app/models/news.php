<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// model
    function M_GetBasicNewsSort()
    {
        $dataBasicNews = ResultExtractSort("news", array('id','title','date','time','description','contents'),NULL, NULL,array('date','time'));
        return $dataBasicNews;
    }
    function M_GetNews($id)
    {
        $News = ResultExtract("news", array('id','title','date','time','description','contents'),array(Condition('id','=', $id)), NULL);
        return $News;
    }
    function M_AddNews($data)
    {
        $date=date("d-m-Y");
        $time=date("H:i");
         return DoQuery(Insert("news", array('title','date','time','description','contents'),
                                                 array($data["title"],$date,$time, $data["description"], $data["contents"])));
    }
    function M_editNews($data)
    {
        return DoQuery(Update('news', array('title','description','contents'), 
                                              array($data["title"],$data["description"],$data["contents"]),
                                              array((Condition('id','=',$data['id']))),
                                              NULL));
    }    
    function M_deleteNews($data)
    {
        return DoQuery(Delete('news',array((Condition('id','=',$data['id']))),NULL));
    }
    function M_GetInfoBox1()
    {
        $dataBox1 = ResultExtract('box1', array('headline1','headline2','path'), NULL, NULL);
        return $dataBox1;
    }
    
    function M_UpdateBox1($data)
    {
        if (isset($data['path']))
        {
        
           $deleteimage = ResultExtract('box1', array('path'),NULL,NULL);
           unlink($deleteimage[0]['path']);
        return DoQuery(Update('box1', array('headline1','headline2','path'), 
                                              array($data["headline1"],$data["headline2"],$data["path"]),
                                              array((Condition('id','=',1))),
                                              NULL));
        
        }
        else
        {
          return DoQuery(Update('box1', array('headline1','headline2'), 
                                              array($data["headline1"],$data["headline2"]),
                                              array((Condition('id','=',1))),
                                              NULL));
        }
    }
    
    function M_TransferPicture($plik_tmp,$plik_name, $path)
    {
    if (file_exists($path)) 
        {
        echo 'Plik o takiej nazwie już istnieje!'; exit(); 
        }       
    elseif(@strtolower(end(explode('.',$plik_name)))!='jpg' and @strtolower(end(explode('.',$plik_name)))!='png')  
        {  
            echo 'Przesyłany plik nie jest obrazem JPG ani PNG !'; exit();  
        }     
    else
    move_uploaded_file($plik_tmp, "$path");    
    }
    
    function M_GetInfoBox2()
    {
        $dataBox2 = ResultExtract('box2', array('headline1'), NULL, NULL);
        return $dataBox2;
    }
    
    function M_GetTeamBox2()
    {
    $dataTeam = ResultExtract('box2team', array('rankteam','teamname'), NULL, NULL);
        return $dataTeam;
    }

    function M_UpdateBox2($data)
    {
         DoQuery(Update('box2', array('headline1'),array($data['headline1']), array(Condition('id', '=', 1))));
         $line = explode("\n", $data['teamlist']);
         $length = count($line);
         if ($data['teamlist'] == NULL)
         {
         DoQuery(Delete('box2team'));
         }
         else 
        {
        DoQuery(Delete('box2team'));
        for ($i = 0 ; $i < $length ; $i++ )
        {
          $linetwo =  explode(". ", $line[$i]);
          $dataTeam[$i]['rankteam'] = $linetwo[0];
          $dataTeam[$i]['teamname'] = $linetwo[1];
          DoQuery(Insert('box2team', array('rankteam','teamname'),array($dataTeam[$i]['rankteam'],$dataTeam[$i]["teamname"])));
        }                                    
        }
    }