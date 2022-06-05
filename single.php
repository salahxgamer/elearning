<?php
require_once "core/config.php";

if (!isset($_GET["id"]) || empty($_GET["id"])) {
  header("location: blog.php");
  exit();
}

if (isset($_POST["commentContent"]) && !empty($_POST["commentContent"])) {
  $data = [
    "comment_content" => $_POST["commentContent"],
    "id_user" => $user->userInfo->id,
    "id_article" => $_GET["id"],
  ];
  $article->add_comment($data);
}


$currArticle = $article->get_article($_GET["id"]);
$comments = $article->get_comments($_GET["id"]);
console_log($comments);

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
            <h1><strong><?= $currArticle['article_title'] ?></strong></h1>
            <div class="pb-4 get">
              <strong class="text-white">
                Posted on <?= date_format(date_create($currArticle['article_created_time']), "F d, Y ") ?>
                &bullet; <?= $currArticle['author_fullname'] ?>
              </strong>
            </div>

          </div>
        </div>
      </div>
    </div>




    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-8 blog-content">

            <div class="content">

              <?= $currArticle["article_content"] ?>

            </div>

            <hr>
            <form action="blog.php" class="mt-4 bt-4">
              <span class="text-muted"><?= date_format(date_create($currArticle['article_created_time']), "F d, Y ") ?></span>
              <button name="filterByCategory" value="<?= $currArticle['category_id'] ?>" class="btn badge text-white" style="background-color:<?= $currArticle['category_color'] ?>">
                <?= $currArticle['category_name'] ?>
              </button>
            </form>


            <div class="pt-5">
              <h3 class="mb-5">Comments</h3>
              <ul class="comment-list">

                <?php foreach ($comments as $comment) : ?>

                  <li class="comment">
                    <div class="vcard bio">
                      <img src="<?= $user->get_profile_image_src($comment['username']) ?>" alt="Free Website Template by Free-Template.co">
                    </div>
                    <div class="comment-body">
                      <h3><?= $comment['username'] ?></h3>
                      <div class="meta"><?= $comment['comment_date'] ?></div>
                      <p><?= $comment['comment_content'] ?></p>
                      <p><a href="#" class="reply">like</a></p>
                    </div>
                  </li>

                <?php endforeach ?>

              </ul>

              <!-- END comment-list -->

              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Leave a comment</h3>
                <form method="POST" class="">

                  <div class="form-group">
                    <label for="commentContent">Comment</label>
                    <textarea name="commentContent" id="commentContent" rows="4" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <button type="submit" name="postComment" class="btn btn-primary btn-md text-white">
                      Post comment
                    </button>
                  </div>

                </form>
              </div>
            </div>

          </div>
          <div class="col-md-4 sidebar">
            <div class="sidebar-box">
              <form action="#" class="search-form">
                <div class="form-group">
                  <span class="icon fa fa-search"></span>
                  <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                </div>
              </form>
            </div>

            <!-- AUTHOR INFORMATION -->
            <div class="sidebar-box">
              <img src="assets/img/avatar/<?= $currArticle['author_avatar'] ?>" alt="" class="img-fluid mb-4 w-50 rounded-circle">
              <h3 class="text-black"><?= $currArticle['author_fullname'] ?></h3>
              <p><?= $currArticle['author_desc'] ?></p>
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