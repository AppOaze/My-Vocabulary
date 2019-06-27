<?php

// Start a Session
if( !session_id() ) @session_start();

require __DIR__ . '/vendor/autoload.php';

header('Content-Type: application/json');

$words_list = array();

try{

    include('inc/db.inc.php');

    $start = $_GET['start'];
    $length = $_GET['length'];
    if($_GET['random'] == 1)
        $order = 'ORDER BY RAND()';
    else
        $order = 'ORDER BY word_language.name_translated DESC';

    $query = $db->query("SELECT words.name as word_name, languages.name as language_name, word_language.name_translated
        FROM words
        INNER JOIN word_language ON words.id = word_language.word_id
        INNER JOIN languages ON word_language.language_id = languages.id
        $order
        LIMIT $length OFFSET $start");

    foreach($query as $word) {
        $words_list['data'][] = array(
            $word['word_name'],
            $word['language_name'],
            $word['name_translated'],
        );
    }

    // get total
    $count_query = $db->prepare('SELECT * FROM word_language');
    $count_query->execute();
    $count_total = $count_query->rowCount();

    $words_list['recordsFiltered'] = $count_total;
    $words_list['recordsTotal'] = count($words_list['data']);

} catch(Exception $e){
    $words_list = array();
}

echo json_encode($words_list);
exit();