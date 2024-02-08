<?php
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
	header('Access-Control-Allow-Headers: X-Requested-With');
	header('Content-Type: application/json');

	include_once 'database.php';

	$todo = new Database();

    $method = $_SERVER['REQUEST_METHOD'];

    if ($method == 'GET') {
        $data = $todo->get();
        echo json_encode($data);
    }

    if ($method == 'PUT') {

    }

    if ($method == 'POST') {

    }

    if ($method == 'DELETE') {

    }