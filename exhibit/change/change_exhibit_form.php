<div id='titlesus'>				<table>					<tr>						<td><img src='image/system/add_data.png' width='37px' height='40px' class='add_data'></td>						<td><span class='titlesus_h'>�������� ����������: �������� ��������</span></td>					</tr>				</table></div><?		if(isset($_SESSION['name']))	{					//���������� ����� ����� �������� ����������		if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['Ok'] == "�������")		{			$sqlSpecies = "SELECT id, namerus, namelat FROM vid";			$resultSpecies = mysql_query($sqlSpecies);								$id = CleanData($_POST["exhibitSelected"], 'i');			$sqlExhibit = "SELECT id, vid, kol, invnom, datpost, razm, ves, ist, mtizg, mvizg, autor, hisexp, pasport, photoname FROM eksponat WHERE id = {$id}";			$resultExhibit = mysql_query($sqlExhibit) or die(mysql_error());				$exhibit = mysql_fetch_assoc($resultExhibit);	?>			<form name = "changeExhibit" action = "index.php?actionChange=change_exhibit" method = "POST" enctype = "multipart/form-data">				<div id='cont'>		<fieldset class='fs'>		<legend><span class='legend'>��������� ���������</span></legend>		<table>					<tr class='asdasd'>					<td class='number1'>���</td>					<td><select name = "selectedSpecies" class='ttext'>								<?					while($rowSpecies = mysql_fetch_assoc($resultSpecies))					{						if($rowSpecies['id'] == $exhibit['vid'])						{							echo "<option selected value = {$rowSpecies['id']}>{$rowSpecies['namerus']} | {$rowSpecies['namelat']}\n";						}						else						{							echo "<option value = {$rowSpecies['id']}>{$rowSpecies['namerus']} | {$rowSpecies['namelat']}\n";						}					}				?>				</select></td>				</tr>				<tr class='asdasd'>					<td class='number1'>����������<span class='star'>*</span></td>					<td><input type = "text" class='ttext' name = "count" value = "<?=$exhibit['kol']?>">	</td>				</tr>				<tr class='asdasd'>					<td class='number1'>����������� �����<span class='star'>*</span></td>					<td><input type = "text" class='ttext' name = "inventoryNumber" value = "<?=$exhibit['invnom']?>"></td>				</tr>				<tr class='asdasd'>					<td class='number1'>���� �����������<span class='star'>*</span></td>					<td><input type = "text" class='ttext' name = "dateAct" value = "<?=$exhibit['datpost']?>">	</td>				</tr>				<tr class='asdasd'>					<td class='number1'>������<span class='star'>*</span></td>					<td><input type = "text" class='ttext' name = "size" value = "<?=$exhibit['razm']?>">	</td>				</tr>				<tr class='asdasd'>					<td class='number1'>���<span class='star'>*</span></td>					<td><input type = "text" class='ttext' name = "weight" value = "<?=$exhibit['ves']?>"></td>				</tr>				<tr class='asdasd'>					<td class='number1'>��� � ��� ��������� ��� ������</td>					<td><input type = "text" class='ttext' name = "findHistory" value = "<?=$exhibit['ist']?>"></td>				</tr>				<tr class='asdasd'>					<td class='number1'>�����</td>					<td><input type = "text" class='ttext' name = "author" value = "<?=$exhibit['autor']?>"></td>				</tr>				<tr class='asdasd'>					<td class='number1'>���������� �����<span class='star'>*</span></td>					<td><input type = "text" class='ttext' name = "passport" value = <?=$exhibit['pasport']?>></td>				</tr>				<tr class='asdasd'>					<td class='number1'>�������� ������������</td>					<td><textarea class='tarea' name = "makeMethod"><?=$exhibit['mtizg']?></textarea></td>				</tr>				<tr class='asdasd'>					<td class='number1'>����� ������������</td>					<td><textarea class='tarea' name = "makePlace"><?=$exhibit['mvizg']?></textarea>	</td>				</tr>								<tr class='asdasd'>					<td class='number1'>������� ������� ���������, �� ����������� � �����</td>					<td><textarea  class='tarea' name = "history"><?=$exhibit['hisexp']?></textarea></td>				</tr>								<tr class='asdasd'>				<td align='center' colspan="2"><img src = "image/exhibits/<?= $exhibit['photoname']?>" alt = "<?= $exhibit['namelat']?>" width = "200" height = "150"></td>				</tr>				<tr class='asdasd'>					<td class='number1'>����� �����������</td>					<td><input type = "file" name = "photo"></td>				</tr>				</table>				</fieldset>				<input type = "hidden" name = "id" value = "<?=$id?>">				<input type = "submit" name = "Ok" value = "��������" class="buttonw">			</form>			</div><?		}	}?>