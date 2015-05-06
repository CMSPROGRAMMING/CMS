<?php
	echo 
	"<html>
		<head>
			<meta charset=\"utf-8\" />
			<link rel=\"stylesheet\" type=\"text/css\" href=\"" . CSS_DIR . "admin.css\">
		</head>
		
		<body>
			<div id=\"menu\">
				<div id=\"logo\">
					<img src=\"web/img/mdnagency_admin.png\"><br />
					<b>CMS<br /><br /> NazwaStrony <br /> Panel Administratora</b></br>
				</div>

	";
	/*for($i = 0; $i < count($modules); $i=$i+2)
	{
		echo "<a class=\"link\" href=admin.php?session=".$session_id."&controler=".$modules[$i]."&action=admin> &#10097; ".$modules[$i+1]."</a>
		";	
	}*/
        echo "<a href=admin.php?> &#10097; Dodaj newsa</a>";
        echo "<a href=admin.php?> &#10097; Edytuj/Usuń newsa</a>";
        echo "<a href=admin.php?> &#10097; Edytuj Box'a</a>";
        echo "<a href=admin.php?> &#10097; Dodaj album</a>";
        echo "<a href=admin.php?> &#10097; Edytuj/Usuń album</a>";
        echo "<a href=admin.php?> &#10097; Dodaj osobe</a>";
        echo "<a href=admin.php?> &#10097; Edytuj/Usuń osobe</a>";
        echo "<a href=admin.php?> &#10097; Dodaj sponsora</a>";
        echo "<a href=admin.php?> &#10097; Edytuj/Usuń sponsora</a>";
        echo "<a href=admin.php?> &#10097; Dodaj kontakt</a>";
        echo "<a href=admin.php?> &#10097; Edytuj/Usuń kontakt</a>";        
        echo "<a href=admin.php?> &#10097; Ustawienia strony</a>";
        
        
        
	echo "<a href=admin.php?session=&controler=admin&action=logout> &#10097; Wyloguj</a></div>";
	
	//zamiana na funkcje ze sprawdzeniem istnienia kotnrolera
	echo "<div id =\"admin_controller\">";
	//require_once DIR_CONTROLLERS . $controler.".php";
	echo "</div>";	

	