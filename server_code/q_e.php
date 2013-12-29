<?php
include_once("db_connect.php");

$qid = $_REQUEST['qid'];
$text = $_REQUEST['text'];


$response = updateQuestion($qid, $text);

//header("content-type", "application/json");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');

echo json_encode($response);

function updateQuestion($qid, $qtext){
	global $DB_CONN;

	//echo "qid:$qd:qtext:$qtext:<br>";
	$query = "update question  set text ='$qtext' where qid = $qid";
	//echo "query:$query:<br>";

	$status = "Fail";
	if(mysql_query($query, $DB_CONN)){
		$status = "Success";
	}

	$response = array("status" => $status);

	return $response;
}

?>
