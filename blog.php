<?php
require_once "core/config.php";


if (isset($_GET["filterByCategory"]) && !empty($_GET["filterByCategory"]))
  $articles = $article->get_by_category($_GET["filterByCategory"]);
else
  $articles = $article->get_all();
$categories = $article->get_categories();


?>


<!doctype html>
<html lang="en">

<head>
  <title>Tutor &mdash; Free Website Template by Colorlib</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="fonts/brand/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/aos.css">

  <!-- MAIN CSS -->
  <link rel="stylesheet" href="css/style.css">

</head>

<body>


  <div class="site-wrap" id="home-section">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar light site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center position-relative">

          <div class="col-3">
            <div class="site-logo">
              <a href="index.php"><strong>Tutor</strong></a>
            </div>
          </div>

          <div class="col-9  text-right">

            <span class="d-inline-block d-lg-none"><a href="#" class=" site-menu-toggle js-menu-toggle py-5 "><span class="icon-menu h3 text-black"></span></a></span>

            <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
              <ul class="site-menu main-menu js-clone-nav ml-auto ">
                <li><a href="index.php" class="nav-link">Home</a></li>
                <li><a href="tutorials.php" class="nav-link">Tutorials</a></li>
                <li><a href="testimonials.php" class="nav-link">Testimonials</a></li>
                <li class="active"><a href="blog.php" class="nav-link">Blog</a></li>
                <li><a href="about.php" class="nav-link">About</a></li>
                <li><a href="contact.php" class="nav-link">Contact</a></li>
                <li><a href="dashboard.php" class="nav-link">Dashboard</a></li>
              </ul>
            </nav>
          </div>


        </div>
      </div>

    </header>


    <div class="site-section-cover overlay" style="background-image: url('images/hero_bg.jpg');">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-lg-10 text-center">
            <h1><strong>Blog Posts</strong></h1>
          </div>
        </div>
      </div>
    </div>




    <div class="site-section bg-light">
      <div class="container">
        <div class="row">

          <form class="col-12 p-2 d-flex flex-wrap">

            <button name="filterByCategory" value="" class="btn text-white my-2 mx-2 btn-danger">
              Clear
            </button>

            <?php foreach ($categories as $category) : ?>

              <button name="filterByCategory" value="<?= $category['category_id'] ?>" class="btn text-white my-2 mx-2" style="background-color:<?= $category['category_color'] ?>">
                <?= $category['category_name'] ?>
              </button>

            <?php endforeach ?>

          </form>

          <?php foreach ($articles as $article) : ?>
            <div class="col-sm-2 col-md-4 p-2">
              <div class="card h-100">
                <img src="assets/img/article/<?= $article['article_image'] ?>" class="card-img-top" alt="..." height="200">
                <div class="card-body d-flex flex-column justify-content-between">
                  <h5 class="card-title"><?= $article['article_title'] ?></h5>
                  <p class="card-text">
                    <?= strip_tags(substr($article['article_content'], 0, 200)) ?>...
                  </p>
                  <a href="single.php?id=<?= $article['article_id'] ?>" class="card_link">Read More</a>
                </div>
                <form class="card-footer m-0">
                  <span class="text-muted"><?= date_format(date_create($article['article_created_time']), "F d, Y ") ?></span>
                  <button name="filterByCategory" value="<?= $article['category_id'] ?>" class="btn badge text-white" style="background-color:<?= $article['category_color'] ?>">
                    <?= $article['category_name'] ?>
                  </button>
                </form>
              </div>
            </div>


          <?php endforeach ?>

        </div>

        <div class="row">
          <div class="col-5">
            <div class="custom-pagination">
              <a href="#">1</a>
              <span>2</span>
              <a href="#">3</a>
              <a href="#">4</a>
              <a href="#">5</a>
            </div>
          </div>
        </div>

      </div>
    </div>
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <h2 class="footer-heading mb-4">About Us</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
            <ul class="list-unstyled social">
              <li><a href="#"><span class="icon-facebook"></span></a></li>
              <li><a href="#"><span class="icon-instagram"></span></a></li>
              <li><a href="#"><span class="icon-twitter"></span></a></li>
              <li><a href="#"><span class="icon-linkedin"></span></a></li>
            </ul>
          </div>
          <div class="col-lg-8 ml-auto">
            <div class="row">
              <div class="col-lg-3">
                <h2 class="footer-heading mb-4">Quick Links</h2>
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Testimonials</a></li>
                  <li><a href="#">Terms of Service</a></li>
                  <li><a href="#">Privacy</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div>
              <div class="col-lg-3">
                <h2 class="footer-heading mb-4">Resources</h2>
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Testimonials</a></li>
                  <li><a href="#">Terms of Service</a></li>
                  <li><a href="#">Privacy</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div>
              <div class="col-lg-3">
                <h2 class="footer-heading mb-4">Support</h2>
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Testimonials</a></li>
                  <li><a href="#">Terms of Service</a></li>
                  <li><a href="#">Privacy</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div>
              <div class="col-lg-3">
                <h2 class="footer-heading mb-4">Company</h2>
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Testimonials</a></li>
                  <li><a href="#">Terms of Service</a></li>
                  <li><a href="#">Privacy</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
              <p>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>
                  document.write(new Date().getFullYear());
                </script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </p>
            </div>
          </div>

        </div>
      </div>
    </footer>

  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>

</body>

</html>