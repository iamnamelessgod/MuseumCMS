<?		if(isset($_SESSION['name']))	{				if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['Ok'] == "��������")		{			//������� ��������� ������			$idKingdom = CleanData($_POST['kingdom'], 'i');			$nameRus = CleanData($_POST['nameRus']);			$nameLat = CleanData($_POST['nameLat']);			$id = CleanData($_POST['id'], 'i');			//�������� ��������� � ��			if($nameRus != "" && $nameLat != "")			{				ChangeType($id, $idKingdom, $nameRus, $nameLat);				header("Location: index.php?actionChangeAll=change_type");			}				AddErrors($nameRus, $nameLat);			header("Location: index.php?actionChangeAll=change_type");		}	}?>