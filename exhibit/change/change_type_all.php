<div id='titlesus'>				<table>					<tr>						<td><img src='image/system/add_data.png' width='37px' height='40px' class='add_data'></td>						<td><span class='titlesus_h'>�������� ����������: ��������� ����</span></td>					</tr>				</table></div><?	if(isset($_SESSION['name']))	{						ShowErrors();		$sql = "SELECT id, namerus, namelat FROM tip";		$result = mysql_query($sql) or die(mysql_error());?>		<form name = "changeType" action = "index.php?actionChange=change_type" method = "POST">						<div id='cont'>				<fieldset class='fs'>				<legend><span class='legend'>��������� ����</span></legend>				<table>		<?			$count = 0;			while($rowType = mysql_fetch_assoc($result))			{				if($count == 0)				{					echo "<tr class='asdasd'><td><input type = 'radio' name = 'typeSelected' value = {$rowType[id]} checked></td><td>{$rowType['namerus']} | {$rowType['namelat']}</td></tr>";				}				else				{					echo "<tr class='asdasd'><td><input type = 'radio' name = 'typeSelected' value = {$rowType[id]}></td><td>{$rowType['namerus']} | {$rowType['namelat']}</td></tr>";				}				$count++;			}		?>				</table>				</fieldset>				<input type = "submit" name = "Ok" value = "�������" class="buttonw">		</form>		</div><?	}?>