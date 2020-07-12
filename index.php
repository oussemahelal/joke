<?php
use \Ijdb\IjdbRoutes;
use \Ninja\EntryPoint;

ini_set('display_errors', 1);
try {
    include __DIR__ . '/include/autoload.php';
    $route = ltrim(strtok($_SERVER['REQUEST_URI'], '?'), '/');
    $entryPoint = new EntryPoint($route,$_SERVER['REQUEST_METHOD'], new IjdbRoutes());
    $entryPoint->run();
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage() . ' in '
        . $e->getFile() . ':' . $e->getLine();
}
