<?php

// Start a Session
if( !session_id() ) @session_start();

if ($_SERVER['REQUEST_METHOD'] != 'POST')
    header('Location: /');

header('Content-Type: application/json');

require __DIR__ . '/vendor/autoload.php';

$return = array();

try {
    if(!isset($_POST))
        throw new Exception('Login Data is empty');

    $db = new \PDO('mysql:dbname=my-vocabulary;host=localhost;charset=utf8mb4', 'my-vocabulary', 'n5B3*sn7');

    $auth = new \Delight\Auth\Auth($db);

    $response = $auth->login($_POST['email'], $_POST['password'], 600);

    $return = array(
        "status" => true,
        "message" => 'Login successfully !'
    );

}
catch (\Delight\Auth\InvalidEmailException $e) {
    $return = array(
        "status" => false,
        "message" => 'Wrong email'
    );
}
catch (\Delight\Auth\InvalidPasswordException $e) {
    $return = array(
        "status" => false,
        "message" => 'Wrong password'
    );
}
catch (\Delight\Auth\EmailNotVerifiedException $e) {
    $return = array(
        "status" => false,
        "message" => 'Email not verified'
    );
}
catch (\Delight\Auth\TooManyRequestsException $e) {
    $return = array(
        "status" => false,
        "message" => 'Too many requests'
    );
} catch(Exception $e){
    $return = array(
        "status" => false,
        "message" => $e->getTraceAsString()
    );
}

echo json_encode($return);
exit();