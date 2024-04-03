<?php
	/*inserare date in tabela rute*/
    $plecare = $_POST['plecare'];
	$sosire = $_POST['sosire'];
	$km = $_POST['km'];
	include('connection.php');

	$sql_id = "select MAX(id_ruta) from rute";
	$stid_id = oci_parse($conn,$sql_id);
    oci_execute($stid_id,OCI_DEFAULT);
	$row_id = oci_fetch_row($stid_id);
	$id_max = $row_id[0];
	if($id_max==null)
	{
		$id_max=0;
	}
	$sql = "INSERT INTO rute (ID_RUTA,PLECARE,SOSIRE,DISTANTA) values ($id_max+1,'$plecare', '$sosire', $km)";
	$stid = oci_parse($conn,$sql);
    $r = @oci_execute($stid);
	
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
					<center><h1 style="color:black;position:absolute;top:200px;left:600px">Datele au fost inserate</h1><br><br></center>
					</br></br></br></br></br></br></br></br></br>
                    <center>
                    <form>
	 				<input type="button" value="Inapoi" onclick="location.href='ruta.php';">
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