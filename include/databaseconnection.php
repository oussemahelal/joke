<?php
$pdo = new PDO('mysql:host=localhost;dbname=base;
charset=utf8', 'ijbuser', 'OUSSEMA 1991');
$pdo->setAttribute(PDO::ATTR_ERRMODE,
PDO::ERRMODE_EXCEPTION);
