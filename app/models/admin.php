<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once MODELS_DIR . 'index.php';
// model
// poprawnosc danych 
function M_AccuracyOfData($data)
{
    $dataUsers = ResultExtract('user', array('id','first_name','last_name','login','password','mail','idgroup'),array(Condition('login', '=', $data['login']),Condition('password', '=', $data['password'])),array('and'));
    return $dataUsers;
}

// pobranie uprawnien 
function M_ReadPermissions($idgroup)
{
    $Permissions = ResultExtract ('group_permissions',array('id_module'),array(Condition('id_group','=', $idgroup)),NULL);
    $i=0;
    foreach ($Permissions as $klucz)
    {
    $SinglePermissions = ResultExtract('module',array('name','controller','action','menu'),array(Condition('id','=', $klucz['id_module']),Condition('active','=',1)),array('and'));
    $dataPermissions[$i]['name'] = $SinglePermissions[0]['name'];
    $dataPermissions[$i]['controller'] = $SinglePermissions[0]['controller']; 
    $dataPermissions[$i]['action'] = $SinglePermissions[0]['action'];
    $dataPermissions[$i]['menu'] = $SinglePermissions[0]['menu']; 

    $i++;
    }
    return $dataPermissions;
}
function M_DataBaseInfoSession($user)
{
  $time = GetTimeToMySQL();
  return DoQuery(Insert("session", array('s_key','s_time','user'),
                                                 array(uniqid('',true), $time, $user)));
}


//  