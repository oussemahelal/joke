<?php
ini_set('display_errors', 1);
try {

    include __DIR__ . '/include/databaseconnection.php';
    include __DIR__ . '/Classes/DatabaseTable.php';
    include __DIR__ . '/Controllers/JokeController.php';
    $jokesTable = new DatabaseTable($pdo, 'joke', 'id');
    $authorsTable = new DatabaseTable($pdo, 'author', 'id');
    $jokeController = new JokeController($jokesTable, $authorsTable);
    $action = $_GET['action'] ?? 'home';
    $page = $jokeController->$action();
    $title = $page['title'];
    $output = $page['output'];
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage() . ' in '
        . $e->getFile() . ':' . $e->getLine();
}
include
    __DIR__ . '/layout.html.php';
