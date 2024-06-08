<?php

// Display single product detail if 'id' parameter is provided
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare('SELECT * FROM product WHERE ProductID = ?');
    $stmt->execute([$_GET['id']]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$product) {
        exit('Product does not exist!');
    }

    $productImageQuery = "SELECT * FROM productimage";
    $productImageStmt = $pdo->prepare($productImageQuery);
    $productImageStmt->execute();
    $productImages = $productImageStmt->fetchAll(PDO::FETCH_ASSOC);

    $imageURLs = array();

    foreach ($productImages as $img) {
        if ($img['ProductID'] === $product['ProductID']) {
            // Add the image URL to the array
            $imageURLs[] = $img['ImageURL'];
        }
    }
    $ImageURL0 = isset($imageURLs[0]) ? $imageURLs[0] : '';
    $ImageURL1 = isset($imageURLs[1]) ? $imageURLs[1] : '';
  
    ?>

    <?= template_header('Product') ?>
    <link rel="stylesheet" href="public/secondary-styles.css" />
    <section class="container">
        <div class="l-side">
            <div class="cont">
                <div class="mySlide">
                    <div class="numbertext">1 / 2</div>
                    <img src="<?= $ImageURL0 ?>" alt="<?= $product['Name'] ?>">
                </div>

                <div class="mySlide">
                    <div class="numbertext">2 / 2</div>
                    <img src="<?= $ImageURL1 ?>" alt="<?= $product['Name'] ?>">
                </div>

              

                <a class="prevv" onclick="plusSlide(-1)">&#10094;</a>
                <a class="nextt" onclick="plusSlide(1)">&#10095;</a>

                <div class="rows">
                    <div class="col">
                        <img class="demo cursor" src="<?= $ImageURL0 ?>" alt="<?= $product['Name'] ?>"
                            onclick="currentS(1)">
                    </div>
                    <div class="col">
                        <img class="demo cursor" src="<?= $ImageURL1 ?>" alt="<?= $product['Name'] ?>" onclick="currentS(2)"
                            a>
                    </div>
                    
                </div>
            </div>
            <section class="description">
                <div class="bar">
                  
                    <button class="bar-btn" onclick="openinfo(event,'Description')">
                        Description
                    </button>
                    <button class="bar-btn" onclick="openinfo(event,'Product Rating')">
                        Product Rating
                    </button>
                    <button class="bar-btn" onclick="openinfo(event,'Returnable')">
                        Returnable
                    </button>
                    <button class="bar-btn btn-comment" style="background-color:#8B939F" onclick="openinfo(event,'Comment')">
                        Comment
                    </button>
                </div>
                <div class="info-section">
                  
                    <div id="Description" class="info" style="display: none">
                        <p>
                            <?= $product['Description'] ?>
                        </p>
                    </div>
                    <div id="Product Rating" class="info">
                        <p>
                            <?= $product['Product Rating'] ?>
                        </p>
                    </div>

                    <div id="Care Instructions" class="info" style="display: none">
                        <p>
                            <?= $product['Returnable'] ?>
                        </p>
                    </div>
                    <div id="Comment" class="info" style="display: none">
                       <form action="includes/comment.inc.php" method="post">
                         <label for="fname">First name:</label>
  <input type="text"        id="fname" name="fname"><br><br>
                        <textarea name="comment" rows="5" cols="35">Enter Your Comment about product</textarea>
                        <br>
                        <input type="submit" value="Submit">
                    </form>
                    </div>
                </div>
            </section>
        </div>

        <div class="r-side">
            <div class="product-content-wrapper">
                <div class="product-details">

                    <h1 class="product-name">
                        <?= $product['Name'] ?>
                    </h1>
                    <p class="product-price">&#82;
                        <?= $product['Price'] ?>
                    </p>

                </div>
                <form class="add-to-cart-form" action="index.php?page=cart" method="post">
                    <input type="number" name="quantity" value="1" min="1" max="<?= $product['Quantity'] ?>" required>
                    <input type="hidden" name="product_id" value="<?= $product['ProductID'] ?>">
                    <button type="submit" class="add-to-cart-button">Add To Cart</button>
                </form>
            </div>
        </div>
    </section>




    <?= template_footer() ?>

<?php } ?>