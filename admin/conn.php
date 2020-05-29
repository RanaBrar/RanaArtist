<?php

$host = 'localhost';
$uname = 'root';
$pass = '';
$dbname = 'id13686489_printing';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $uname, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection Faild";
}
