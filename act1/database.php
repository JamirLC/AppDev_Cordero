<?php
$host = "localhost";
$dbname = "products";
$username = "root";
$password = "";

try {
    $con = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
} catch (PDOException $exeception) {
    echo "Connection failed: " . $exeception->getMessage();
}
