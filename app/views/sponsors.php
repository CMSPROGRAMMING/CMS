<?php


    //widok webSiteInfo  
    function showSponsors($data)
    {
        for($i = 0; $i < count($data); $i++)
        {
            echo $data[$i]['name'] . " " . $data[$i]['description'] . " " . $data[$i]['image'] . "<br />";
        }
    }
    
    function adminEditSponsorsInfo($data, $action)
    {
             echo  "
                <a href=\"?controller=sponsors&action=editSponsorsList\">Powrot do listy</a><br /> 
                <form action=\"?controller=sponsors&action=" . $action . "\" method=\"post\" enctype=\"multipart/form-data\">
                    
                    Imie i nazwisko:<br>
                    <input type=\"text\" name=\"name\" value=\"" . $data[0]['name']. "\">
                    <br><br>
                    
                    Link:<br>
                    <input type=\"text\" name=\"description\" value=\"" . $data[0]['description'] . "\">
                    <br><br>
                    
                    Zdjęcie:<br>
                    
                    <input type=\"file\" name=\"path\"> <br />
                    
                    <img src=web/img/team/". $data[0]['image'] ." width=\"201\" height=\"201\"><br>
                        

                    <br><br>                   

                    <input type=\"submit\" value=\"Aktualizuj\">
                </form> 
              ";   
    }
    
    function adminEditSponsorsList($data)
    {
        echo "<a href=\"?controller=sponsors&action=addSponsorsCreateForm\">Dodaj nowego sponsora</a><br />
              EDYTUJ: <br />";
        for($i = 0; $i < Count($data); $i++)
        {
            echo    $data[$i]["name"].
                 "
                    <a href=\"?controller=sponsors&action=editSponsors&id=".$data[$i]["id"]."\"> EDYTUJ</a>
                    <a href=\"?controller=sponsors&action=deleteSponsors&id=".$data[$i]["id"]."\"> USUN</a><br />";

        }
        
    }
    if(isset($_SESSION['Permission']))
    {   
        switch($view)
        {
            case 'showSponsors':
                showSponsors($data);
                break;
            
            case 'editSponsorsList':
                if(AdminPermission($_SESSION['Permission']) == true)
                    adminEditSponsorsList($data);
                break;

            case 'addSponsorsCreateForm':
                if(AdminPermission($_SESSION['Permission']) == true)
                    adminEditSponsorsInfo($data, $action);
                break;

            case 'editSponsors':
                if(AdminPermission($_SESSION['Permission']) == true)
                    adminEditSponsorsInfo($data, $action);
                break;
        }
    }
    else 
    {
        switch($view)
        {
            case 'showSponsors':
                showSponsors($data);
                break;
        
            default:
                echo "Brak uprawnień";
                break;
        }   
    }