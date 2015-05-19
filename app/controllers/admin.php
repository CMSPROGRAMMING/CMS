<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// controller

require_once MODELS_DIR . 'admin.php';

$action = GetCurrentAction();
$controler = GetCurrentController();


function AccuracyOfData()
{
    $data["login"] = $_POST['admin_nick'];
    $data["password"] = md5($_POST['admin_password']); 
    return M_AccuracyOfData($data);
}

switch($action)
    {
        case 'logowanie':
            session_start();
            if (isset($_POST['admin_nick'])){
            $dataUsers = AccuracyOfData();
            if ($dataUsers != NULL)
            {
               M_DataBaseInfoSession($dataUsers[0]['id']);
               $_SESSION['idgroup'] = $dataUsers[0]['idgroup'];
               $_SESSION['login'] = $dataUsers[0]['login'];               
               // pobieranie uprawnien
               $dataPermissions = M_ReadPermissions($_SESSION['idgroup']);
               $_SESSION['Permission'] = $dataPermissions;
                require_once VIEW_DIR . "admin.php";                
            } 
            else
                {
                $_SESSION['error']= "Błędny login lub hasło!";
                require_once VIEW_DIR . "login.php";
            }}
           else {require_once VIEW_DIR . "login.php";}
            break;
            case 'logout':
            session_start();
            if (isset($_COOKIE[session_name()])) 
            { 
                setcookie(session_name(), '', time()-42000, '/'); 
            }
            session_destroy();
                require_once VIEW_DIR . "login.php";
            break;       
        default:
            if ($action == NULL)
            {
            require_once VIEW_DIR . "login.php";
            }
            //require_once CONTROLLERS_DIR . $controler . ".php";
            require_once VIEW_DIR . "admin.php";
            
            break;
    }