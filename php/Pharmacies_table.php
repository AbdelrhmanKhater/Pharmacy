<?

	ob_start();
	session_start();
	include_once("MySQLi.php");
	header('Content-Type: application/json');
	
	$res=$db->fetch("SELECT * FROM pharmacies",true);
	for($i=0; $i<count($res);$i++){
		$x=$db->fetch("SELECT * FROM phones WHERE Pharmacy_ID='".$db->escape($res[$i]["Pharmacy_ID"])."'",true);
		if($x)
		$res[$i]["phones"]=$x;
	}
echo (json_encode($res,JSON_PRETTY_PRINT));

?>