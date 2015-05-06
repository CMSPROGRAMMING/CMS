<?php

        $error = ""; //GET
	echo "<HTML>
		<HEAD>
			<meta charset=\"utf-8\" />
			<link rel=\"stylesheet\" type=\"text/css\" href=\"" . CSS_DIR . "admin.css\">
		</HEAD>";


	echo "
		<div id=\"main\">
			<div id=\"logowanie\"><TR>
			<center><img src=\"web/img/mdnagency_admin.png\"></center><br />
			<b><center>CMS</br>Logowanie administrator:</br></center>";
	if($error != NULL)
		echo "<p>".$error."</p>";
	else
		echo "<p><br /></p>";
	

		echo "<form action=\"admin.php?action=logowanie\" method=\"post\">	
			  Nick:<br />
			  <input id = \"txt\" name=\"admin_nick\" value=\"\" /><br />
			  Haslo:<br />
			  <input id = \"txt\" type=\"password\" name=\"admin_password\" value=\"\" /><br />
	 		  <center><input type=\"submit\" value=\"Zaloguj się\" name=\"submit\" /></center>
	 		  </form></div></div>";