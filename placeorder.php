<?= template_header('Place Order') ?>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sessionId = session_id();
    $subtotal = $_POST['subtotal'];



    //require_once 'includes/payflex.inc.php'; ?>

    <div class="pay-cont">

        <h2 id="pay-heading">Select Payment Method:</h2>


        <div class="row-pay">
            <div class="column-pay" style="background-color:#aaa;">
                <h2 id="pay-title">Payfast:</h2>
                <?php require_once 'includes/payfast.inc.php'; ?>
            </div>
           
    </div>


    </div>
    <h2 class="blue-text">Subtotal: R<?php echo $subtotal ?></h2>



<?php } ?>




<?= template_footer() ?>