<?php
$host = 'localhost';
$db   = 'zoo';
$user = 'user1';
$password = '1234';
$charset = 'UTF8';
$port = 3307;

$dbh = new PDO("mysql:host=$host;dbname=zoo;charset=$charset;port=$port", $user, $password);