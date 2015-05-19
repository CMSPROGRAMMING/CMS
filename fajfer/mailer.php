<?php
/* Set e-mail recipient */
$myemail = "kontakt@oskarfajfer.pl";

/* Check all form inputs using check_input function */
$name = check_input($_POST['name'], "Wpisz swoje imie i nazwisko!");
$phone = check_input($_POST['phone'], "Wpisz nr telefonu!");
$email = check_input($_POST['email']);
$message = check_input($_POST['message'], "Wpisz swoją wiadomość!");

/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
show_error("<span class=\"color-red\">Podano niepoprawny adres email</span>");
}
/* Let's prepare the message for the e-mail */
$message = "

Imię i nazwisko: $name
E-mail: $email

Wiadomość:
$message

";

/* Send the message using mail() function */
mail($myemail, $phone, $message);

/* Redirect visitor to the thank you page */
header('Location: thanks.html');
exit();

/* Functions we used */
function check_input($data, $problem='')
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
if ($problem && strlen($data) == 0)
{
show_error($problem);
}
return $data;
}

function show_error($myError)
{
?>
<html>
<head>
	<title>Kontakt - Oskar Fajfer</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="Content-Script-Type" content="text/javascript" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="c0nst" />
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	
	<link rel="stylesheet" href="css/reset.css" type="text/css" charset="utf-8" />
	<link rel="stylesheet" href="css/style.css" type="text/css" charset="utf-8" />

	<script src="js/jquery-2.1.3.min.js" type="text/javascript"></script>
	
</head>
<body>
	<div class="site-wraper">
		<header class="main-header">
			<nav class="main-menu">
				<ul>
					<li><a href="index.html" title="Strona główna">HOME</a></li>
					<li><a href="news.html" title="Nowości">NOWOSCI</a></li>
					<li><a href="gallery.html" title="Galeria zdjęć">GALERIA</a></li>
					<li><a href="team.html" title="Nasza ekipa">TEAM</a></li>
					<li><a href="sponsors.html" title="Nasi sponsporzy">SPONSORZY</a></li>
					<li><a href="table.html" title="Tabela rozgrywek">TABELA</a></li>
					<li><a href="contact.html" title="Strona główna" class="current">KONTAKT</a></li>
					<li><span class="clear dblock"></span></li>
				</ul>
			</nav>
		</header>
		<div class="container" style="text-align: center;">
			<p>Popraw następujące dane: </p><br/>
			<p><strong><?php echo $myError; ?></strong></p><br/>
			<p><a href="contact.html">Wróć i spróbuj ponownie</a></p>
			
			<br/><br/>
		</div>
		
		<footer class="main-footer">	
			<div class="site-title">
				<h1>Oskat fajfer</h1>
				<p class="color-red txt-up">Dziękuję za zainteresowanie</p>
				<a href="https://www.facebook.com/oskar.fajfer" class="btn write">NAPISZ PRZEZ FB</a>
			</div>
			<p class="footer-text">
				&copy oskarfajfer.com | Realization <a href="http://mdnagency.pl" target="_blank" title="Agencja reklamowa z Torunia">MDNagency.pl</a>
			</p>
		</footer>
	</div>
</body>
</html>
<?php
exit();
}
?>