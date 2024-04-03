<?php
	include('connection.php');
	$sql = "select * from aeroporturi order by id_aeroport";
	$stid = oci_parse($conn,$sql);
    $r = oci_execute($stid);
?>
<!DOCTYPE html>
<html>
	<title>Aeroporturi</title>
	<body style="background-color:white">
		<center>
			<br><br><table align="center" border "1px" style="width:300px:line-height:30px; color:black">
			<thead>
				<tr>
					<th>ID Aeroport</th>
					<th>Nume</th>
					<th>Numar procesari zilnice maxim</th>
					
				</tr>
			</thead>

			<?php
				while ($row = oci_fetch_row($stid))   //oci_fetch_ro=returnează următorul rând dintr-o interogare
				{
			?>
					<tr>
						<td><?php echo $row[0];?></td>
						<td><?php echo $row[1];?></td>
						<td><?php echo $row[2];?></td>
					</tr>
			<?php
				}
			?>

				</table><br><br>
				<form>
	 				<input type="button" value="Inapoi" onclick="history.go(-1)">
				</form>
		</center>
	</body>
</html>