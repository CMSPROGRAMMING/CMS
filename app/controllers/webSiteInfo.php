<?php

    //kontroler webSiteInfo
    $action = GetCurrentAction();
    $controler = GetCurrentController();
    
    require_once MODELS_DIR . 'webSiteInfo.php';
    
    //rendering
    function GetDataBasicInfo()
    {
        return M_GetBasicInfo();
    }
    
    function GetDataContactInfo()
    {
        return M_GetContactInfo();
    }       
    
    function EditBasicInfo()
    {
        $data = M_GetBasicInfo();
        $view = "editBasicInfo";
        require_once VIEW_DIR . 'webSiteInfo.php';
    }
    
    function UpdateBasicInfo()
    {
        $data["name"] = $_POST['name'];
	$data["street"] = $_POST['street'];
	$data["post"] = $_POST['post'];
	$data["city"] = $_POST['city'];
        $data["facebook"] = $_POST['facebook'];
        
        $result = M_UpdateBasicInfo($data);
        
        return $result;        
    }
    
    function AddContactCreateForm()
    {
        $data[0]["name"] = NULL;
        $data[0]["phone"] = NULL;
        $data[0]["mail"] = NULL;
        
        $action = "addContactToDB";
        $view = "addContactCreateForm";
        require_once VIEW_DIR . 'webSiteInfo.php';
    }
    
    function AddContact()
    {
        $data["name"] = $_POST['name'];
	$data["phone"] = $_POST['phone'];
	$data["mail"] = $_POST['mail'];
        
        $result = M_AddContact($data);
        
        return $result;        
    }
    
    function EditContactLoadData()
    {
        $id = GetActionId();
        $data = M_EditContactLoad($id);
        
        $action = "editContactToDB&id=".$id;
        $view = "editContact";
        require_once VIEW_DIR . 'webSiteInfo.php';
    }
    
    function EditContactToDB()
    {
        $data["id"] = GetActionId();
        $data["name"] = $_POST['name'];
	$data["phone"] = $_POST['phone'];
	$data["mail"] = $_POST['mail'];
        
        $result = M_UpdateContact($data);
        
        return $result; 
    }
    
    function EditContastList()
    {
        $data = GetDataContactInfo();
        $view = 'editContactList';
        
        require_once VIEW_DIR . 'webSiteInfo.php';

    }
    
    function DeleteContact()
    {
        
    }
    
    $dataBasicInfo = GetDataBasicInfo();
    $dataContactInfo = GetDataContactInfo();

    switch($action)
    {
        case 'editBasic':
            EditBasicInfo();
            break;
        
        case 'updateBasic':
            $result = UpdateBasicInfo();
            CheckResult($result);
            break;
        
        case 'addContactCreateForm':
            AddContactCreateForm();
            //dodanie kontaktu
            break;
        
        case 'addContactToDB':
            $result = AddContact();
            CheckResult($result);            
            break;
        
        case 'editContact':
            EditContactLoadData();
            break;
        
        case 'editContactToDB':
            $result = EditContactToDB();
            CheckResult($result);
            break;
        
        case 'deleteContact':
            //usuniecie kontaktu
            break;
        
        case 'editContactList':
            EditContactList();
            break;
        
        default:
            echo "blad akcji!";
            break;
    }
   