<?php

// Start a Session
if( !session_id() ) @session_start();

require __DIR__ . '/vendor/autoload.php';

try {
    if(!isset($_POST))
        throw new Exception('Login Data is empty');

    $db = new \PDO('mysql:dbname=my-vocabulary;host=localhost;charset=utf8mb4', 'my-vocabulary', 'n5B3*sn7');

    $auth = new \Delight\Auth\Auth($db);

    $auth->logOutEverywhere();
}
catch (\Delight\Auth\NotLoggedInException $e) {
    die('Not logged in');
}

header('Location: /');
