<div class="options">
	<input class="up" type="button" title="Предходен" />
	<ul>
		<li><input class="jsSelectedOption" type="button" value="Имена" /></li>
		<li><input class="jsSelectedOption" type="button" value="Адрес" /></li>
		<li><input class="jsSelectedOption" type="button" value="Парола" /></li>
		<li><input class="jsSelectedOption" type="button" value="1" /></li>
		<li><input class="jsSelectedOption" type="button" value="2" /></li>
		<li><input class="jsSelectedOption" type="button" value="3" /></li>
		<li><input class="jsSelectedOption" type="button" value="4" /></li>
		<li><input class="jsSelectedOption" type="button" value="5" /></li>
		<li><input class="jsSelectedOption" type="button" value="6" /></li>
		<li><input class="jsSelectedOption" type="button" value="7" /></li>
	</ul>
	<input class="down" type="button" alt="Следващ" />
</div>
<div class="settings">
		<div class="edit">
			<?php
				$query = "SELECT * FROM USERS WHERE Email = '".$_SESSION['Email']."'";

				$result = OCIParse($db,$query);
				OCIExecute($result);
				OCIFetch($result);
				
				echo '<h1 class="selectedOptionTitle" >fda</h1>';
				echo '<table>';
				echo '<tr class="Имена" ><td><label>Име</label></td><td class="View">'.OCIResult($result,"FIRSTNAME").'</td><td class="Edit"><input type="text" value="'.OCIResult($result,"FIRSTNAME").'" name="txtFirstName" /></td></tr>';
				echo '<tr class="Имена"><td><label>Фамилия</label></td><td><input type="text" value="'.OCIResult($result,"LASTNAME").'" name="txtLastName" /></td></tr>';
				echo '<tr class="Адрес"><td><label>Държава</label></td><td><input type="text" value="'.OCIResult($result,"COUNTRYID").'" name="txtCountry" /></td></tr>';
				echo '<tr class="Адрес"><td><label>Град</label></td><td><input type="text" value="'.OCIResult($result,"CITYID").'" name="txtCity" /></td></tr>';
				echo '<tr class="Адрес"><td><label>Адрес</label></td><td><input type="text" value="'.OCIResult($result,"ADDRESS").'" name="txtAddress" /></td></tr>';
				echo '<tr class="Парола"><td><label>Текуща парола</label></td><td><input type="text" value="'.OCIResult($result,"PASSWORD").'" name="txtAddress" /></td></tr>';
				echo '<tr class="Парола"><td><label>Нова парола</label></td><td><input type="text" value="'.OCIResult($result,"PASSWORD").'" name="txtAddress" /></td></tr>';
				echo '<tr class="Парола"><td><label>Отново</label></td><td><input type="text" value="'.OCIResult($result,"PASSWORD").'" name="txtAddress" /></td></tr>';
				echo '<tr class="1"><td><label>Отново</label></td><td><input type="text" value="" name="txtAddress" /></td></tr>';
				echo '<tr class="1"><td><label>Отново</label></td><td><input type="text" value="" name="txtAddress" /></td></tr>';
				echo '<tr class="1"><td><label>Отново</label></td><td><input type="text" value="" name="txtAddress" /></td></tr>';
				echo '<tr class="1"><td><label>Отново</label></td><td><input type="text" value="" name="txtAddress" /></td></tr>';
				echo '<tr class="2"><td><label>Отново</label></td><td><input type="text" value="" name="txtAddress" /></td></tr>';
				echo '<tr class="2"><td><label>Отново</label></td><td><input type="text" value="" name="txtAddress" /></td></tr>';
				echo '<tr class="2"><td><label>Отново</label></td><td><input type="text" value="" name="txtAddress" /></td></tr>';
				echo '<tr class="3"><td><label>Отново</label></td><td><input type="text" value="" name="txtAddress" /></td></tr>';
				echo '<tr class="3"><td><label>Отново</label></td><td><input type="text" value="" name="txtAddress" /></td></tr>';
				echo '<tr class="3"><td><label>Отново</label></td><td><input type="text" value="" name="txtAddress" /></td></tr>';
				echo '<tr class="4"><td><label>Отново</label></td><td><input type="text" value="" name="txtAddress" /></td></tr>';
				echo '<tr class="4"><td><label>Отново</label></td><td><input type="text" value="" name="txtAddress" /></td></tr>';
				echo '<tr class="4"><td><label>Отново</label></td><td><input type="text" value="" name="txtAddress" /></td></tr>';
				echo '<tr class="5"><td><label>Отново</label></td><td><input type="text" value="" name="txtAddress" /></td></tr>';
				echo '<tr class="5"><td><label>Отново</label></td><td><input type="text" value="" name="txtAddress" /></td></tr>';
				echo '<tr class="5"><td><label>Отново</label></td><td><input type="text" value="" name="txtAddress" /></td></tr>';
				echo '<tr class="6"><td><label>Отново</label></td><td><input type="text" value="" name="txtAddress" /></td></tr>';
				echo '<tr class="6"><td><label>Отново</label></td><td><input type="text" value="" name="txtAddress" /></td></tr>';
				echo '<tr class="6"><td><label>Отново</label></td><td><input type="text" value="" name="txtAddress" /></td></tr>';
				echo '<tr class="7"><td><label>Отново</label></td><td><input type="text" value="" name="txtAddress" /></td></tr>';
				echo '<tr class="7"><td><label>Отново</label></td><td><input type="text" value="" name="txtAddress" /></td></tr>';
				echo '<tr class="7"><td><label>Отново</label></td><td><input type="text" value="" name="txtAddress" /></td></tr>';
				echo '<tr class="7"><td><label>Отново</label></td><td><input type="text" value="" name="txtAddress" /></td></tr>';
				echo '<tr class="control"><td></td><td><input type="button" value="Промени" class="btnEdit" /></td><td><input class="btnSave float-right" type="submit" value="Запази" onClick="Test1()" /></td><tr></table>';
				
			?>

		</div>
	
	<input class="jsBTNHideProfile close" title="Затвори" type="button" />
</div>