<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$config['db']['host']   = 'localhost';
$config['db']['user']   = 'root';
$config['db']['pass']   = '';
$config['db']['dbname'] = 'phpslim_db';

$app = new \Slim\App(['settings' => $config]);
$container = $app->getContainer();

$container['db'] = function ($c) {
    $settings = $c->get('settings')['db'];
    $pdo = new PDO("mysql:host=" . $settings['host'] . ";dbname=" . $settings['dbname'],
    $settings['user'], $settings['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};



//all JO records
$app->get('/api/job_order/all', function(){
	require_once('app/database/dbconnect.php');

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
	require_once('app/database/dbconnect.php');

	$query = "select * from tbl_jo";
	$id = $request->getAttribute('id');

	$query = "select * from tbl_jo where id =$id";
	$result = $mysqli->query($query);

	while($row = $result->fetch_assoc()){
		$data[]=$row;
	}
	echo json_encode($data);
});

//post/ create JO
$app->post('/add', function (Request $request, Response $response) {
    $data = $request->getParsedBody();
    $sql = "INSERT INTO tbl_jo (`requestor`,`comment`) VALUES (:requestor,:comment)";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("requestor", $data['requestor']);
    $sth->bindParam("comment", $data['comment']);
    $sth->execute();
    $data['id'] = $this->db->lastInsertId();
	return $this->response->withJson($data);
});


$app->get('/', function(){
	echo "welcome please log in <a href='http://localhost/PHPslim/api/login'> here <a>.";
});