<div id='titlesus'>				<table>					<tr>						<td><img src='image/system/add_data.png' width='37px' height='40px' class='add_data'></td>						<td><span class='titlesus_h'>�������� ����������: �������� ���</span></td>					</tr>				</table></div><?		if(isset($_SESSION['name']))	{					//���������� ����� ����� �������� ����������		if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['Ok'] == "�������")		{			$sqlKingdom = "SELECT id, namerus, namelat FROM carstva";			$resultKingdom = mysql_query($sqlKingdom) or die(mysql_error());			$sqlType = "SELECT id, namerus, namelat FROM tip";			$resultType = mysql_query($sqlType) or die(mysql_error());			$sqlClass = "SELECT id, namerus, namelat FROM klass";			$resultClass = mysql_query($sqlClass) or die(mysql_error());			$sqlDetachment = "SELECT id, namerus, namelat FROM otrjad";			$resultDetachment = mysql_query($sqlDetachment) or die(mysql_error());			$sqlFamily = "SELECT id, namerus, namelat FROM semejstva";			$resultFamily = mysql_query($sqlFamily) or die(mysql_error());			$id = CleanData($_POST["speciesSelected"], 'i');			$sqlSpecies = "SELECT id, idcar, idtip, idklass, idotr, idsem, namerus, namelat FROM vid WHERE id = {$id}";			$resultSpecies = mysql_query($sqlSpecies) or die(mysql_error());				$species = mysql_fetch_assoc($resultSpecies);	?>			<form name = "changeSpecies" action = "index.php?actionChange=change_species" method = "POST">		<div id='cont'>		<fieldset class='fs'>		<legend><span class='legend'>��������� ����</span></legend>		<table>				<tr class='asdasd'>					<td class='number1'>�������</td>					<td><select name = "kingdom" class='ttext'>					<?													while($rowKingdom = mysql_fetch_assoc($resultKingdom))						{							if($species['idcar'] == $rowKingdom['id'])							{								echo "<option value = {$rowKingdom['id']} selected>{$rowKingdom['namerus']} | {$rowKingdom['namelat']}";							}							else							{								echo "<option value = {$rowKingdom['id']}>{$rowKingdom['namerus']} | {$rowKingdom['namelat']}";							}						}					?>					</select></td>			</tr>			<tr class='asdasd'>					<td class='number1'>���</td>					<td><select name = "type" class='ttext'>					<?													while($rowType = mysql_fetch_assoc($resultType))						{							if($species['idtip'] == $rowType['id'])							{								echo "<option value = {$rowType['id']} selected>{$rowType['namerus']} | {$rowType['namelat']}";							}							else							{								echo "<option value = {$rowType['id']}>{$rowType['namerus']} | {$rowType['namelat']}";							}						}					?>					</select></td>			</tr>			<tr class='asdasd'>					<td class='number1'>�����</td>					<td><select name = "class" class='ttext'>					<?													while($rowClass = mysql_fetch_assoc($resultClass))						{							if($species['idklass'] == $rowClass['id'])							{								echo "<option value = {$rowClass['id']} selected>{$rowClass['namerus']} | {$rowClass['namelat']}";							}							else							{								echo "<option value = {$rowClass['id']}>{$rowClass['namerus']} | {$rowClass['namelat']}";							}						}					?>					</select></td>			</tr>			<tr class='asdasd'>					<td class='number1'>�����</td>					<td><select name = "detachment" class='ttext'>					<?													while($rowDetachment = mysql_fetch_assoc($resultDetachment))						{							if($species['idotr'] == $rowDetachment['id'])							{								echo "<option value = {$rowDetachment['id']} selected>{$rowDetachment['namerus']} | {$rowDetachment['namelat']}";							}							else							{								echo "<option value = {$rowDetachment['id']}>{$rowDetachment['namerus']} | {$rowDetachment['namelat']}";							}						}					?>					</select></td>			</tr>			<tr class='asdasd'>					<td class='number1'>���������</td>					<td><select name = "family" class='ttext'>					<?													while($rowFamily = mysql_fetch_assoc($resultFamily))						{							if($species['idsem'] == $rowFamily['id'])							{								echo "<option value = {$rowFamily['id']} selected>{$rowFamily['namerus']} | {$rowFamily['namelat']}";							}							else							{								echo "<option value = {$rowFamily['id']}>{$rowFamily['namerus']} | {$rowFamily['namelat']}";							}						}					?>					</select></td>			</tr>			<tr class='asdasd'>					<td class='number1'>������� �������� ����<span class='star'>*</span></td>					<td><input type = "text" name = "nameRus" class='ttext' value = "<?=$species['namerus']?>"></td>			</tr>			<tr class='asdasd'>					<td class='number1'>��������� �������� ����<span class='star'>*</span></td>					<td><input type = "text" name = "nameLat" class='ttext' value = "<?=$species['namelat']?>"></td>			</tr>					</table>				</fieldset>				<input type = "hidden" name = "id" value = "<?=$id?>">				<input type = "submit" name = "Ok" value = "��������" class="buttonw">				<input type = 'submit' name = 'back' value = '�����' class="buttonw">			</form>			</div><?		}	}?>