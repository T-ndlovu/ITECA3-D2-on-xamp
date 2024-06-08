<?= template_header('Place Order') ?>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sessionId = session_id();
    $subtotal = $_POST['subtotal'];



    //require_once 'includes/payflex.inc.php'; ?>

    <?php require_once 'includes/payfast.inc.php'; ?>
  
    <h2 class="blue-text">Subtotal: R<?php echo $subtotal ?></h2>



<?php } ?>




<?= template_footer() ?>