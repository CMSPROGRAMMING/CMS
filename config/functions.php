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

function SqlMessagePars($message)
{    
    $sign_array = array( "'" );
    
    for($i = 0; $i < count($sign_array); $i++)
    {
        $message = str_replace($sign_array[$i]," ", $message);
    }
    
    return $message; 
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