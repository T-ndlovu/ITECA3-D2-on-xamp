<?php

require_once "includes/dbh.inc.php";
require_once "includes/products.inc.php";


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <title>Sleep Better</title>
  <link rel="stylesheet" href="styles/styles.css">
  <link rel="stylesheet" href="styles/cart.css">
  <script src="js_code/store.js" async></script>
</head>
<header>
  <nav>
    <div class="searchbox"><input type="text" placeholder="Search product.. " style="width: auto; height: auto;"></div>
    <div class="groupnav-button">
      <a href="templates/cart.html"><button class="navbutton1"><svg xmlns="http://www.w3.org/2000/svg" width="16"
            height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
            <path
              d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0" />
          </svg></button></a>
      <a href="index.php"><button class="navbutton2">Sign out</button></a>
  </nav>
  </div>
</header>

<body>

  <main>
    <h1 style="color: black; margin-top: 40px;">How to Pick the Right Mouth Tape</h1>
    <div class="parent2">
      <div class="child2">
        <h3>Look for "Hypoallergenic"</h3>
        <p style="text-align: justify;">Certain adhesives can irritate the skin. Seeking out a tape that's made from a
          hypoallergenic material is one easy way to help minimize this likelihood, especially one that's medical grade.
        </p>
      </div>

      <div class="child2">
        <h3>Ensure the Tape Is Porous</h3>
        <p style="text-align: justify;">According to both experts we spoke with, this is a key quality to look for; the
          tape itself should be breathable, even though it is keeping your mouth sealed.</p>
      </div>

      <div class="child2">
        <h3>Easy to Remove</h3>
        <p style="text-align: justify;">The mouth tape should be easy to remove, allowing the lips to part easily if
          there is any obstruction to normal airflow with the mouth closed,” advises Dr. Lim. Plus, you also don’t want
          it to feel like you’re ripping the skin off when you remove it in the morning.</p>
      </div>


      <hr style="height:2px;border-width:0;background-color:rgb(131, 123, 123); margin-bottom: 2%;">

      <section class="container content-section">
        <h2 class="section-header">Products:</h2>
        <?php foreach ($products as $product): ?>
          <div class="shop-items">
            <div class="shop-item">
              <span class="shop-item-title">
                <?php echo $product['p_name']; ?>
              </span>
              <img class="shop-item-image " src=<?php echo $product['img_url']; ?>>
              <div class="shop-item-details">
                <span class="shop-item-price">
                  <?php echo $product['price']; ?>
                </span>
                <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

      </section>

      <section class="container content-section">
        <h2 class="section-header">CART</h2>
        <div class="cart-row">
          <span class="cart-item cart-header cart-column">ITEM</span>
          <span class="cart-price cart-header cart-column">PRICE</span>
          <span class="cart-quantity cart-header cart-column">QUANTITY</span>
        </div>
        <div class="cart-items">
        </div>
        <div class="cart-total">
          <strong class="cart-total-title">Total</strong>
          <span class="cart-total-price">R0</span>
        </div>
        <button class="btn btn-primary btn-purchase" type="button">PURCHASE</button>
      </section>


  </main>


  <h2 style="color: black; text-align: center; margin-top: 6%;">Customer Engagement</h2>

  <h2 style="color:black; margin-top: 30px;">Did we meet your standards?</h2>
  <h3 style="color:blue; text-align:center; margin-bottom:50px"><a href="templates/write_review.html"> Write a review
      on our sevice </a></h3>

</body>
<footer>
  <div style="margin: 1%;">
    <a id="tags" style="color:white;"> Home </a>
    <a id="tags" style="color:white;"> About Us </a>
    <a id="tags" style="color:white;"> Contact Us </a>
    <hr style="height:1px;border-width:0;background-color:rgb(255, 255, 255)">
    <a style="font-size: small;">© 2024 Sleep Better, Inc</a>
  </div>

</footer>

</html>