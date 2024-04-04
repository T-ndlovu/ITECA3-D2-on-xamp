<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {
        require_once "includes/dbh.inc.php";

        $query = "SELECT * FROM site_data WHERE p_name = :productsearch ";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":productsearch", $productSearch);
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);


        $pdo = null;
        $stmt = null;


    } catch (PDOException $e) {
        die ("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>

</head>

<body>
    <h3>Search result: </h3>

    <?php

    if (empty ($results)) {
        echo "<div>";
        echo "<p> Product name incorrect! </p>";
        echo "</div>";
    } else {
        foreach ($results as $row) {
            echo htmlspecialchars($row["img_url"]);
            echo htmlspecialchars($row["p_name"]);
            echo htmlspecialchars($row["details"]);
            echo htmlspecialchars($row["price"]);
            echo htmlspecialchars($row["stock_amount"]);
        }
    }

    ?>

</body>

</html>