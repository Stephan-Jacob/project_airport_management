<?php
	/*inserare date in tabela aeroporturi*/
    $model = $_POST['model'];
	$autonomie = $_POST['autonomie'];
	$nr_locuri = $_POST['nr_locuri'];
	include('connection.php');

	$sql_id = "select MAX(id_avion) from avioane";
	$stid_id = oci_parse($conn,$sql_id);
    oci_execute($stid_id,OCI_DEFAULT);
	$row_id = oci_fetch_row($stid_id);
	$id_max = $row_id[0];
	$id_avion = $id_max + 1;

	$sql = "INSERT INTO avioane (ID_AVION,MODEL,AUTONOMIE,NR_LOCURI) values ($id_avion,'$model', $autonomie, $nr_locuri)";
	$stid = oci_parse($conn,$sql);
    $r = @oci_execute($stid);

	$sql2	=	"ALTER TABLE grad_de_ocupare ADD Avion_".$id_avion." number(1) check (Avion_".$id_avion." < 2 )";
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
	 				<input type="button" value="Inapoi" onclick="location.href='avion.php';">
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