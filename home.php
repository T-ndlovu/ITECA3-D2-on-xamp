
<?php
 require_once "includes/dbh.inc.php";

// Fetch products from the database
$sql_products = "SELECT * FROM product";
$stmt = $pdo->prepare($sql_products);
$stmt->execute();

$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

//fetch comments
$sql_select = "SELECT * FROM `comments`";
$stmt_select = $pdo->prepare($sql_select);
$stmt_select->execute();

$comments = $stmt_select->fetchAll(PDO::FETCH_ASSOC);



?>


<?= template_header('Home') ?>

<!--Top Picks -->
<section class="p-20 w-full max-w-screen-1xl mx-auto">
    <h1 class="text-4xl text-center">Our Top Picks</h1>
    <div class="flex flex-wrap justify-center mt-3 md:space-x-4">
        <?php
        if ($stmt->rowCount() > 0) {
            $count = 0;  // Initialize a counter
            foreach ($products as $product) {
                if ($count >= 3) break;  // Break the loop after displaying 3 products
                // Fetch the first image for each product
                $sql_image = "SELECT * FROM productimage WHERE ProductID = :product_id LIMIT 1";
                $stmt_image = $pdo->prepare($sql_image);
                $stmt_image->execute(['product_id' => $product['ProductID']]);
                $productImage = $stmt_image->fetch(PDO::FETCH_ASSOC);
                ?>
                <a href="index.php?page=product&id=<?= $product['ProductID'] ?>" class="mb-4">
                    <div class="space-y-1 top-picks-image">
                        <div class="relative overflow-hidden">
                            <img src="<?= $productImage['ImageURL'] ?>" width="180" height="180" alt="<?= $product['Name'] ?>">
                        </div>
                        <p class="font-light text-gray-500">
                            <?= $product['Name'] ?>
                        </p>
                        <p class="font-semibold">&#82;
                            <?= $product['Price'] ?>
                        </p>
         <!-- Hero -->           </div>
                </a>
                <?php
                $count++; 
            }
        } else {
            echo "<div class='col-md-12'><p>Product Does not exist</p></div>";
        }
        ?>
    </div>
</section>


<section class="bg-custom-orange pb-24 mt-4 flex justify-center w-full sm:p-24">
    <div class="mx-auto flex flex-col lg:flex-row-reverse lg:items-center">
        <img src="public/images/hero.webp" alt="Hero image"
            class="aspect-5/4 w-full object-fit lg:w-[650px] lg:h-[500px] lg:ml-[-200px]" />
        <div class="max-w-md z-10 text-center mt-[-30px] lg:mt-0 lg:text-left">
            <h1 class="text-5xl font-bold">Who Are We?</h1>
            <p class="mb-12">
            Sleep Better Inc. is a well-established local enterprise that was established in 2015 by Lesedi Molemi, the founder and chief operating officer. 
            The company is dedicated to enhancing the quality of sleep for its clientele and specializes in the provision of various innovative mouth strips. 
            The company offers a simple solution tailored to addressing the challenges of sleep disturbance. Currently situated in Pretoria.</p>
            <?php if (!isset($_SESSION['user_id'])) { ?>
            <a class="bg-black rounded-full text-white text-center py-2 px-3" href="index.php?page=signup">
                Sign In
            </a>
            <?php }?>
        </div>
    </div>
</section>
<!-- Slides -->
  
<section class="promoslide max-w-screen-2xl mx-auto">
    <h1 class="text-4xl text-center" style="margin-top:40px">Customer Engagement</h1>
    <div class="slideshow-container">
        <?php
        // Initialize slide number
        $slideNumber = 1;

        // Define the number of slides
        $totalSlides = count($comments);

        foreach ($comments as $comment) { ?>
            <div class="mySlides fade">
                <div class="numbertext"><?= $slideNumber . " / " . $totalSlides ?></div>
                <div style="width: 100%; height: 200px; background-color: #D9D9D9;">
                    <div class="text">
                        <h1 class="slider-h1"><?php echo htmlspecialchars($comment['user']); ?></h1>
                        <p class="slider-p"><?php echo htmlspecialchars($comment['comment']); ?></p>
                    </div>
                </div>
            </div>
            <?php
            $slideNumber++;
        } ?>
        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br />

    <!-- The dots/circles -->
    <div style="text-align: center">
        <?php for ($i = 1; $i <= $totalSlides; $i++) { ?>
            <span class="dot" onclick="currentSlide(<?= $i ?>)"></span>
        <?php } ?>
    </div>
</section>







<!-- About Us -->
<section class="p-24 w-full bg-custom-orange" style="margin-bottom:20px">
    <div class="mx-auto max-w-screen-2xl md:flex md:space-x-12 md:justify-center md:items-center">
        <h1 class="font-semibold text-4xl">About Us</h1>
        <p class="mt-4 max-w-2xl md:mt-0">
          Sleep Better LLC is a thriving community-focused venture.
          At Sleep Better, we're committed to revolutionizing the sleep experience for our customers. 
          Specializing in cutting-edge sleep technology, we offer a diverse range of innovative sleep aids 
          tailored to individual needs.
            <br /><br />
            Our mission is simple: to tackle the complexities of sleep disruption head-on. From personalized consultations to state-of-the-art mouth strips,
            we provide holistic solutions that empower our clients to achieve restful, rejuvenating sleep. With a relentless focus on research and development,
            we stay at the forefront of sleep science, ensuring that our products deliver unparalleled effectiveness and comfort.

            
        </p>
    </div>
</section>

<?= template_footer() ?>