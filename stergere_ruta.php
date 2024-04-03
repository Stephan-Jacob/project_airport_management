<?php
	/*stergere din tabela rute*/
	$nr_ruta= $_POST['id_ruta'];
	include('connection.php');
	$sql = "DELETE FROM rute where id_ruta='$nr_ruta'";
	$stid = oci_parse($conn,$sql);
    $r = oci_execute($stid);
?>     
<!DOCTYPE html>
<html>

	<title>Rute</title>

	<body style="background-color:white;">
		<?php
			if($r)
			{
		?>
				
					<br><br><br><br><br><br><br>
					<center><h1 style="color:black; position:absolute;top:200px;left:560px">Datele au fost sterse</h1><br><br>
					</br></br></br></br></br></br></br></br></br></center>
					<center><form>
					<input type="button" value="Inapoi" onclick="location.href='ruta.php';">
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