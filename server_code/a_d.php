<?php
include_once("db_connect.php");

$aid = $_REQUEST['aid'];
//echo "aid:$aid:<br>";

$response = deleteAnswer($aid);

//header("content-type", "application/json");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');

echo json_encode($response);

function deleteAnswer($aid){
	global $DB_CONN;

	//echo "aid:$aid:<br>";
	$query = "delete from answer where aid = $aid";
	//echo "query:$query:<br>";

	$status = "Fail";
	if(mysql_query($query, $DB_CONN)){
		$status = "Success";
	}

	$response = array("status" => $status);

	return $response;
}

?>