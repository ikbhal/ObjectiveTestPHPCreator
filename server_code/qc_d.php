<?php
/**
* Delete all choices of a question
*/

include_once("db_connect.php");

$qid = $_REQUEST['qid'];
//echo "qid:$qd:<br>";

$response = deleteQuestionChoices($qid);

//header("content-type", "application/json");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');

echo json_encode($response);

function deleteQuestionChoices($qid){
	global $DB_CONN;

	//echo "qid:$qd:<br>";
	$query = "delete from choice where qid = $qid";
	//echo "query:$query:<br>";

	$status = "Fail";
	if(mysql_query($query, $DB_CONN)){
		$status = "Success";
	}

	$response = array("status" => $status);

	return $response;
}

?>