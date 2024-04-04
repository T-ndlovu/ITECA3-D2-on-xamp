<?php

try {
    require_once 'dbh.inc.php';
    $products = array();
    $query = "SELECT img_url, p_name, details, price  FROM site_data";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $pdo = null;
    $stmt = null;


} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}
