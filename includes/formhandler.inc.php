<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["name"];
    $email = $_POST["email"];
    $pwd = $_POST["password"];

    try {
        require_once "dbh.inc.php";

        $query = "INSERT INTO users (username, email, pwd) VALUES(:username, :pwd, :email);";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":pwd", $pwd);


        $stmt->execute();


        $pdo = null;
        $stmt = null;

        header("Location: ../homepage.php");

        die();
    } catch (PDOException $e) {
        die ("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
}