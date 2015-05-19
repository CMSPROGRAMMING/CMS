<?php

    //kontroler webSiteInfo
    $action = GetCurrentAction();
    $controler = GetCurrentController();
    
    require_once MODELS_DIR . 'sponsors.php';
    
    //rendering
    
    function Sponsors_showSponsors()
    {
        $data = M_Sponsors_ShowSponsors();
        $view = 'showSponsors';
        
        require_once VIEW_DIR . 'sponsors.php';
    }
    
    function Sponsors_EditContastList()
    {
        $data = M_Sponsors_GetListSponsors();
        $view = 'editSponsorsList';
        
        require_once VIEW_DIR . 'sponsors.php';
    }
    
    function Sponsors_AddSponsorsCreateForm()
    {
        $data[0]["name"] = NULL;
        $data[0]["description"] = NULL;
        $data[0]["image"] = NULL;
        
        $action = "addSponsorsToDB";
        $view = "addSponsorsCreateForm";
        
        
        require_once VIEW_DIR . 'sponsors.php';
    }
    
    function Sponsors_AddSponsors()
    {
        $data["name"] = $_POST['name'];
	$data["description"] = $_POST['description'];
	//$data["image"] = $_POST['image'];
        $data["directory"] = $_FILES['path']['tmp_name']; 
        $data["image"] = $_FILES['path']['name'];
         
        $path = "web/img/sponsors/" . $data["image"];
        
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
        
        $result = M_Sponsors_AddSponsors($data);
        
        return $result;        
    }
    
    function Sponsors_EditContactLoadData()
    {
        $id = GetActionId();
        $data = M_Sponsors_EditSponsorsLoad($id);
        
        $action = "editSponsorsToDB&id=".$id;
        $view = "editSponsors";
        require_once VIEW_DIR . 'sponsors.php';
    }
    
    function Sponsors_EditContactToDB()
    {
        $data["id"] = GetActionId();
        $data["name"] = $_POST['name'];
	$data["description"] = $_POST['description'];
        //var_dump($data["description"]);
	//$data["image"] = $_POST['image'];
        //$dataa =  $_FILES['path']['tmp_name'];
        $data["directory"] = $_FILES['path']['tmp_name']; 
        $data["image"] = $_FILES['path']['name'];
         
        $path = "web/img/sponsors/" . $data["image"];
        
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
        
            $result = M_Sponsors_UpdateSponsors($data);
            
            return $result;
            
        }
        
        $result = M_Sponsors_UpdateSponsorsNonPhoto($data);
        
        return $result; 
    }

    function Sponsors_DeleteContact()
    {
        $id = GetActionId();      
        M_Sponsors_DeleteContact($id);
        echo "Poprawnie usunięto!";
        //require_once VIEW_DIR . 'sponsors.php';    
    }
    

 

    switch($action)
    {
        case 'showSponsors':
            Sponsors_showSponsors();
            break;
        
        case 'addSponsorsCreateForm':
            Sponsors_AddSponsorsCreateForm();
            break;
        
        case 'addSponsorsToDB':
            $result = Sponsors_AddSponsors();
            CheckResult($result);            
            break;
        
        case 'editSponsors':
            Sponsors_EditContactLoadData();
            break;
        
        case 'editSponsorsToDB':
            $result = Sponsors_EditContactToDB();
            CheckResult($result);
            break;
        
        case 'deleteSponsors':
            Sponsors_DeleteContact();
            break;
        
        case 'editSponsorsList':
                Sponsors_EditContastList();
            break;
        
        default:
            //forUser();
            echo "blsad akcji!";
            break;
    }
   