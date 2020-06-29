<?php
ini_set('display_errors',1);
try {
    include __DIR__ . '/include/databaseconnection.php';
    include __DIR__ . '/include/databasefunction.php';
    $jokes = allAuthors($pdo);
    $authors = allAuthors($pdo);
    $title = 'author list';
    $totalJokes = totalJokes($pdo);
    $totalauthors = totalauthors($pdo);
    ob_start();
    include
    __DIR__ . '/authors.html.php';
    $output = ob_get_clean();
    }
    catch (PDOException $e) {
    $title = 'An error has occurred';
$output = 'Database error: ' . $e->getMessage() . '
in ' .$e->getFile() . ':' . $e->getLine();
}

include __DIR__ . '/layout.html.php';
