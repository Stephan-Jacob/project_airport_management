<?php
	/*stergere din tabela zboruri*/
	$nr_zbor= $_POST['id_zbor'];
	include('connection.php');

	$esql = "select id_avion from zboruri where id_zbor = ".$nr_zbor." ";
	$st_esql = oci_parse($conn, $esql);
	oci_execute($st_esql, OCI_DEFAULT);
	$array_avion = oci_fetch_row($st_esql);
	$id_avion = $array_avion[0];

	$sql_intermediar0 = "UPDATE grad_de_ocupare SET Avion_".$id_avion."= 0";
	$st_sql_intermediar0 = oci_parse($conn, $sql_intermediar0);
	oci_execute($st_sql_intermediar0, OCI_DEFAULT);


	
	$sql = "DELETE FROM zboruri where id_zbor='$nr_zbor'";
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
					<input type="button" value="Inapoi" onclick="location.href='zbor.php';">
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