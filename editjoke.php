<?php
ini_set('display_errors', 1);
try {
    include_once __DIR__ . '/include/databaseconnection.php';
    include __DIR__ . '/classes/DatabaseTable.php';
    $jokesTable = new DatabaseTable($pdo, 'joke', 'id');
    if (isset($_POST['joketext']) && $_POST['joketext'] != null) { 
        $joke =$_POST['joke'];
        $joke['jokedate'] = new DateTime();
        $joke['authorid'] = 1;
        $jokesTable-> save($joke);
        header('location: jokes.php');
    } else {
        if (isset($_GET['id'])) {
            $joke =$jokesTable-> findById($_GET['id']);
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
