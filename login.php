<?php include "components/head.php"; ?>
<?php

require_once "core/config.php";


// Check if the user is already logged in, if yes then redirect him to welcome page
if ($user->is_logged()) {
    header("location: profile.php");
    exit;
}


// Processing form data when form is submitted
if ($_POST) {
    $user->login(
        trim($_POST["username"]),
        trim($_POST["password"]),
        isset($_POST["remember"]) && $_POST["remember"]
    );
}

?>


<body class="d-flex flex-column min-vh-100">

    <!-- Header -->
    <?php include "components/header.php" ?>
    <!-- </Header> -->

    <!-- Main -->
    <main class="main">

        <div class="section jumbotron mb-0 h-100">
            <!-- container -->
            <div class="container d-flex flex-column justify-content-center align-items-center h-100">

                <div class="wrapper my-2 pt-3 bg-white w-50 text-center">
                    <img src="assets/img/logo/logo.png" alt="dev culture logo" style="width: 100px;height: auto;">
                </div>

                <!-- row -->
                <div class="wrapper bg-white rounded px-4 py-4 w-50">

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" value="">
                            <span class="invalid-feedback"><?= $username_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                            <span class="invalid-feedback"><?= $password_err; ?></span>
                        </div>
                        <div class="form-check my-2">
                            <input type="checkbox" name="remember" id="rememberMe" checked>
                            <label for="rememberMe">Remember me</label>
                            <p><a href="#" class="text-muted">Lost your password?</a></p>
                        </div>
                        <div class="form-group row justify-content-center">
                            <input type="submit" class="btn btn-primary col-6 m-4" value="Login">
                        </div>
                    </form>
                </div>

                <!-- /row -->

            </div>
            <!-- /container -->
        </div>


    </main><!-- </Main> -->

    <!-- Footer -->
    <?php include "components/footer.php" ?>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>