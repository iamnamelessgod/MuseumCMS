<?	if(isset($_SESSION['name']))	{		//��������� ������ � ���������� �� � ��		if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['add'] == "��������")		{						$idKingdom = CleanData($_POST['kingdom'], 'i');			$idType = CleanData($_POST['type'], 'i');			$idClass = CleanData($_POST['class'], 'i');			$idDetachment = CleanData($_POST['detachment'], 'i');			$nameRus = CleanData($_POST['nameRus']);			$nameLat = CleanData($_POST['nameLat']);			if($nameRus != "" && $nameLat != "")			{				$result = AddFamily($idKingdom, $idType, $idClass, $idDetachment, $nameRus, $nameLat);								if(isset($result) && $result != false)				{					AddSuccessMessage("������ � ��������� ������� ���������.");				}			}			AddErrors($nameRus, $nameLat);			?>			<script>museum.redirect("Add", "add_family")</script><?		}	}?><div id='titlesus'>	<table>		<tr>			<td><img src='image/system/add_data.png' width='37px' height='40px' class='add_data'></td>			<td><span class='titlesus_h'>�������� ����������: �������� ���������</span></td>		</tr>	</table></div><?	if(isset($_SESSION['name']))	{		if($_SERVER['REQUEST_METHOD'] != "POST")		{			ShowErrors();			ShowSuccessMessage();		}		$sqlKingdom = "SELECT id, namerus, namelat FROM carstva";		$resultKingdom = mysql_query($sqlKingdom) or die(mysql_error());		$sqlType = "SELECT id, namerus, namelat FROM tip";		$resultType = mysql_query($sqlType) or die(mysql_error());		$sqlClass = "SELECT id, namerus, namelat FROM klass";		$resultClass = mysql_query($sqlClass) or die(mysql_error());		$sqlDetachment = "SELECT id, namerus, namelat FROM otrjad";		$resultDetachment = mysql_query($sqlDetachment) or die(mysql_error());?>		<form name = "addDetachment" action = "index.php?actionAdd=add_family" method = "POST">			<div id='cont'>				<fieldset class='fs'>				<legend><span class='legend'>���������� ���������</span></legend>				<table>					<tr class='asdasd'>						<td class='number1'>�������</td>						<td><select name = "kingdom" class='ttext'>				<?					while($rowKingdom = mysql_fetch_assoc($resultKingdom))					{						echo "<option value = {$rowKingdom['id']}>{$rowKingdom['namerus']} | {$rowKingdom['namelat']}";					}				?>				</select></td>					</tr>					<tr class='asdasd'>						<td class='number1'>���</td>						<td><select name = "type" class='ttext'>				<?					while($rowType = mysql_fetch_assoc($resultType))					{						echo "<option value = {$rowType['id']}>{$rowType['namerus']} | {$rowType['namelat']}";					}				?>				</select></td>					</tr>					<tr class='asdasd'>						<td class='number1'>�����</td>						<td><select name = "class" class='ttext'>				<?					while($rowClass = mysql_fetch_assoc($resultClass))					{						echo "<option value = {$rowClass['id']}>{$rowClass['namerus']} | {$rowClass['namelat']}";					}				?>				</select></td>					</tr>					<tr class='asdasd'>						<td class='number1'>�����</td>						<td><select name = "detachment" class='ttext'>				<?					while($rowDetachment = mysql_fetch_assoc($resultDetachment))					{						echo "<option value = {$rowDetachment['id']}>{$rowDetachment['namerus']} | {$rowDetachment['namelat']}";					}				?>				</select></td>					</tr>					<tr class='asdasd'>						<td class='number1'>������� ��������<span class='star'>*</span></td>						<td><input type = "text" name = "nameRus" class='ttext' required></td>					</tr>					<tr class='asdasd'>						<td class='number1' >��������� ��������<span class='star'>*</span></td>						<td><input type = "text" name = "nameLat" class='ttext' required></td>					</tr>				</table>				</fieldset>				<input type = "submit" name = "add" value = "��������" class="buttonw">		</form>		</div><?	}?>