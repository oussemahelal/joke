<?php
ini_set('display_errors',1);
$title = 'Internet Joke Database';
ob_start();
include
__DIR__ . '/home.html.php';
$output = ob_get_clean();
include
__DIR__ . '/layout.html.php';
