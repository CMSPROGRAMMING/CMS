<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// controller 
    $action = GetCurrentAction();
    $controler = GetCurrentController();
    
    require_once MODELS_DIR . 'news.php';
    function GetBasicNewsSort()
    {
        $dataBasicNews= M_GetBasicNewsSort();
    }
    
    function AddNews()
    {
        $data["title"] = $_POST['title'];
        $data["description"] = $_POST['description'];
        $data["contents"] =  $_POST["contents"];
        M_AddNews($data);
    }
    
    function OpenAddNews()
    {
        $view = "addNews";
        require_once VIEW_DIR . 'news.php';
    }
    
    function EditDeleteNews()
    {
            $data = M_GetBasicNewsSort(); 
            $view = "DeleteEditNews";
            require_once VIEW_DIR . 'news.php';
    }
    function OpenEditNews()
    {
             $id = $_GET['id'];
             $News=  M_GetNews($id);
             $view = "editNews";
             require_once VIEW_DIR . 'news.php'; 
    }
    function UpdateNews()
    {
      $data["id"] = $_GET['id'];
      $data["title"] = $_POST['title']; 
      $data["description"] = $_POST['description'];
      $data["contents"] = $_POST['contents'];
      M_editNews($data);
    }
    function DeleteNews()
    {
        $data["id"] = $_GET['id'];
        M_deleteNews($data);
    }
    function EditBox1()
    {
        $data = M_GetInfoBox1();
        $view = "editBox1";
        require_once VIEW_DIR . 'news.php';
    }
    function UpdateBox1()
    {
        $data["headline1"] = $_POST['headline1'];
	$data["headline2"] = $_POST['headline2'];
        $plik_tmp = $_FILES['path']['tmp_name']; 
        $plik_name = $_FILES['path']['name']; 
        if ($plik_name != NULL)
        {
            $data["path"] = "web/img/$plik_name";
            M_TransferPicture($plik_tmp,$plik_name,$data["path"]);
        }
        
        $data = M_UpdateBox1($data);
        
    }
    function EditBox2()
    {
        $data = M_GetInfoBox2();
        $dataTeam = M_GetTeamBox2();
        $view = "editBox2";
        require_once VIEW_DIR . 'news.php';
    }
    function UpdateBox2()
    {
        $data["headline1"] = $_POST['headline1'];
        $data["teamlist"] = $_POST['teamlist'];
        M_UpdateBox2($data);
    }
    $dataBasicNewsSort = GetBasicNewsSort();
       switch($action)
    {
        case 'editBox1':
            EditBox1();
            break;
        case 'updateBox1':
            UpdateBox1();
            break;
        
        case 'editBox2':
            EditBox2();
            break;
           case 'updateBox2':
            UpdateBox2();
            break;
        case 'OpenAddNews':
            OpenAddNews();
            break;
        
        case 'addNews': //dodaje newsa
            AddNews();
            break;
        case 'openeditNews': //otwiera widok newsa
            OpenEditNews();
            break;
        case 'updateNews': //update news do db
            UpdateNews();
            break;
        case 'deleteNews': //usuniecie z bazy db
             DeleteNews();
            break;
        case 'opendeleteNews': //otwarcie listy
             EditDeleteNews();
            break;
        default:
            echo "blad akcji!";
            break;
    }