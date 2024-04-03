<?php
	/*stergere din tabela aeroporturi*/
	$id_tabela = $_POST['id_tabela'];
    $id_calator = $_POST['id_calator'];
	include('connection.php');
	$sql = "DELETE FROM calatori_".$id_tabela." where id_calator='$id_calator'";
	$stid = oci_parse($conn,$sql);
    $r = oci_execute($stid);
?>     
<!DOCTYPE html>
<html>

	<title>Calatori</title>

	<body style="background-color:white;">
		<?php
			if($r)
			{
		?>
				
					<br><br><br><br><br><br><br>
					<center><h1 style="color:black; position:absolute;top:200px;left:560px">Datele au fost sterse</h1><br><br>
					</br></br></br></br></br></br></br></br></br></center>
					<center><form>
					<input type="button" value="Inapoi" onclick="location.href='checkin.php';">
					</form></center>
				
			
		<?php
			}
			if(!$r)
			{
		?>
					<br><br><br><br><br><br><br>
					<center><h1 style="color:black; position:absolute;top:200px;left:560px">Datele nu au fost sterse</h1><br><br>
					</br></br></br></br></br></br></br></br></br>	</center>
					<center><form>
	 				<input type="button" value="Inapoi" onclick="history.go(-1)">
					</form></center>
		<?php
			}
		?>	
	</body>
</html>