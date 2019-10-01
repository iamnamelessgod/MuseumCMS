<?
	if(isset($_SESSION['name']))
	{
		if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['add'] == "Добавить")
		{
			$idKingdom = CleanData($_POST['kingdom'], 'i');
			$idType = CleanData($_POST['type'], 'i');
			$idClass = CleanData($_POST['class'], 'i');
			$nameRus = CleanData($_POST['nameRus']);
			$nameLat = CleanData($_POST['nameLat']);
			if($nameRus != "" && $nameLat != "")
			{
				if($_FILES['photo']['size'] != 0 && $_FILES['photo']['size'] <= 1024000)
				{
					if($_FILES['photo']['type'] == "image/jpeg")
					{
						$photoName = $nameLat . ".jpg";
						$uploaddir = 'image/detachments/';
						$uploadfile = $uploaddir . $photoName;
						move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile);
						
						$result = AddDetachment($idKingdom, $idType, $idClass, $nameRus, $nameLat, $photoName);
						if(isset($result) && $result != false)
						{
							AddSuccessMessage("Запись об отряде успешно добавлена");
						}
					}
				}
				if($_FILES['photo']['name'] == "")
				{
					$result = AddDetachment($idKingdom, $idType, $idClass, $nameRus, $nameLat);
					if(isset($result) && $result != false)
					{
						AddSuccessMessage("Запись об отряде успешно добавлена");
					}
				}
			}
			if($_FILES['photo']['name'] == "")
			{
				AddErrors($nameRus, $nameLat);
			}
			else
			{
				AddErrors($nameRus, $nameLat, $_FILES['photo']['size'], $_FILES['photo']['type']);
			}
			
			echo "<script>museum.redirect('Add', 'add_detachment');</script>";
		}
	}
?>
<div class='info'>
	<table>
		<tr>
			<td><img src='image/system/add_data.png' width='37px' height='40px' class='add_data'></td>
			<td><span class='info__title'>Менеджер экспонатов: добавить отряд</span></td>
		</tr>
	</table>
</div>
<?
	if(isset($_SESSION['name']))
	{
		if($_SERVER['REQUEST_METHOD'] != "POST")
		{
			ShowErrors();
			ShowSuccessMessage();
		}
		$sqlKingdom = "SELECT id, namerus, namelat FROM carstva";
		$resultKingdom = mysql_query($sqlKingdom) or die(mysql_error());
		$sqlType = "SELECT id, namerus, namelat FROM tip";
		$resultType = mysql_query($sqlType) or die(mysql_error());
		$sqlClass = "SELECT id, namerus, namelat FROM klass";
		$resultClass = mysql_query($sqlClass) or die(mysql_error());
?>
		<form name = "addDetachment" action = "index.php?actionAdd=add_detachment" method = "POST" enctype = "multipart/form-data">
			<div id='form'>
				<fieldset class='form__fieldset'>
				<legend><span class='form__legend'>Добавление отряда</span></legend>
				<table>
					<tr class='form__row'>
						<td class='form__label'>Царство</td>
						<td><select name = "kingdom" class='form__input'>
				<?
					while($rowKingdom = mysql_fetch_assoc($resultKingdom))
					{
						echo "<option value = {$rowKingdom['id']}>{$rowKingdom['namerus']} | {$rowKingdom['namelat']}";
					}
				?>
				</select></td>
					</tr>
					<tr class='form__row'>
						<td class='form__label'>Тип</td>
						<td><select name = "type" class='form__input'>
				<?
					while($rowType = mysql_fetch_assoc($resultType))
					{
						echo "<option value = {$rowType['id']}>{$rowType['namerus']} | {$rowType['namelat']}";
					}
				?>
				</select></td>
					</tr>
					<tr class='form__row'>
						<td class='form__label'>Класс</td>
						<td><select name = "class" class='form__input'>
				<?
					while($rowClass = mysql_fetch_assoc($resultClass))
					{
						echo "<option value = {$rowClass['id']}>{$rowClass['namerus']} | {$rowClass['namelat']}";
					}
				?>
				</select></td>
					</tr>
					<tr class='form__row'>
						<td class='form__label'>Русское название<span class='form__star'>*</span></td>
						<td><input type = "text" name = "nameRus" class='form__input' required></td>
					</tr>
					<tr class='form__row'>
						<td class='form__label'>Латинское название<span class='form__star'>*</span></td>
						<td><input type = "text" name = "nameLat" class='form__input' required></td>
					</tr>
					<tr class='form__row'>
						<td class='form__label'>Изображение</td>
						<td><input type = "file" name = "photo" acept = "image/jpeg"></td>
					</tr>
				</table>
				</fieldset>
				<input type = "submit" name = "add" value = "Добавить" class="form__button">
		</form>
		</div>
<?
	}
?>