<?php

// Start a Session
if( !session_id() ) @session_start();

if ($_SERVER['REQUEST_METHOD'] != 'POST'){}
   //header('Location: /');

header('Content-Type: application/json');

require __DIR__ . '/vendor/autoload.php';

$return = array();

try{

    include('inc/db.inc.php');

    $auth = new \Delight\Auth\Auth($db);

    if (!$auth->isLoggedIn())
        throw new Exception('Not Logged');

    $user_id = $auth->getUserId();
    $word_name = $_POST['word'];
    $language_id = $_POST['language'];
    $translation_name = $_POST['translation'];

    if(!isset($word_name) || !isset($language_id) || !isset($translation_name))
        throw new Exception('You forgot to enter the world or translation');

    // word exist ?
    $word_exist = $db->prepare("SELECT id FROM words WHERE name='$word_name' LIMIT 1");
    $word_exist->execute();
    $word = $word_exist->fetch();

    if(isset($word['id'])){
        $word_id = $word['id'];

        // translation exist ?
        $translation_exist = $db->prepare("SELECT * FROM word_language WHERE word_id=$word_id AND language_id=$language_id LIMIT 1");
        $translation_exist->execute();
        $translation = $translation_exist->fetch();

        if(isset($translation['word_id']))
            throw new Exception("This word and translation already exist !");

    } else {
        // insert
        $query = $db->query("INSERT INTO words VALUES (null, $user_id, '$word_name')");
        $word_id = $db->lastInsertId();
    }

    $query = $db->query("INSERT INTO word_language VALUES ($word_id, $language_id, '$translation_name')");

    // fetch language name
    $stmt = $db->prepare("SELECT name FROM languages WHERE id=$language_id LIMIT 1");
    $stmt->execute();
    $row = $stmt->fetch();

    $return = array(
        "status" => true,
        "message" => "Word added with success !",
        "data" => array(
            "word" => $word_name,
            "language" => $row['name'],
            "translation" => $translation_name,
        )
    );


} catch(Exception $e){
    $return = array(
        "status" => false,
        "message" => $e->getMessage()
    );
}

echo json_encode($return);
exit();