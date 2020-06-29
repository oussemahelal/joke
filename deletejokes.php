<?php
ini_set('display_errors', 1);
try {
    include_once __DIR__ . '/include/databaseconnection.php';
    include_once __DIR__ . '/include/databasefunction.php';
    delete($pdo, 'joke', 'id', $_POST['id']);
    header('location: jokes.php');
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in '
        . $e->getFile() . ':' . $e->getLine();
}
$title = 'Delete joke';
include
    __DIR__ . '/layout.html.php';
