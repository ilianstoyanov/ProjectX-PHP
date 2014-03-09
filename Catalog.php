<?php
	session_start();
	require "Themes/Header.php";
?>
<h1>Каталог</h1>
<form method="post" class="search" action="SearchMouvie.php" >
	<input type="text" />
	<input type="submit" value="Търси" />
</form>
<div class="allMouvies">
	<div class="control">
		<input type="button" class="jsPreviousMouvie float-left" value="<<" />
		<input type="text" class="jsTextMouvie float-left width-50" />
		<h3 class="float-left">/</h3>
		<h3 class="jsTotalMouvies float-left"></h3>
		<input type="button" class="jsNextMouvie float-left" value=">>" />
	</div>
<?php
	$query = "SELECT MOUVIEID, ORIGINALNAME, BGNAME, IMAGEURL, MOUVIE_GENRE.NAME AS GENRE, COUNTRIES.NAME AS COUNTRY, RELEASEDATE, RESUME, CREATEDATE AS UPLOADDATE
				FROM MOUVIE_MOUVIES 
					INNER JOIN COUNTRIES ON COUNTRIES.COUNTRYID = MOUVIE_MOUVIES.COUNTRYID 
					INNER JOIN MOUVIE_GENRE ON MOUVIE_GENRE.GENREID = MOUVIE_MOUVIES.GENREID
				ORDER BY UPLOADDATE";
		
	$result = OCIParse($db,$query);
	
	OCIExecute($result);
	
	OCIFetch($result);
	echo '';
	while(OCIFetch($result) > 0) {
		echo '<div class="catalog">';
		echo '<h2>'.mb_convert_encoding(OCIResult($result,"BGNAME"), 'UTF-8', 'Windows-1251').'/'.OCIResult($result,"ORIGINALNAME").'</h2>';
		echo '<img src="Posters/'.OCIResult($result,"IMAGEURL").'" width="242" heiht="350" /> ';
		echo '<div class="info"> ';
	
		echo '<table><tr><td>Държава: </td><td>'.mb_convert_encoding(OCIResult($result,"COUNTRY"), 'UTF-8', 'Windows-1251').'</td></tr>';
		echo '<tr><td>Жанр: </td><td>'.mb_convert_encoding(OCIResult($result,"GENRE"), 'UTF-8', 'Windows-1251').'</td></tr>';
		echo '<table><tr><td>Година: </td><td>'.mb_convert_encoding(OCIResult($result,"RELEASEDATE"), 'UTF-8', 'Windows-1251').'</td></tr>';
		echo '<tr><td>Резюме: </td><td>'.mb_convert_encoding(OCIResult($result,"RESUME"), 'UTF-8', 'Windows-1251').'</td></tr>';
		echo '</table>';
	
		echo '</div></div>';
	}
?>
</div>
<?php
	require "Themes/Footer.php";
?>