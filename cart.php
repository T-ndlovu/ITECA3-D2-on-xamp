<?php

// If the user clicked the add to cart button on the product page we can check for the form data
if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {
    // Set the post variables so we easily identify them, also make sure they are integer
    $product_id = (int) $_POST['product_id'];
    $quantity = (int) $_POST['quantity'];

    $stmt = $pdo->prepare('SELECT * FROM product WHERE ProductID = ?');
    $stmt->execute([$_POST['product_id']]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product && $quantity > 0) {
        // Product exists in database, now we can create/update the session variable for the cart
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            if (array_key_exists($product_id, $_SESSION['cart'])) {
                // Product exists in cart so just update the quanity
                $_SESSION['cart'][$product_id] += $quantity;
            } else {

                $_SESSION['cart'][$product_id] = $quantity;
            }
        } else {

            $_SESSION['cart'] = array($product_id => $quantity);
        }
    }

    header('location: index.php?page=cart');
    exit;
}
if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
    // Remove the product from the shopping cart
    unset($_SESSION['cart'][$_GET['remove']]);
}

if (isset($_POST['update']) && isset($_SESSION['cart'])) {
    // Loop through the post data so we can update the quantities for every product in cart
    foreach ($_POST as $k => $v) {
        if (strpos($k, 'quantity') !== false && is_numeric($v)) {
            $id = str_replace('quantity-', '', $k);
            $quantity = (int) $v;

            if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantity > 0) {

                $_SESSION['cart'][$id] = $quantity;
            }
        }
    }

    header('location: index.php?page=cart');
    exit;
}

if (isset($_POST['final']) ) {
    header('location: index.php?page=placeorder');
}

$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$products = array();
$subtotal = 0.00;

if ($products_in_cart) {
    // There are products in the cart so we need to select those products from the database
    // Products in cart array to question mark string array, we need the SQL statement to include IN (?,?,?,...etc)
    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
    $stmt = $pdo->prepare('SELECT * FROM product WHERE ProductID IN (' . $array_to_question_marks . ')');
    // We only need the array keys, not the values, the keys are the id's of the products
    $stmt->execute(array_keys($products_in_cart));
    // Fetch the products from the database and return the result as an Array
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Calculate the subtotal
    foreach ($products as $product) {
        $subtotal += (float) $product['Price'] * (int) $products_in_cart[$product['ProductID']];
    }
}
?>

<?= template_header('Cart') ?>


<section class="product-container">
    <div class="cart content-wrapper">
        <h1>Shopping Cart</h1>
        <form action="index.php?page=cart" method="post">
            <table>
                <thead>
                    <tr>
                        <td colspan="2">Product</td>
                        <td>Price</td>
                        <td>Quantity</td>
                        <td>Total</td>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($products)): ?>
                        <tr>
                            <td colspan="5" style="text-align:center;">You have no products added in your Shopping
                                Cart
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td class="img">
                                    <a href="index.php?page=product&id=<?= $product['ProductID'] ?>">
                                        <?php
                                        $productImageQuery = "SELECT * FROM productimage";
                                        $productImageStmt = $pdo->prepare($productImageQuery);
                                        $productImageStmt->execute();
                                        $productImages = $productImageStmt->fetchAll(PDO::FETCH_ASSOC);

                                        $imageURL = '';
                                        foreach ($productImages as $img) {
                                            if ($img['ProductID'] === $product['ProductID']) {
                                                $imageURL = $img['ImageURL'];
                                                break;
                                            }
                                        }
                                        ?>
                                        <img src="<?= $imageURL ?>" width="50" height="50" alt="<?= $product['Name'] ?>">
                                    </a>
                                </td>
                                <td>
                                    <a href="index.php?page=product&id=<?= $product['ProductID'] ?>">
                                        <?= $product['Name'] ?>
                                    </a>
                                    <br>
                                    <a href="index.php?page=cart&remove=<?= $product['ProductID'] ?>" class="remove">Remove</a>
                                </td>
                                <td class="price">&#82;
                                    <?= $product['Price'] ?>
                                </td>
                                <td class="quantity">
                                    <input type="number" name="quantity-<?= $product['ProductID'] ?>"
                                        value="<?= $products_in_cart[$product['ProductID']] ?>" min="1"
                                        max="<?= $product['Quantity'] ?>" placeholder="Quantity" required>
                                </td>
                                <td class="price">
                                    <?= $product['Price'] * $products_in_cart[$product['ProductID']] ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    <?php endif; ?>
                </tbody>
            </table>

            <div class="price-info"><span class="subtotal">Subtotal:</span>
                <span class="price">&#82;
                    <?= $subtotal ?>
                </span>

            </div>
            <?php $sessionId = session_id(); ?>
            <div class="buttons">
                <input type="submit" value="Update" name="update">
            </div>
        </form>

        <form method="post">
            <?php require_once 'includes/process-order.inc.php';?>
             <div class="checkout-button">
                <?php if (isset($_SESSION['user_id'])) { ?>
                    <input type="submit" value="Check Out" name="final">
                <?php } ?>
            </div>
        </form>
       
    </div>
    



  


 
</section>

<?= template_footer() ?>