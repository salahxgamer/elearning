<!-- Last read articles by the user -->
<?php 
    // Get all Articles Data
    $last_read_articles = $article->get_latest(20);
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="text-primary fw-bold m-0">Last read articles</h6>
    </div>
    <ul class="list-group list-group-flush">

        <?php foreach ($last_read_articles as $article) : ?>

        <li class="list-group-item">
            <div class="row align-items-center no-gutters">
                <div class="col me-2">

                    <!-- Title -->
                    <h6 class="mb-0">
                        <strong>
                            <a class="text-decoration-none" href="single_article.php?id=<?= $article['article_id'] ?>"><?= $article['article_title'] ?></a>
                        </strong>
                    </h6>

                    <!-- Subtitle -->
                    <span class="text-xs">
                        <!-- Date -->
                        <?= date_format(date_create($article['article_created_time']), "F d, Y ") ?>

                        <!-- Category -->
                        <a class="badge text-decoration-none text-white" href="articleOfCategory.php?catID=<?= $article['category_id'] ?>" style="background-color:<?= $article['category_color'] ?>">
                            <?= $article['category_name'] ?>
                        </a>
                    </span>

                </div>
                <div class="col-auto">
                    <i class="fas fa-eye text-success"></i>
                </div>
            </div>
        </li>

        <?php endforeach;  ?>

    </ul>
</div>