<?= template_header('Place Order') ?>
<?php require_once 'includes/login_view.inc.php'?>

<section style="padding-top:40px; padding-bottom:40px; padding-left:20px">
<?php

  if (isset($_SESSION['order_id'])) {
    require_once 'includes/process-order.inc.php';
    $id = $_SESSION['order_id'];

    $sessionId = session_id();
    $subtotal =  $_SESSION['subtotal'];
    ?>

   
  
    <h1>Thank You for Your Order!</h1>

    <h2>Dear: <?php username(); ?></h2>
    <h2>Your Order Number:  <?php echo $id ?> </h2>

    <p>We are delighted to inform you that your order is almost complete. </p>
    <br>
    <p>CLICK PAY NOW. To Get you goodies</p>
    <?php require_once 'includes/payfast.inc.php'; ?>
  
    <h2 class="blue-text">Subtotal: R<?php echo $subtotal ?></h2>
        <?php  }else{
            echo 'There is no products in your cart.  Go buy what you like.';
        }?>

</section>




<?= template_footer() ?>