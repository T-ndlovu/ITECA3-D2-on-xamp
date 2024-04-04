<?php

try {
  require_once "includes/dbh.inc.php";

  $query = "SELECT * FROM comments";

  $stmt = $pdo->prepare($query);

  $stmt->execute();


  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $pdo = null;
  $stmt = null;


} catch (PDOException $e) {
  die("Query failed: " . $e->getMessage());
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sleep Better</title>
  <link rel="stylesheet" href="styles/styles.css">
</head>
<header>
  <nav>
    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-moon-stars"
      viewBox="0 0 16 16">
      <path
        d="M6 .278a.77.77 0 0 1 .08.858 7.2 7.2 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277q.792-.001 1.533-.16a.79.79 0 0 1 .81.316.73.73 0 0 1-.031.893A8.35 8.35 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.75.75 0 0 1 6 .278M4.858 1.311A7.27 7.27 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.32 7.32 0 0 0 5.205-2.162q-.506.063-1.029.063c-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286" />
      <path
        d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.73 1.73 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.73 1.73 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.73 1.73 0 0 0 1.097-1.097zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.16 1.16 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.16 1.16 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732z" />
    </svg>
    sleep better.

    <!--search.php-->
    <form class="searchbox" action="homepage.php" method="post">
      <input type="text" name="productsearch" placeholder="Search product.. " style="width: 350px; height:16px;">
      <button class='navbutton2'>Search</button>
    </form>
    <div class="groupnav-button">
      <a href="templates/login.html"><button class="navbutton1">Log In</button></a>
      <a href="templates/signup.html"><button class="navbutton2">Sign up</button></a>
    </div>

  </nav>

</header>

<body>
  <main>
    <div class="parent">
      <h1 style="color:black">Our Top Picks:</h1>
      <div class="child"><img src="img/myotape-sleep-strips-63218489e86c4c7daef135f033e348f1.webp" class="images">
        <p class="imgtext">Best Tape Alternative <br>MyoTape Sleep Strips</p>
      </div>
      <div class="child"><img src="img/somnifix-mouth-tape-strips-f21227611e2a4fe19604c77c6f0ed4cf.webp" class="images">
        <p class="imgtext">Best Strips SomniFix <br>Mouth Tape & Strips</p>
      </div>
      <div class="child"><img src="img/vio2-mouth-tape-875d6d81ba904e2fb414de9b2440771a.webp" class="images">
        <p class="imgtext">Best for Versatility <br>VIO2 Mouth Tape</p>
      </div>
    </div>

    <div class="container1">

      <div class="child1">
        <h2>Who Are We?</h2>
        <p style="text-align: justify;">Sleep Better Inc. is a well-established local enterprise that was established in
          2015 by Lesedi Molemi, the founder and chief operating officer. The company is dedicated to enhancing the
          quality of sleep for its clientele and specializes in the provision of various innovative mouth strips. The
          company offers a simple solution tailored to addressing the challenges of sleep disturbance. Currently
          situated in Pretoria.</p>
      </div>
      <div>
        <div class="child1">
          <img src="img/nexcare-sensitive-skin-tape-efc3596852194f9b8c47eb436e080e47.webp" height="150"><br>
          <img src="img/Screenshot 2024-03-06 110059.png" width="300">
        </div>
      </div>
    </div>

    <h3 style="color: black; text-align: center; margin-top: 6%;">Customer Engagement</h3>
    <hr style="height:2px;border-width:0;background-color:rgb(0, 0, 0); margin-bottom: 2%;">
    <div class="parent2">
      <div class="child2">

        <!-- Didi please add random generator for numbers between 0-5-->

        <h4>
          <?php echo $results[0]['username']; ?>
        </h4>
        <h5>Service rating:
          <?php echo $results[0]['rating']; ?>
        </h5><br>
        <?php echo $results[0]['comment_txt']; ?>
      </div>
      <div class="child2">
        <h4>
          <?php echo $results[1]['username']; ?>
        </h4>
        <h5>Service rating:
          <?php echo $results[1]['rating']; ?>
        </h5><br>
        <?php echo $results[1]['comment_txt']; ?>
      </div>
    </div>



  </main>

  <script src="js_code/script.js"></script>
</body>
<footer>
  <div style="margin: 2%;">
    <a id="tags" style="color:white;"> Home </a>
    <a id="tags" style="color:white;"> Our Services </a>
    <a id="tags" style="color:white;"> Contact Us </a>
    <hr style="height:1px;border-width:0;background-color:rgb(255, 255, 255)">
    <a style="font-size: small;">© 2024 Sleep Better, Inc</a>
  </div>

</footer>

</html>