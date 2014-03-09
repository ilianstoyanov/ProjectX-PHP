<?php
	include "inc/DBConnect.php";
?>

<!DOCTYPE html>
<html lang="bg">
	<!-- Header -->
	<head>
		<title>Project X</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<META content="It's a personal web site. Please get the fuck outta here." name=description>
		<META  content="Project, ProjectX, X, etc, " name=keywords>
		
		<!-- Stylesheets -->
		<link href="Themes/Style.css" rel="stylesheet" type="text/css" />
		
		<!-- JavaScript -->
		<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
		
	</head>
	<!-- header_eof -->
	<body>
		<div class="wrapper">
			<div class="header">
				<img id="sheep" class="animal" src="Themes/Images/Sheeps/Firefly-icon.png" width="128" height="128" alt="Sheep" />
				<div class="menu-logo">
					<div class="logo"> 
						<h1 class="logo-title">The Project X </h1>
					</div>
					<div class="menu">
						<?php
							$xml = simplexml_load_file("Data/Menu.xml");
							
							foreach($xml->children() as $child) {
								foreach($child->attributes() as $key => $value) {
									if($key == "role" && $value == "All") {
										echo '<a href="' . $child-> link . '" title="' . $child-> title .'" ><div class="menu-elem" ><span class="icon ' . $child-> image . '">';
										echo '&nbsp</span><span class="menu-title">' . $child-> display . '</span></div></a>'."\n";
									} 
									else if (isset($_SESSION['Role'])) { 
										if($key == "role" && $value == "User") {
											echo '<a href="' . $child-> link . '" title="' . $child-> title .'" ><div class="menu-elem" ><span class="icon ' . $child-> image . '">';
											echo '&nbsp</span><span class="menu-title">' . $child-> display . '</span></div></a>'."\n";
										} else if ($value == "Admin" && $_SESSION['Role'] == "Admin") {
											echo '<a href="' . $child-> link . '" title="' . $child-> title .'" ><div class="menu-elem" ><span class="icon ' . $child-> image . '">';
											echo '&nbsp</span><span class="menu-title">' . $child-> display . '</span></div></a>'."\n";
										}
									}
								}
							}
						?>
					</div>
				</div>
				<div class="contact">
					<p class="phone small">Телефон <a class="small" href="tel:0888%488%488"  ><b>0888 488 488</b></a></p>
					<p class="mail">Email <a href="mailto: stoianov.ilian@gmail.com">stoianov.ilian@gmail.com</a></p>
				</div>
				<div class="login-form" style="padding-right: 50px;">
					<?php
						if(isset($_SESSION['Role']))  {
							echo '<a class="float-right" href="Functionality/Logout.php" >изход</a>';
							echo '<input class="float-right jsBTNShowProfile" value="профил" title="Настройки на профила" type="button" />';
						} else {
							echo '<input class="float-right jsBTNShowLogin" value="вход" title="Вход в системата" type="button" />';
						}
					?>
				</div>
			</div>
			<img id="imgJumpingDog" class=" lock-screen" src="Themes/Images/dog.gif" alt="Скачащо куче" />
			<div class="login jsPNLLogin" >
				<form class="reg-form jsPNLLogin" action="Functionality/RegisterChecking.php" method="post">
					<h2>Регистрация</h2>
					<div class="input-form-left">
						<label>Име</label>
						<input name="firstName" class="firstName" type="text" />
						<label>Фамилия</label>
						<input name="lastName" class="lastName" type="text" />
						<label>Телефон</label>
						<input name="phone"  class="phone" type="text" />
						<label>Адрес</label>
						<input name="address" class="address" type="text" />
					</div>
					<div class="input-form-right">
						<label>E-mail</label>
						<input name="email" class="email" type="text" />
						<label>Парола</label>
						<input name="password" class="password" type="password" />
						<label>Отново</label>
						<input name="repassword" class="repassword" type="password" />
					</div>
					<input type="submit" class="submit" href="" title="Направи регистрацията" value="Регистрирай" />
				</form>
				<form action="profile.php" method="post" class="forgotten-form">
					<h2>Забравена парола</h2>
					<div class="input-form">
						<label>XXX</label>
						<input type="text" />
						<label>Телефон</label>
						<input type="text" />
						<label>E-mail</label>
						<input type="text" />
					</div>
					<input type="submit" value="Изпрати" />
					<input type="button" class="jsBTNHideForgotten" value="Затвори" title="Затвори" />
				</form>
				<form class="log-form jsPNLLogin" action="Functionality/Login.php" method="post">
					<h2>Вход</h2>
					<div class="input-form">
						<label>E-mail</label>
						<input name="email" class="email" type="text" />
						<label>Парола</label>
						<input name="password" class="password" type="password" />
					</div>
					<div>
						<input type="button" class="jsBTNForgotten title="Забравена парола" value="Забравена парола" />
						<input type="submit" class="submit" title="Вход в системата" value="Вход" />
					</div>
				</form>
				<input class="jsBTNHideLogin close" title="Затвори" type="button" />
			</div>
			<div class="profil-form jsPNLProfile">
				<?php
						include 'Functionality/Profile.php';
				?>	
			</div>
			<div class="content">
				<div class="content-top">