<?php
	include('connection.php');
    $id_tabela = $_POST['id_tabela'];
    $id_zbor = $_POST['id_zbor'];
    $nume = $_POST['nume'];
    $sex = $_POST['sex'];
    $id_scaun = $_POST['id_scaun'];

    $sql_id = "select MAX(id_calator) from calatori_".$id_tabela." ";
	$stid_id = oci_parse($conn,$sql_id);
    oci_execute($stid_id,OCI_DEFAULT);
	$row_id = oci_fetch_row($stid_id);
	$id_max = $row_id[0];
	$id_calator = $id_max + 1;

    $select = "select id_calator from calatori_".$id_tabela." where id_scaun=".$id_scaun."  ";
    $stid_id = oci_parse($conn,$select);
    oci_execute($stid_id,OCI_DEFAULT);
    $array_exista = oci_fetch_row($stid_id);
	$exista = $array_exista[0];

    if(isset($exista) != false)
    {
        echo '					<br><br><br><br><br><br><br>
        <center><h1 style="color:black;position:absolute;top:200px;left:600px">Scaun deja ocupat!<br>Datele nu au fost inserate!</h1><br><br></center>
        </br></br></br></br></br></br></br></br></br>
        <center>
        <form>
         <input type="button" value="Inapoi" onclick="history.go(-1)">
        </form>
        </center>';
        exit;
    }

	$sql = "INSERT INTO calatori_".$id_tabela." (ID_CALATOR,ID_ZBOR,NUME,SEX, ID_SCAUN) values ($id_calator,$id_zbor, '$nume', '$sex', $id_scaun)";
	$stid = oci_parse($conn,$sql);
    $r = @oci_execute($stid);
?>

<!DOCTYPE html>
<html>

	<title>Zbor</title>
	
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
	 				<input type="button" value="Inapoi" onclick="location.href='checkin.php';">
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