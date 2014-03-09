<?php
	session_start();
	require "Themes/Header.php";
?>
<h1>Контакти</h1>
<div class="offices">
	<div class="left-form">
		<h2>Нашите офиси</h2>
		
	</div>
	<div class="right-form">
		<img src="Themes/Images/globe.gif" />
	</div>
	
	<?php
	$xml = simplexml_load_file("Data/Offices.xml");
	
	echo '<div class="contentTable width900 noLastCell" >';
	echo '<table><tr><th>Име</th><th>Адрес</th><th>E-mail</th><th>Телефон</th></tr>';
	foreach($xml->children() as $child) {
		echo '<tr><td><a href="office.php?id='.$child-> id.'" title="Научете повече" >'.$child-> name.'</a></td><td><a href="office.php?id='.$child-> id.'" title="Научете повече" >'.$child-> address.'</a></td>';
		echo '<td><a href="mailto:'.$child-> email.' " >'.$child-> email.'</a></td>';
		echo '<td><a href="tel:'.$child->phone.' " >'.$child->phone.'</a></td></tr>';
	}
	echo '</table></div>';
	?>
	
	
</div>
<?php
	require "Themes/Footer.php";
?>