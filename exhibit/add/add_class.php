<?	if(isset($_SESSION['name']))	{		//��������� ������ � ���������� �� � ��		if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['add'] == "��������")		{						$idKingdom = CleanData($_POST['kingdom'], 'i');			$idType = CleanData($_POST['type'], 'i');			$nameRus = CleanData($_POST['nameRus']);			$nameLat = CleanData($_POST['nameLat']);			if($nameRus != "" && $nameLat != "")			{				AddClass($idKingdom, $idType, $nameRus, $nameLat);				header("Location: index.php?actionAdd=add_class");			}					AddErrors($nameRus, $nameLat);		}	}?>