<?php
include __DIR__ . '/../model/Validator.php';
include __DIR__ . '/../model/Application.php';
$db =include __DIR__ . '/../model/database/start.php';
use App\Model\Validator;
use App\Model\Application;

$newValidator = new Validator;
$newApplication = new Application($db);
if(count($_POST) > 0){

	$data = [ 
	'name' => $_POST['name'],
	'lastName' => $_POST['lastName'],
	'email' => $_POST['email'],
	'phone' => $_POST['phone']
	];
	$customer = $newValidator->clean($data);
	$errorMessage = [];
if($error = $newValidator->check_name($customer['name'])) {
        $errorMessage[] = $error;
    }
if($error = $newValidator->check_last_name($customer['lastName'])) {
        $errorMessage[] = $error;
    }
if($error = $newValidator->check_email($customer['email'])) {
        $errorMessage[] = $error;
    }
if($error = $newValidator->check_phone($customer['phone'])) {
        $errorMessage[] = $error;
    }
if(array_filter($errorMessage) ) {
	echo json_encode(['status' => 'error','errors' =>$errorMessage]);
    return;
        }

	else{
		//var_dump($customer);die;
		
		$application = $newApplication->add('customer',[ 
			'name' => $customer['name'],
			'last_name' => $customer['lastName'],
			'email' => $customer['email'],
			'phone' => $customer['phone']
		]);
		echo json_encode(['status' => 'ok','data' =>$customer]);
	    return;
	}
}