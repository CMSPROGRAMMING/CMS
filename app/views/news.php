<?php
echo "<HTML>
		<HEAD>
			<meta charset=\"UTF-8\" />
		</HEAD>";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// view
 function adminEditBox1($data)
    {
        echo  "
                <form action=\"?controller=news&action=updateBox1\" method=\"post\" enctype=\"multipart/form-data\">
                    
                    Nagłówek 1:<br>
                    <input type=\"text\" name=\"headline1\" value=\"" .$data[0]['headline1']. "\">
                    <br><br>
                    
                    Nagłówek 2:<br>
                    <input type=\"text\" name=\"headline2\" value=\"" .$data[0]['headline2']. "\">
                    <br><br>
                    Obrazek :<br>
                    <div id=\"box1\"> 
                    <img src=\"".$data[0]['path']."\" width=\"201\" height=\"201\"><br>
                        </div>
                    <INPUT type=\"file\" name=\"path\">   
                    <br><br>
<input type=\"submit\" value=\"Aktualizuj\">
                </form> 
              ";
    }
function adminAddNews()
    {
        echo  "
                <form action=\"?controller=news&action=addNews\" method=\"post\" enctype=\"multipart/form-data\">
                    Tytuł :<br>
                    <TEXTAREA NAME=\"title\" COLS=\"50\" ROWS=\"2\"></TEXTAREA><br>
                    Tekst krótki :<br>
                    <TEXTAREA NAME=\"description\" COLS=\"50\" ROWS=\"4\"></TEXTAREA><br>
                    Cały news :<br>
                    <TEXTAREA NAME=\"contents\" COLS=\"50\" ROWS=\"20\"></TEXTAREA>
                    <br><br>                    
        <input type=\"submit\" value=\"Dodaj\">
                </form> 
              ";
    }
     function adminEditDeleteNews($data)
    {           
        echo "data:"."    "."Czas:"."     "."Tytuł:"."<br>";
        $length = count($data);
        for($i = 0; $i < $length ; $i++)
        {
            
            echo    $data[$i]['date']." ".$data[$i]['time']." ".$data[$i]['title'].
                 "
                    <a href=\"?controller=news&action=openeditNews&id=".$data[$i]["id"]."\"> EDYTUJ</a>
                    <a href=\"?controller=news&action=deleteNews&id=".$data[$i]["id"]."\"> USUN</a><br />";

        }     
    }
    
    function adminEditNews($date)
    {
        echo  "
                <form action=\"?controller=news&action=updateNews&id=".$date[0]['id']."\" method=\"post\" enctype=\"multipart/form-data\">
                    Tytuł :<br>
                    <TEXTAREA NAME=\"title\" COLS=\"50\" ROWS=\"2\">".$date[0]['title']."</TEXTAREA><br>
                    Tekst krótki :<br>
                    <TEXTAREA NAME=\"description\" COLS=\"50\" ROWS=\"4\">".$date[0]['description']."</TEXTAREA><br>
                    Cały news :<br>
                    <TEXTAREA NAME=\"contents\" COLS=\"50\" ROWS=\"20\">".$date[0]['contents']."</TEXTAREA>
                    <br><br>                    
                    <input type=\"submit\" value=\"Aktualizuj\">
                </form> 
              ";
    }
    function adminEditBox2($data,$dataTeam)
    {
        $length = count($dataTeam);
        if ($dataTeam['ranteam'] == NULL)
            {
            $text = '';
            }
         else
         {
        for ($i = 0 ; $i < $length ; $i++)
        {
            if ($i == 0) 
            {
                $text = $dataTeam[$i]['rankteam'].". ".$dataTeam[$i]['teamname']."\n";
            }
            else
                $text .= $dataTeam[$i]['rankteam'].". ".$dataTeam[$i]['teamname']."\n";
         }}
        echo  "
                <form action=\"?controller=news&action=updateBox2\" method=\"post\" enctype=\"multipart/form-data\">                    
                    Nagłówek 1:<br>
                    <input type=\"text\" name=\"headline1\" value=\"" .$data[0]['headline1']. "\">
                    <br><br>
               <TEXTAREA NAME=\"teamlist\" COLS=\"20\" ROWS=\"14\">$text</TEXTAREA><br>
                <input type=\"submit\" value=\"Aktualizuj\">
                </form> 
              ";
    }
switch($view)
    {
            case 'DeleteEditNews':
            adminEditDeleteNews($data);
            break;
        case 'editBox1':
            adminEditBox1($data);
            break;  
        case 'addNews':
            adminAddNews();
            break;
        case 'editNews':
            adminEditNews($News);
            break;
        case 'editBox2':
            adminEditBox2($data,$dataTeam);
            break;
        case NULL:
    }