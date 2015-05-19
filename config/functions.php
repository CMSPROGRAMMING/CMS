<?php

/* 
 * stałe funkcje np. pobieranie IP, pobieranie czasu, kopiowanie, sprawdzanie katalogu, usuwanie pliku,
 * uploadowania, usuwania, 
 */


function GetIpAddres()
{
    $ipaddress = '';
    
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
 
    return $ipaddress;
}

function GetTimeToMySQL()
{
    return date("Y-m-d H:i:s"); 
}

function GetUserInfo()
{
    
}

function GetLanguage()
{
    if(isset($_GET['lang']))
    {
        $lang = $_GET['lang'];
    }
    else
    {
        $lang = "pl";
    }
    
    return $lang;
}

function GetCurrentController()
{
    if(isset($_GET['controller']))
    {
        $controller = $_GET['controller'];
    }
    else
    {
        $controller = "home";
    }
    
    return $controller;
}

function GetCurrentAction()
{
    if(isset($_GET['action']))
    {
        $action = $_GET['action'];
    }
    else
    {
        $action = NULL;
    }
    
    return $action;
}

function GetActionId()
{
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
    }
    else
    {
        $id = 0;
    }
    
    return $id;
}

function SqlMessagePars($message)
{    
    $sign_array = array( "'" );
    
    for($i = 0; $i < count($sign_array); $i++)
    {
        $message = str_replace($sign_array[$i]," ", $message);
    }
    
    return $message; 
}

function CheckResult($result)
{
    if($result == "1")
    {
        $message = OperationSucces();
    }
    else
    {
        $message = OperationFailed();
    }
    
    return $message;
}

function WaitAndLoadView($time, $controler, $action)
{
    sleep($time);
    require_once "index.php?controller=" . $controler . "&action=" . $action ;
}

function TextValidation($validationText)
{
    $oldSignArray = array();
    $newSignArray = array();
    
    for($i = 0; $i < count($oldSignArray); $i++)
    {
        $validationText = str_replace($oldSignArray[$i],$newSignArray[$i],$validationText);
    }
    
    return $validationText;
}

function SendMail()
{

}

function AdminPermission($data)
{
    if(CheckPermission(GetCurrentController(), GetCurrentAction(), $data) == true)
        return true;
    else
        echo "Brak uprawnień";
}