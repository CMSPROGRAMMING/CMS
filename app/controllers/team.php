<?php

    //kontroler webSiteInfo
    $action = GetCurrentAction();
    $controler = GetCurrentController();
    
    require_once MODELS_DIR . 'team.php';
    
    //rendering
    
    function Team_showTeam()
    {
        $data = M_Team_ShowTeam();
        $view = 'showTeam';
        
        require_once VIEW_DIR . 'team.php';
    }
    
    function Team_EditContastList()
    {
        $data = M_Team_GetListTeam();
        $view = 'editTeamList';
        
        require_once VIEW_DIR . 'team.php';
    }
    
    function Team_AddTeamCreateForm()
    {
        $data[0]["name"] = NULL;
        $data[0]["description"] = NULL;
        $data[0]["image"] = NULL;
        
        $action = "addTeamToDB";
        $view = "addTeamCreateForm";
        
        
        require_once VIEW_DIR . 'team.php';
    }
    
    function Team_AddTeam()
    {
        $data["name"] = $_POST['name'];
	$data["description"] = $_POST['description'];
	//$data["image"] = $_POST['image'];
        $data["directory"] = $_FILES['path']['tmp_name']; 
        $data["image"] = $_FILES['path']['name'];
         
        $path = "web/img/team/" . $data["image"];
        
        if (file_exists($path)) 
        {
            echo 'Plik o takiej nazwie już istnieje!'; exit(); 
        }       
        elseif(@strtolower(end(explode('.',$data["image"])))!='jpg' and @strtolower(end(explode('.',$data["image"])))!='png')  
        {  
                echo 'Przesyłany plik nie jest obrazem JPG ani PNG !'; exit();  
        }     
        else
            
        move_uploaded_file($data["directory"], "$path");           
        
        $result = M_Team_AddTeam($data);
        
        return $result;        
    }
    
    function Team_EditContactLoadData()
    {
        $id = GetActionId();
        $data = M_Team_EditTeamLoad($id);
        
        $action = "editTeamToDB&id=".$id;
        $view = "editTeam";
        require_once VIEW_DIR . 'team.php';
    }
    
    function Team_EditContactToDB()
    {
        $data["id"] = GetActionId();
        $data["name"] = $_POST['name'];
	$data["description"] = $_POST['description'];
        //var_dump($data["description"]);
	//$data["image"] = $_POST['image'];
        //$dataa =  $_FILES['path']['tmp_name'];
        $data["directory"] = $_FILES['path']['tmp_name']; 
        $data["image"] = $_FILES['path']['name'];
         
        $path = "web/img/team/" . $data["image"];
        
        if($data["image"] != NULL)
        {
            if (file_exists($path)) 
            {
                echo 'Plik o takiej nazwie już istnieje!'; exit(); 
            }       
            elseif(@strtolower(end(explode('.',$data["image"])))!='jpg' and @strtolower(end(explode('.',$data["image"])))!='png')  
            {  
                    echo 'Przesyłany plik nie jest obrazem JPG ani PNG !'; exit();  
            }     
            else

            move_uploaded_file($data["directory"], "$path");    
        
            $result = M_Team_UpdateTeam($data);
            
            return $result;
            
        }
        
        $result = M_Team_UpdateTeamNonPhoto($data);
        
        return $result; 
    }

    function Team_DeleteContact()
    {
        $id = GetActionId();      
        M_Team_DeleteContact($id);
        echo "Poprawnie usunięto!";
        //require_once VIEW_DIR . 'team.php';    
    }

    switch($action)
    {
        case 'showTeam':
            Team_showTeam();
            break;
        
        case 'addTeamCreateForm':
            Team_AddTeamCreateForm();
            break;
        
        case 'addTeamToDB':
            $result = Team_AddTeam();
            CheckResult($result);            
            break;
        
        case 'editTeam':
            Team_EditContactLoadData();
            break;
        
        case 'editTeamToDB':
            $result = Team_EditContactToDB();
            CheckResult($result);
            break;
        
        case 'deleteTeam':
            Team_DeleteContact();
            break;
        
        case 'editTeamList':
                Team_EditContastList();
            break;
        
        default:
            //forUser();
            echo "blsad akcji!";
            break;
    }
   