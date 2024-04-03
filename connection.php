<?php



$username = 'test';
$password = 'test';

$conn = oci_connect($username, $password, '(DESCRIPTION = 
   (ADDRESS_LIST =
     (ADDRESS = (PROTOCOL = TCP)(HOST = test)(PORT = 1539))
   )
 (CONNECT_DATA =
   (SERVICE_NAME = test)
 )
)');

/*if($conn)
	echo "Connected";
else
	echo "Connection error!";
*/
?>