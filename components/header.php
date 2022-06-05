<header class="blog-header border-bottom shadow-sm bg-white">
    <nav class="navbar navbar-light navbar-expand-md py-1">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon">
                    <img src="assets/img/logo/logo.png" height="40" alt="">
                </span>
                <span>E-Learning</span>
            </a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navcol-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="navcol-2" class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="tutorials.php">Tutorials</a></li>
                    <li class="nav-item"><a class="nav-link" href="testimonials.php">Testimonials</a></li>
                    <li class="nav-item"><a class="nav-link" href="blog.php">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                    <?php if ($user->is_logged()) : ?>
                        <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
                        <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                        <a class="btn btn-primary ms-lg-2" role="button" href="Logout.php">
                            <i class="fas fa-sign-out"></i>
                            Logout
                        </a>
                    <?php else : ?>
                        <a class="btn btn-primary ms-lg-2" role="button" href="login.php">
                            <i class="fas fa-sign-in"></i>
                            Sign in
                        </a>
                    <?php endif;  ?>
                </ul>
            </div>
        </div>
    </nav>
</header>