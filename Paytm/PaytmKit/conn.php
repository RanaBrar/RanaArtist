<?php

$host = 'localhost';
$uname = 'id13686489_rana';
$pass = 'YmdDJfES]F9h(JUt';
$dbname = 'id13686489_printing';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $uname, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection Faild";
}
