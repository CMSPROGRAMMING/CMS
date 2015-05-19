<?php


    //widok webSiteInfo  
    function showTeam($data)
    {
        for($i = 0; $i < count($data); $i++)
        {
            echo $data[$i]['name'] . " " . $data[$i]['description'] . " " . $data[$i]['image'] . "<br />";
        }
    }
    
    function adminEditTeamInfo($data, $action)
    {
             echo  "
                <a href=\"?controller=team&action=editTeamList\">Powrot do listy</a><br /> 
                <form action=\"?controller=team&action=" . $action . "\" method=\"post\" enctype=\"multipart/form-data\">
                    
                    Imie i nazwisko:<br>
                    <input type=\"text\" name=\"name\" value=\"" . $data[0]['name']. "\">
                    <br><br>
                    
                    Opis:<br>
                    <textarea type=\"text\" name=\"description\" >" . $data[0]['description'] . "</textarea>
                    <br><br>
                    
                    Zdjęcie:<br>
                    
                    <input type=\"file\" name=\"path\"> <br />
                    
                    <img src=web/img/team/". $data[0]['image'] ." width=\"201\" height=\"201\"><br>
                        

                    <br><br>                   

                    <input type=\"submit\" value=\"Aktualizuj\">
                </form> 
              ";   
    }
    
    function adminEditTeamList($data)
    {
        echo "<a href=\"?controller=team&action=addTeamCreateForm\">Dodaj nowego zawodnika</a><br />
              EDYTUJ: <br />";
        for($i = 0; $i < Count($data); $i++)
        {
            echo    $data[$i]["name"].
                 "
                    <a href=\"?controller=team&action=editTeam&id=".$data[$i]["id"]."\"> EDYTUJ</a>
                    <a href=\"?controller=team&action=deleteTeam&id=".$data[$i]["id"]."\"> USUN</a><br />";

        }
        
    }
    if(isset($_SESSION['Permission']))
    {   
        switch($view)
        {
            case 'showTeam':
                showTeam($data);
                break;
            
            case 'editTeamList':
                if(AdminPermission($_SESSION['Permission']) == true)
                    adminEditTeamList($data);
                break;

            case 'addTeamCreateForm':
                if(AdminPermission($_SESSION['Permission']) == true)
                    adminEditTeamInfo($data, $action);
                break;

            case 'editTeam':
                if(AdminPermission($_SESSION['Permission']) == true)
                    adminEditTeamInfo($data, $action);
                break;
        }
    }
    else 
    {
        switch($view)
        {
            case 'showTeam':
                showTeam($data);
                break;
        
            default:
                echo "Brak uprawnień";
                break;
        }   
    }