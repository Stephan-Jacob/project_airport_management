<?php
	/*stergere din tabela aeroporturi*/
	$nr_avion= $_POST['id_avion'];
	include('connection.php');
	$sql = "DELETE FROM avioane where id_avion='$nr_avion'";
	$stid = oci_parse($conn,$sql);
    $r = oci_execute($stid);

	$sql2	=	"ALTER TABLE grad_de_ocupare DROP COLUMN AVION_".$nr_avion."";
	$stid2 = oci_parse($conn,$sql2);
    $r = @oci_execute($stid2);
?>     
<!DOCTYPE html>
<html>

	<title>Aeroporturi</title>

	<body style="background-color:white;">
		<?php
			if($r)
			{
		?>
				
					<br><br><br><br><br><br><br>
					<center><h1 style="color:black; position:absolute;top:200px;left:560px">Datele au fost sterse</h1><br><br>
					</br></br></br></br></br></br></br></br></br></center>
					<center><form>
					<input type="button" value="Inapoi" onclick="location.href='avion.php';">
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