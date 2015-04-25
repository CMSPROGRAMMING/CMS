<?php

    //widok webSiteInfo  
    function adminEditBasicInfo($data)
    {
        //echo $data[0]["street"];
        echo  "
                <form action=\"?controller=webSiteInfo&action=updateBasic\" method=\"post\">
                    
                    Nazwa firmy:<br>
                    <input type=\"text\" name=\"name\" value=\"" .$data[0]['name']. "\">
                    <br><br>
                    
                    Ulica:<br>
                    <input type=\"text\" name=\"street\" value=\"" .$data[0]['street']. "\">
                    <br><br>
                    
                    Miasto:<br>
                    <input type=\"text\" name=\"city\" value=\"" .$data[0]['city']. "\">
                    <br><br>
                    
                    Kod pocztowy:<br>
                    <input type=\"text\" name=\"post\" value=\"" .$data[0]['post']. "\">
                    <br><br>
                    
                    Facebook:<br>
                    <input type=\"text\" name=\"facebook\" value=\"" .$data[0]['facebook']. "\">
                    <br><br>
                     
                    <input type=\"submit\" value=\"Aktualizuj\">
                </form> 
              ";
    }
    
    function adminEditContactInfo($data, $action)
    {
             echo  "
                <form action=\"?controller=webSiteInfo&action=" . $action . "\" method=\"post\">
                    
                    Imie i nazwisko / Nazwa:<br>
                    <input type=\"text\" name=\"name\" value=\"" . $data[0]['name']. "\">
                    <br><br>
                    
                    Numer telefonu:<br>
                    <input type=\"text\" name=\"phone\" value=\"" .$data[0]['phone']. "\">
                    <br><br>
                    
                    Adres e-mail:<br>
                    <input type=\"text\" name=\"mail\" value=\"" .$data[0]['mail']. "\">
                    <br><br>
                     
                    <input type=\"submit\" value=\"Aktualizuj\">
                </form> 
              ";   
    }
    
    switch($view)
    {
        case 'editBasicInfo':
            adminEditBasicInfo($data);
            break;      
        
        case 'addContactCreateForm':
            adminEditContactInfo($data, $action);
            break;
        
        case 'editContact':            
            adminEditContactInfo($data, $action);
            break;
        
        case NULL:
    }