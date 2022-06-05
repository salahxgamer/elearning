<?php include 'core/isLogged.php' ?>
<?php include "components/head.php" ?>
<?php

// CODE



$testimonials = $testimonial->get_all();

if ($_POST) {
    if (isset($_POST['addTestimonial'])) {
        if (!empty($_POST['rating']) && !empty($_POST['testimonialContent'])) {
            $data = [
                "testimonial_content" => $_POST["testimonialContent"],
                "testimonial_rating" => $_POST["rating"],
                "testimonial_user" => $user->userInfo->id,
            ];
            $testimonial->add_testimonial($data);
        } else {
            die("ERROR: Invalid/Empty inputs !");
        }
    } elseif (isset($_POST['deleteTestimonial'])) {
        if (!empty($_POST['testimonialId'])) {
            $testimonial->delete_testimonial($_POST['testimonialId']);
        } else {
            die("ERROR: Invalid/Empty inputs !");
        }
    }
    header("location: testimonial.php");
    exit();
}

?>

<body id="page-top">

    <!-- Header -->
    <?php include "components/header.php" ?>
    <!-- </Header> -->

    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'components/sidebar.php' ?>

        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">

                <!-- Dashboard Navbar -->
                <?php include 'components/dashboard_navbar.php' ?>

                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Users testimonials</h3>
                    <div class="row mb-3">
                        <div class="container mt-5">

                            <!-- CONTENT -->
                            <div class="row">

                                <!-- Add new testimonial Card -->
                                <div class="col col-xs-12 col-sm-12 col-lg-6 col-xl-4 mt-4 d-flex">
                                    <div class="card shadow p-3 m-2 col">
                                        <div class="d-flex flex-row mb-3">
                                            <form action="testimonial.php" method="POST" class="d-flex flex-column ms-2 col" oninput="ratingDisplay.value=parseInt(rating.value)">
                                                <div class="mb-3">
                                                    <label for="rating" class="form-label">
                                                        Rate us :
                                                        <output for="rating" id="ratingDisplay" class="">Drag the handle below</output>
                                                    </label>
                                                    <input type="range" class="form-range" min="0" max="10" id="rating" name="rating" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="testimonialContent" class="form-label">Your Opinion :</label>
                                                    <textarea class="form-control" id="testimonialContent" name="testimonialContent" rows="3" maxlength="1000" minlength="5" placeholder="Write something cool about us :)" required></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <button class="form-control btn-primary" type="submit" name="addTestimonial"> Publish</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <?php foreach ($testimonials as $testimon) : ?>

                                    <!-- Testimonial displaying card -->
                                    <div class="col col-xs-12 col-sm-12 col-lg-6 col-xl-4 mt-4 d-flex">
                                        <div class="card shadow p-3 m-2 col">
                                            <div class="d-flex flex-row mb-3">
                                                <img class="rounded-circle" src="<?= $testimonial->get_img_src($testimon) ?>" width="70">
                                                <div class="d-flex flex-column ms-2">
                                                    <!-- User full name: prenom + nom -->
                                                    <span><?= $testimon['testimonial_user_prenom'] . ' ' . $testimon['testimonial_user_nom'] ?></span>
                                                    <!-- User username -->
                                                    <span class="text-black-50"><?= $testimon['testimonial_user_username'] ?></span>
                                                    <span class="rating">
                                                        <!-- Ceiling, Flooring is used to calculate a 1/5 value of a 1/10 value to represent with stars -->
                                                        <?= str_repeat('<i class="fa fa-star text-warning"></i>', ceil($testimon['testimonial_rating'] / 2)) ?>
                                                        <?= str_repeat('<i class="fa fa-star text-seconary"></i>', floor(10 - $testimon['testimonial_rating']) / 2) ?>
                                                        &nbsp;<?= $testimon['testimonial_rating'] ?>/10
                                                    </span>
                                                </div>
                                            </div>
                                            <h6><?= $testimon['testimonial_content'] ?></h6>
                                            <form action="testimonial.php" method="POST" class="d-flex justify-content-between align-items-end mt-auto">
                                                <span><?= $testimon['created_at'] ?></span>
                                                <?php if ($testimon['testimonial_user_username'] == $user->get_username()) : ?>
                                                    <input type="hidden" name="testimonialId" value="<?= $testimon['testimonial_id'] ?>">
                                                    <button class="btn text-danger" name="deleteTestimonial">Delete&nbsp;<i class="fa fa-trash"></i></button>
                                                <?php endif ?>
                                            </form>
                                        </div>
                                    </div>

                                <?php endforeach ?>

                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <?php include 'components/footer.php' ?>


        </div>
        <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
</body>