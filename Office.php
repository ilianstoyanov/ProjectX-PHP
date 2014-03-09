<?php
	session_start();
	if (!isset($_GET['id'])) {
		header('Location: Contacts.php');
	}
	
	require "Themes/Header.php";
	
	$xml = simplexml_load_file("Data/Offices.xml");
	
	foreach($xml->office as $off) {
		foreach($off->attributes() as $key => $value) {
			if($key == "id" && $value == $_GET['id']) {
				echo '<h1>Офис "'.$off->name.'"</h1>';
				echo '<div class="office"><div class="info"><table>';
				echo '<tr><td>Град:</td><td>'.$off->city.'</td></tr><tr><td>Адрес:</td><td>'.$off->address.'</td></tr>';
				echo '<tr><td>Телефон:</td><td>'.$off->phone.'</td></tr><tr><td>E-mail:</td><td>'.$off->email.'</td></tr>';
				echo '<tr><td>Работно време:</td><td></td></tr>';
				foreach($off->workTime as $work) {
					echo '<tr><td>Понеделник:</td><td>'.$work->monday.'</td></tr><tr><td>Вторник:</td><td>'.$work->tuesday.'</td></tr><tr><td>Сряда:</td><td>'.$work->wednesday.'</td></tr><tr><td>Четвъртък:</td><td>'.$work->thursday.'</td></td>';
					echo '<tr><td>Петък:</td><td>'.$work->friday.'</td></tr><tr><td>Събота:</td><td>'.$work->saturday.'</td></tr><tr><td>Неделя:</td><td>'.$work->sunday.'</td></tr>';
				}
				echo '</table></div><div class="map"><iframe '.$off->map.'></iframe></div></div>';
			}
		}
	}
	require "Themes/Footer.php";
?>