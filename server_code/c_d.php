<?php
include_once("db_connect.php");

$cid = $_REQUEST['did'];
//echo "cid:$cd:<br>";

$response = deleteChoice($cid);

//header("content-type", "application/json");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');

echo json_encode($response);

function deleteChoice($cid){
	global $DB_CONN;

	//echo "cid:$cd:<br>";
	$query = "delete from choice where cid = $cid";
	//echo "query:$query:<br>";

	$status = "Fail";
	if(mysql_query($query, $DB_CONN)){
		$status = "Success";
	}

	$response = array("status" => $status);

	return $response;
}

?>