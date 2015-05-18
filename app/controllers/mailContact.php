<?php

function SendMail()
{
    $result = mysql_query($information);
    $row = mysql_fetch_array($result);
    $mymail = $row['mail']; //wez z bazy
		
    //$adres_odbiorcy = 'tweester.pl@gmail.com'; //mail
    $email = $_POST['email'];
    $name = $_POST['name'];
    $text = $_POST['Text'];
    $title = "Wiadomość ze strony SKY EYE"; //title
			
    if(mail($mymail,
        	"=?UTF-8?B?".base64_encode($title)."?=",
		'<p>Od: <b>'.$_POST['name'].'</b></p><pre>'.$_POST['Text'].'</pre>',
		'From:'.$_POST['email']."\r\nContent-Type: text/html; charset=utf-8"))
		$msg_send = 
		"<script type=\"text/javascript\">
			alert(\"Wiadmosc wyslana!\");
		</script>";
    else
    {
	echo
            "<script type=\"text/javascript\">
            alert(\"Bład wysyłania wiadomości!\");
            </script>";
    }
	
}

function ShowForm()
{
    
}

switch($action)
    {
        case 'sendMail':
            SendMail();
            break;
               
        case 'showFrom':
            ShowForm();
            break;
        
        default://ulepsz! error 404
            echo "blad akcji!";
            break;
    }