<div id='titlesus'>				<table>					<tr>						<td><img src='image/system/add_data.png' width='37px' height='40px' class='add_data'></td>						<td><span class='titlesus_h'>�������� ����������: �������� �����</span></td>					</tr>				</table></div><?		if(isset($_SESSION['name']))	{		//���������� ����� ����� �������� ����������		if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['Ok'] == "�������")		{			$sqlKingdom = "SELECT id, namerus, namelat FROM carstva";			$resultKingdom = mysql_query($sqlKingdom) or die(mysql_error());			$sqlType = "SELECT id, namerus, namelat FROM tip";			$resultType = mysql_query($sqlType) or die(mysql_error());			$id = CleanData($_POST["classSelected"], 'i');			$sqlClass = "SELECT id, idcar, idtip, namerus, namelat FROM klass WHERE id = {$id}";			$resultClass = mysql_query($sqlClass) or die(mysql_error());				$class = mysql_fetch_assoc($resultClass);	?>			<form name = "changeType" action = "index.php?actionChange=change_class" method = "POST">				<div id='cont'>		<fieldset class='fs'>		<legend><span class='legend'>��������� ������</span></legend>		<table>					<tr class='asdasd'>					<td class='number1'>�������</td>					<td><select name = "kingdom"class='ttext'>					<?													while($rowKingdom = mysql_fetch_assoc($resultKingdom))						{							if($class['idcar'] == $rowKingdom['id'])							{								echo "<option value = {$rowKingdom['id']} selected>{$rowKingdom['namerus']} | {$rowKingdom['namelat']}";							}							else							{								echo "<option value = {$rowKingdom['id']}>{$rowKingdom['namerus']} | {$rowKingdom['namelat']}";							}						}					?>					</select></td>				</tr>				<tr class='asdasd'>					<td class='number1'>���</td>					<td><select name = "type"class='ttext'>					<?													while($rowType = mysql_fetch_assoc($resultType))						{							if($class['idtip'] == $rowType['id'])							{								echo "<option value = {$rowType['id']} selected>{$rowType['namerus']} | {$rowType['namelat']}";							}							else							{								echo "<option value = {$rowType['id']}>{$rowType['namerus']} | {$rowType['namelat']}";							}						}					?>					</select></td>				</tr>				<tr class='asdasd'>					<td class='number1'>������� �������� ����<span class='star'>*</span></td>					<td><input type = "text"  class='ttext'name = "nameRus" value = "<?=$class['namerus']?>"></td>				</tr>				<tr class='asdasd'>					<td class='number1'>��������� �������� ����<span class='star'>*</span></td>					<td><input type = "text"  class='ttext'name = "nameLat" value = "<?=$class['namelat']?>"></td>				</tr>												</table>				</fieldset>				<input type = "hidden" name = "id" value = "<?=$id?>">				<input type = "submit" name = "Ok" value = "��������" class="buttonw">			</form>			</div><?		}	}?>