<?	if(isset($_SESSION['name']))	{			if($_SERVER['REQUEST_METHOD'] == "POST")		{			if(count($_POST['selectedSpecies']) > 0)			{				$result = false;								foreach($_POST['selectedSpecies'] as $specieId)				{					$id = CleanData($specieId, 'i');					$result = DeleteFromTableById("vid", $id) || $result;				}								if($result != false)				{					AddSuccessMessage("������ � ���� ������� �������.");				}			}		}	}?><div id='titlesus'>	<table>		<tr>			<td><img src='image/system/add_data.png' width='37px' height='40px' class='add_data'></td>			<td><span class='titlesus_h'>�������� ����������: ������� ���</span></td>		</tr>	</table></div><?	if(isset($_SESSION['name']))	{		ShowSuccessMessage();				//������� ���� �����		$sqlSpecies = "SELECT id, namerus, namelat FROM vid";		$resultSpecies = mysql_query($sqlSpecies) or die(mysql_error());?>		<div id='cont'>			<form name = "deleteSpecies" action = "index.php?actionDelete=delete_species" method = "POST">				<fieldset class='fs'>					<legend><span class='legend'>�������� ����</span></legend>					<table>						<tr>							<td><input type="checkbox" id="checkall" onclick="museum.checkAll(this)"></td>							<td>�����</td>							<td>������� ��������</td>							<td>��������� ��������</td>						</tr>					<?						$count = 1;						//����� ���� �����						while($rowSpecies = mysql_fetch_assoc($resultSpecies))						{							echo "<tr class='asdasd'>";							echo "<td><input type = 'checkbox' name = 'selectedSpecies[]' value = {$rowSpecies['id']}></td>";							echo "<td>{$count}</td>";							echo "<td>{$rowSpecies['namerus']}</td>";							echo "<td>{$rowSpecies['namelat']}</td></tr>";							$count++;						}					?>					</table>					<input type = "submit" name = "Delete" value = "�������"class="buttonw">				</fieldset>			</form>		</div><?	}?>