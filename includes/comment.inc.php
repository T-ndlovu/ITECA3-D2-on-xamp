<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     require_once 'dbh.inc.php';
        $user = $_POST['fname'];
        $comment = $_POST['comment'];

        $sql = "INSERT INTO `comments` (user, comment) VALUES (:user, :comment)";
        $stmt = $pdo->prepare($sql);
       
        $stmt->bindParam(':user', $user);
        $stmt->bindParam(':comment', $comment);
        $stmt->execute();
        header("Location: ../index.php?page=products");
}