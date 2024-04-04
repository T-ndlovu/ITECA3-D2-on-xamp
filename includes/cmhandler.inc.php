<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST["fname"];
    $comment = $_POST["comment"];
    $rate = $_POST["rate"];

    try {
        require_once "dbh.inc.php";

        $query = "INSERT INTO comments (username, comment_txt, rating) VALUES(:fname, :comment, :rate);";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":fname", $fname);
        $stmt->bindParam(":comment", $comment);
        $stmt->bindParam(":rate", $rate);


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