<?php
    $user = 'root';
    $password = '';
    $db = 'user';
    $host = 'localhost';

    $dsn = 'mysql:host='.$host.';dbname='.$db;
    $pdo = new PDO($dsn, $user, $password);
?>
