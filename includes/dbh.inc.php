<?php
//database connection 

$dsn = "mysql:host=102.222.124.12; dbname=sleepvsz_studytemp";//provide hostname and dbname
$dbusername = "sleepvsz_sleepvsz";//own username
$dbpassword = "Studytemp12";//add my own myadmin password

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed" . $e->getMessage();
}