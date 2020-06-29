<?php
ini_set('display_errors', 1);
include_once __DIR__ . '/include/databaseconnection.php';
include_once __DIR__ . '/include/databasefunction.php';
try {
    if (isset($_POST['joketext']) && $_POST['joketext'] != null) {
        save($pdo, 'joke', 'id', [
            'id' => $_POST['jokeid'],
            'joketext' => $_POST['joketext'],
            'jokedate' => new DateTime(),
            'authorId' => 1
        ]);
        header('location: jokes.php');
        //update($pdo,'joke','id',['id'=> $_POST['id'],'joketext'=> $_POST['joketext'],'authorid' => 1]);
    } else {
        if (isset($_GET['id'])) {
            $joke = findById($pdo, 'joke', 'id', $_GET['id']);
        }

        $title = 'Edite joke';
        ob_start();
        include_once __DIR__ . '/editjoke.html.php';
        $output = ob_get_clean();
    }
} catch (\PDOException $e) {
    $title = 'An erro has occurrend';
    $output = 'Database error: ' . $e->getMessage() . 'in ' . $e->getFile() . ':'
        . $e->getLine();
}
include_once __DIR__ . '/layout.html.php';
