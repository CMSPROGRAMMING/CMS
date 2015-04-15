<?php

/* Klasa C_Database
 * metoda konfiguracja danych do połaczenia z bazą
 * metoda Połączenie
 * metoda rozłączenie
 * metoda zapytani - zwraca blad/pomyslne dodanie itd
 * metoda log - kazde zapytanie wytwarza logi
 */

function Conection()
{
    $host = "localhost";
    $user = "root"; 
    $password = "";
    $database = "bazacms";
    
    @$link = mysqli_connect($host, $user, $password, $database);        

    if (!$link)
    {	
        DatabaseConnectionError(mysqli_connect_error());
        $connection_error = true;    
        exit;
    }
    else
    {
        $connection_error = false;
    }
    
    return $link;
}

function Disconection($link)
{
    if(mysqli_close($link))
    {
        $connection_error = false;
    }
    else
    {
        DatabaseDisonnectionError("Błąd");
        $connection_error = true;
    }   
}

function AskQuery($link, $query)
{
    if(empty($query))
    {
        return false;
    }
    
    $result = mysqli_query($link, $query);
    
    $user = 'Tweester'; //GetUserInfo();
    $controller = GetCurrentController();
    
    if(!$result)
    {
        $message = (mysqli_error($link));
        DatabaseQueryError($query);
        SaveLogs($link, $message, $query, $user, $controller);
        return false;
    }
    else
    {
        $message = "Poprawne zapytanie";
        DatabaseQuerySucces();
        SaveLogs($link, $message, $query, $user, $controller);
        return $result;
    }

}

function SaveLogs($link, $message, $query, $user, $controller)
{
    $ip_addr = GetIpAddres();
    $time = GetTimeToMySQL();
    $message = SqlMessagePars($message);
    
    $sql = "INSERT INTO Sys_logs (controller, user, query, message, ip, time) VALUES ('$controller','$user','$query','$message','$ip_addr','$time')";
    
    if(!$result = mysqli_query($link, $sql))
    {           
        DatabaseLogInsertError(mysqli_error($link));
    }
}


//$link = Conection();
//Disconection($link);

///$query = "SELECT * FROM `sys_logs`";

//AskQuery($link, $query);

//GetTimeToMySQL();
