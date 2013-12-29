<?php
include_once("db_connect.php");

$cid = $_REQUEST['cid'];
$text = $_REQUEST['text'];


$response = updateChoice($cid, $text);

//header("content-type", "application/json");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');

echo json_encode($response);

function updateChoice($cid, $ctext){
	global $DB_CONN;

	//echo "cid:$cid:ctext:$ctext:<br>";
	$query = "update choice  set text ='$ctext' where cid = $cid";
	//echo "query:$query:<br>";

	$status = "Fail";
	if(mysql_query($query, $DB_CONN)){
		$status = "Success";
	}

	$response = array("status" => $status);

	return $response;
}

?>
