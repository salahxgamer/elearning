<header class="blog-header border-bottom shadow-sm bg-white">
    <nav class="navbar navbar-light navbar-expand-md py-1">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon">
                    <img src="img/logo/logo.png" height="40" alt="">
                </span>
                <span>E-Learning</span>
            </a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navcol-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="navcol-2" class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <?php if ($user->is_logged()) : ?>
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="categories.php">Category</a></li>
                        <li class="nav-item"><a class="nav-link" href="article.php">Article</a></li>
                        <li class="nav-item"><a class="nav-link" href="author.php">Author</a></li>
                    <?php else : ?>
                        <li class="nav-item"><a class="nav-link" href="articleOfCategory.php">Articles</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                    <?php endif;  ?>
                </ul>
                <a class="btn btn-primary ms-lg-2" role="button" href="<?= ($user->is_logged()) ? 'Logout.php' : 'login.php'; ?>">
                    <?= ($user->is_logged()) ? 'Logout' : 'Sign in'; ?>
                </a>
            </div>
        </div>
    </nav>
</header>