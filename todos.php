<?php
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
	header('Access-Control-Allow-Headers: X-Requested-With');
	header('Content-Type: application/json');

	include_once 'database.php';

	$todo = new Database();

    $method = $_SERVER['REQUEST_METHOD'];

    $id = intval($_GET['id'] ?? '');

    if ($method == 'GET') {
        $data = $todo->get();
        echo json_encode($data);
    }

    if ($method == 'PUT') {
        $data = json_decode(file_get_contents("php://input"));

        if($todo->update($id, $data)) {
            echo json_encode(["msg" => "Todo updated!"]);
        }
    }

    if ($method == 'POST') {
        if($todo->insert($_POST['name'])) {
            echo json_encode(["msg" => "Todo created!"]);
        }
    }

    if ($method == 'DELETE') {
        if ($id != null) {
            if ($todo->delete($id)) {
        
                echo json_encode(["msg" => "Todo deleted successfully!"]);
            } else {
                echo json_encode(["msg" => "Todo deleteion failed!"]);
            }
        } else {
            echo json_encode(["msg" => "Todo not found!"]);
        }
    }