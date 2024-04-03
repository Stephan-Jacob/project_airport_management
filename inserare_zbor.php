<?php
	/*inserare date in tabela zboruri*/
    $id_ruta = $_POST['id_ruta'];
	$id_avion = $_POST['id_avion'];
	$ziua = $_POST['ziua'];
	$ziua_sql = "TO_DATE('".$ziua."', 'YYYY-MM-DD')";
	include('connection.php');
	$sql_id = "select MAX(id_zbor) from zboruri";
	$stid_id = oci_parse($conn,$sql_id);
    oci_execute($stid_id,OCI_DEFAULT);
	$row_id = oci_fetch_row($stid_id);
	$id_max = $row_id[0];
	$id_zbor = $id_max + 1;

	$get_distanta_posibila = "SELECT AUTONOMIE FROM AVIOANE WHERE ID_AVION = ".$id_avion." ";
	$st_get_distanta_posibila = oci_parse($conn, $get_distanta_posibila);
	oci_execute($st_get_distanta_posibila, OCI_DEFAULT);
	$array_distanta_posibila = oci_fetch_row($st_get_distanta_posibila);
	$distanta_posibila = $array_distanta_posibila[0];

	$get_distanta_parcursa = "SELECT DISTANTA FROM RUTE WHERE ID_RUTA = ".$id_ruta." ";
	$st_get_distanta_parcursa = oci_parse($conn, $get_distanta_parcursa);
	oci_execute($st_get_distanta_parcursa, OCI_DEFAULT);
	$array_distanta_parcursa = oci_fetch_row($st_get_distanta_parcursa);
	$distanta_parcursa = $array_distanta_parcursa[0];



	if($distanta_posibila < $distanta_parcursa)
	{
		echo '					<br><br><br><br><br><br><br>
		<center><h1 style="color:black;position:absolute;top:200px;left:600px">Distanta este prea mare pentru a fi parcursa cu acest avion! <br> Datele nu au fost inserate</h1><br><br></center>
		</br></br></br></br></br></br></br></br></br>
		<center>
		<form>
		 <input type="button" value="Inapoi" onclick="history.go(-1)">
		</form>
		</center>';
		exit;
	}

	$verificare_data = "SELECT DATA FROM GRAD_DE_OCUPARE WHERE DATA > trunc(".$ziua_sql.") - 1  AND DATA < trunc(".$ziua_sql.") + 1";
	$stverifdata = oci_parse($conn, $verificare_data);
	oci_execute($stverifdata, OCI_DEFAULT);
	$output_data = oci_fetch_row($stverifdata);
	$var_output_data = $output_data[0];

	if(isset($var_output_data) == false)
	{
		$sql_adaugare_data = "INSERT INTO GRAD_DE_OCUPARE(DATA) VALUES (".$ziua_sql.")";
		$st_adaugare_data = oci_parse($conn, $sql_adaugare_data);
		oci_execute($st_adaugare_data, OCI_DEFAULT);
	}
	
	$verificare_incarcare_avion = "SELECT AVION_".$id_avion." FROM GRAD_DE_OCUPARE WHERE DATA > trunc(".$ziua_sql.") - 1  AND DATA < trunc(".$ziua_sql.") + 1";
	$stverifav = oci_parse($conn,$verificare_incarcare_avion);
	oci_execute($stverifav,OCI_DEFAULT);
	$output=oci_fetch_row($stverifav);
	$output_avion = $output[0];
	
	if(isset($output_avion) == false)
	{
		$sql_intermediar0 = "UPDATE grad_de_ocupare SET Avion_".$id_avion."= 0";
		$st_sql_intermediar0 = oci_parse($conn, $sql_intermediar0);
		oci_execute($st_sql_intermediar0, OCI_DEFAULT);
	}
	else
	{
		if($output_avion == 1)
		{
			echo '					<br><br><br><br><br><br><br>
			<center><h1 style="color:black;position:absolute;top:200px;left:600px">Avionul este deja folosit in acea perioada! <br> Datele nu au fost inserate</h1><br><br></center>
			</br></br></br></br></br></br></br></br></br>
			<center>
			<form>
			 <input type="button" value="Inapoi" onclick="history.go(-1)">
			</form>
			</center>';
			exit;
		}
	}
	if($output_avion == 0)
	{
		$sql_intermediar1 = "UPDATE grad_de_ocupare SET Avion_".$id_avion."=1";
		$st_sql_intermediar1 = oci_parse($conn, $sql_intermediar1);
		$r = @oci_execute($st_sql_intermediar1, OCI_DEFAULT);
	}

	$get_decolare = "SELECT PLECARE FROM RUTE WHERE ID_RUTA = ".$id_ruta." ";
	$st_get_decolare = oci_parse($conn, $get_decolare);
	oci_execute($st_get_decolare, OCI_DEFAULT);
	$array_decolare = oci_fetch_row($st_get_decolare);
	$decolare = $array_decolare[0];

	$get_ocupare_plecare = "SELECT PROCESARI_MAX_ZILNIC FROM AEROPORTURI WHERE ID_AEROPORT = '".$decolare."' ";
	$st_get_ocupare_plecare = oci_parse($conn, $get_ocupare_plecare);
	oci_execute($st_get_ocupare_plecare, OCI_DEFAULT);
	$array_ocupare_plecare = oci_fetch_row($st_get_ocupare_plecare);
	$ocupare_plecare = $array_ocupare_plecare[0];



	$verificare_incarcare_plecare = "SELECT AEROPORT_".$decolare." FROM GRAD_DE_OCUPARE WHERE DATA > trunc(".$ziua_sql.") - 1  AND DATA < trunc(".$ziua_sql.") + 1";
	$stverifplec = oci_parse($conn,$verificare_incarcare_plecare);
	oci_execute($stverifplec,OCI_DEFAULT);
	$output_plec=oci_fetch_row($stverifplec);
	$output_plecare = $output_plec[0];

	//print_r($ocupare_plecare."   ".$output_plecare);
	//exit;
	if(isset($output_plecare) == false)
	{
		$sql_intermediar2 = "UPDATE grad_de_ocupare SET AEROPORT_".$decolare."= 1";
		$st_sql_intermediar2 = oci_parse($conn, $sql_intermediar2);
		oci_execute($st_sql_intermediar2, OCI_DEFAULT);
	}
	else
	{
		if($output_plecare < $ocupare_plecare)
		{
			$sql_intermediar3 = "UPDATE grad_de_ocupare SET AEROPORT_".$decolare." = ".($output_plecare+1)." ";
			//print_r($sql_intermediar3);
			//exit;
			$st_sql_intermediar3 = oci_parse($conn, $sql_intermediar3);
			$r = @oci_execute($st_sql_intermediar3, OCI_DEFAULT);
		}
		else
		{
			echo '					<br><br><br><br><br><br><br>
			<center><h1 style="color:black;position:absolute;top:200px;left:600px">Aeroportul de plecare este suprasolicitat! <br> Datele nu au fost inserate</h1><br><br></center>
			</br></br></br></br></br></br></br></br></br>
			<center>
			<form>
			 <input type="button" value="Inapoi" onclick="history.go(-1)">
			</form>
			</center>';
			exit;
		}
	}
	/*if($output_plecare == 0)
	{
		$sql_intermediar4 = "UPDATE grad_de_ocupare SET AEROPORT_".$decolare."= 1";
		$st_sql_intermediar4 = oci_parse($conn, $sql_intermediar4);
		$r = @oci_execute($st_sql_intermediar4, OCI_DEFAULT);
	}*/
	
	$get_aterizare = "SELECT SOSIRE FROM RUTE WHERE ID_RUTA = ".$id_ruta." ";
	$st_get_aterizare = oci_parse($conn, $get_aterizare);
	oci_execute($st_get_aterizare, OCI_DEFAULT);
	$array_aterizare = oci_fetch_row($st_get_aterizare);
	$aterizare = $array_aterizare[0];

	$get_ocupare_aterizare = "SELECT PROCESARI_MAX_ZILNIC FROM AEROPORTURI WHERE ID_AEROPORT = '".$aterizare."' ";
	$st_get_ocupare_aterizare = oci_parse($conn, $get_ocupare_aterizare);
	oci_execute($st_get_ocupare_aterizare, OCI_DEFAULT);
	$array_ocupare_aterizare = oci_fetch_row($st_get_ocupare_aterizare);
	$ocupare_aterizare = $array_ocupare_aterizare[0];

	$verificare_incarcare_aterizare = "SELECT AEROPORT_".$aterizare." FROM GRAD_DE_OCUPARE WHERE DATA > trunc(".$ziua_sql.") - 1  AND DATA < trunc(".$ziua_sql.") + 1";
	$stverifateriz = oci_parse($conn,$verificare_incarcare_aterizare);
	oci_execute($stverifateriz,OCI_DEFAULT);
	$output_ateriz=oci_fetch_row($stverifateriz);
	$output_aterizare = $output_ateriz[0];

	if(isset($output_aterizare) == false)
	{
		$sql_intermediar5 = "UPDATE grad_de_ocupare SET AEROPORT_".$aterizare."= 0";
		$st_sql_intermediar5 = oci_parse($conn, $sql_intermediar5);
		oci_execute($st_sql_intermediar5, OCI_DEFAULT);
	}
	else
	{
		if($output_aterizare < $ocupare_aterizare)
		{
			$sql_intermediar6 = "UPDATE grad_de_ocupare SET AEROPORT_".$aterizare." = ".($output_aterizare+1)." ";
			$st_sql_intermediar6 = oci_parse($conn, $sql_intermediar6);
			$r = @oci_execute($st_sql_intermediar6, OCI_DEFAULT);
		}
		else
		{
			echo '					<br><br><br><br><br><br><br>
			<center><h1 style="color:black;position:absolute;top:200px;left:600px">Aeroportul de plecare este suprasolicitat! <br> Datele nu au fost inserate</h1><br><br></center>
			</br></br></br></br></br></br></br></br></br>
			<center>
			<form>
			 <input type="button" value="Inapoi" onclick="history.go(-1)">
			</form>
			</center>';
			exit;
		}
	}
	if($output_aterizare == 0)
	{
		$sql_intermediar7 = "UPDATE grad_de_ocupare SET AEROPORT_".$aterizare."= 1";
		$st_sql_intermediar7 = oci_parse($conn, $sql_intermediar7);
		$r = @oci_execute($st_sql_intermediar7, OCI_DEFAULT);
	}



	$sql = "INSERT INTO zboruri (ID_ZBOR,ID_RUTA,ID_AVION,ZIUA) values ($id_zbor,$id_ruta, $id_avion, TO_DATE('$ziua', 'YYYY-MM-DD'))";
	$stid = oci_parse($conn,$sql);
	$r = @oci_execute($stid);

	$sql_tabela_calatori = "CREATE TABLE CALATORI_".$id_max."
	(
	ID_CALATOR NUMBER(3) PRIMARY KEY,
	ID_ZBOR NUMBER(3),
	NUME VARCHAR2(20),
	SEX VARCHAR2(1),
	ID_SCAUN NUMBER(3),
	CONSTRAINT ID_ZBOR_FK FOREIGN KEY(ID_ZBOR) REFERENCES ZBORURI(ID_ZBOR))";
	$st_sql_tabela = oci_parse($conn, $sql_tabela_calatori);
	$r = @oci_execute($st_sql_tabela);

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
	 				<input type="button" value="Inapoi" onclick="location.href='zbor.php';">
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