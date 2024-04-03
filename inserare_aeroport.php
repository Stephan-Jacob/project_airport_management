<?php
	/*inserare date in tabela aeroporturi*/
    $id = $_POST['id_aeroport'];
	$nume = $_POST['nume_aeroport'];
	$proc= $_POST['proc_max'];
	include('connection.php');
	$sql = "INSERT INTO aeroporturi (ID_AEROPORT,NUME,PROCESARI_MAX_ZILNIC) values ('$id', '$nume', $proc)";
	$stid = oci_parse($conn,$sql);
    $r = @oci_execute($stid);

	
	$sql_id = "select max(procesari_max_zilnic) from aeroporturi where id_aeroport='".$id."'";
	$stid_id = oci_parse($conn,$sql_id);
    oci_execute($stid_id,OCI_DEFAULT);
	$row_id = oci_fetch_row($stid_id);
	$id_max = $row_id[0];

	$sql2	=	"ALTER TABLE grad_de_ocupare ADD Aeroport_".$id." number(3)";
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
					<center><h1 style="color:black;position:absolute;top:200px;left:600px">Datele au fost inserate</h1><br><br></center>
					</br></br></br></br></br></br></br></br></br>
                    <center>
                    <form>
					<input type="button" value="Inapoi" onclick="location.href='aeroport.php';">
				    </form>
                    </center>

		<?php
			}
			if(!$r)
			{
		?>
				
					<br><br><br><br><br><br><br>
					<center><h1 style="color:black;position:absolute;top:200px;left:600px">Datele nu au fost inserate</h1><br><br></center>
					</br></br></br></br></br></br></br></br></br>
                    <center>
                    <form>
	 				<input type="button" value="Inapoi" onclick="history.go(-1)">
				    </form>
                    </center>
				
		<?php
			}
		?>
	</body>
 </html>