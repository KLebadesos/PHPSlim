<?php

//all JO records
$app->get('/api/job_order/all', function(){
	require_once('../app/database/dbconnect.php');

	$query = "select * from tbl_jo";
	$result = $mysqli->query($query);

	while($row = $result->fetch_assoc()){
		$data[]=$row;
	}

	if (isset($data)){
		header('Content-Type: application/json');
		echo json_encode($data);
	}
	
});

//get request by id
$app->get('/api/job_order/{id}', function($request){
	require_once('../app/database/dbconnect.php');

	$query = "select * from tbl_jo";
	$id = $request->getAttribute('id');

	$query = "select * from tbl_jo where id =$id";
	$result = $mysqli->query($query);

	while($row = $result->fetch_assoc()){
		$data[]=$row;
	}
	echo json_encode($data);
});




$app->get('/', function(){
	echo "welcome please log in <a href='http://localhost/login'> here <a>.";
});