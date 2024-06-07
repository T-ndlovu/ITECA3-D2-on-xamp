<?php
//database connection 

$dsn = "mysql:host=localhost; dbname=studytemp";//provide hostname and dbname
$dbusername = "root";//own username
$dbpassword = "";//add my own myadmin password

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed" . $e->getMessage();
}