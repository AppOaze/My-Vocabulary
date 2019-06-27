<?php

// Start a Session
if( !session_id() ) @session_start();

require __DIR__ . '/vendor/autoload.php';

try {
    if(!isset($_POST))
        throw new Exception('Login Data is empty');

    include('inc/db.inc.php');

    $auth = new \Delight\Auth\Auth($db);

    $auth->logOutEverywhere();
}
catch (\Delight\Auth\NotLoggedInException $e) {
    die('Not logged in');
}

header('Location: /');
