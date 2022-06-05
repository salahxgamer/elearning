<?php include 'core/isLogged.php' ?>
<?php include "components/head.php" ?>
<?php

$user->updateInfo();

if (isset($_POST["updateUserSettings"])) {
    $new_data = [
        "username" => $_POST["username"],
        "email" => $_POST["email"],
        "nom" => $_POST["nom"],
        "prenom" => $_POST["prenom"]
    ];
    $user->update($new_data);
} elseif (isset($_POST["updateContactSettings"])) {

    $new_data = [
        "address" => $_POST["address"],
        "telephone" => $_POST["telephone"],
        "dateNais" => $_POST["dateNais"],
    ];
    $user->update($new_data);
} elseif (isset($_POST["updateBlogSettings"])) {

    $new_data = [
        "signature" => $_POST["signature"],
    ];
    $user->update($new_data);
} elseif (isset($_POST["updateProfilePhoto"])) {
    console_log($_FILES);
    if (isset($_FILES['profileImage']))
        if ($_FILES["profileImage"]["size"] < 64000)
            if (
                $_FILES['profileImage']['type'] === "image/jpg" || $_FILES['profileImage']['type'] === "image/png"
                || $_FILES['profileImage']['type'] === "image/jpeg" || $_FILES['profileImage']['type'] === "image/gif"
            ) {
                $profileImage = file_get_contents($_FILES['profileImage']['tmp_name']);
                $profileImage = base64_encode($profileImage);


                $new_data = [
                    "profileImage" => $profileImage,
                ];
                $user->update($new_data);
            }
}


?>

<body id="page-top">
    <?php console_log($user->userInfo); ?>

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
                    <h3 class="text-dark mb-4">Profile</h3>
                    <div class="row mb-3">
                        <div class="col-lg-4">

                            <!-- Profile picture -->
                            <div class="card mb-3">
                                <div class="card-body text-center shadow">
                                    <img class="rounded-circle mb-3 mt-4" src="<?= $user->get_profile_image_src() ?>" width="160" height="160">
                                    <form class="mb-3" method="POST" enctype="multipart/form-data" action="profile.php">
                                        <input class="form-control mb-3" type="file" name="profileImage">
                                        <button class="btn btn-primary btn-sm" type="submit" name="updateProfilePhoto">Change Photo</button>
                                    </form>
                                </div>
                            </div>
                            <!-- /Profile picture -->

                            <!-- Progress -->
                            <?php include "components/dashboard_progress.php" ?>

                        </div>
                        <div class="col-lg-8">
                            <div class="row mb-3">
                                <!-- stats -->
                                <?php include "components/profile_stats.php" ?>
                            </div>
                            <div class="row">
                                <div class="col">

                                    <!-- User Settings -->
                                    <?php include "components/profile_usersettings.php" ?>

                                    <!-- User Settings -->
                                    <?php include "components/profile_contactsettings.php" ?>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Blog Settings -->
                    <?php include "components/profile_blogsettings.php" ?>

                </div>
            </div>


            <?php include 'components/footer.php' ?>


        </div>
        <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
</body>