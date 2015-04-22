<?php

    //kontroler webSiteInfo
    $action = GetCurrentAction();
    require_once MODELS_DIR . 'webSiteInfo.php';
    
    //rendering
    function GetDataBasicInfo()
    {
        return GetBasicInfo();
    }
    
    function GetDataContactInfo()
    {
        return GetContactInfo();
    }
        
    
    $dataBasicInfo = GetDataBasicInfo();
    $dataContactInfo = GetDataContactInfo();
    
    switch($action)
    {
        case 'editBasic':
            echo "Edycja podstawowa";
            break;
        
        case 'addContact':
            //dodanie kontaktu
            break;
        
        case 'editContact':
            //edycja kontaktu
            break;
        
        case 'deleteContact':
            //usuniecie kontaktu
            break;
       
    }
   