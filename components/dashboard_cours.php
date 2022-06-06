<!-- Last read articles by the user -->
<?php
// Get all user courses
$courses = $user->get_enrolled_courses();

?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="text-primary fw-bold m-0">Your courses</h6>
    </div>
    <ul class="list-group list-group-flush">

        <?php foreach ($courses as $cours) : ?>

            <li class="list-group-item">
                <div class="row align-items-center no-gutters">
                    <div class="col me-2">

                        <!-- Title -->
                        <h6 class="mb-0">
                            <strong>
                                <a class="text-decoration-none" href="single_cours.php?id=<?= $cours['NumCou'] ?>"><?= $cours['Titre'] ?></a>
                            </strong>
                        </h6>

                        <!-- Subtitle -->
                        <span class="text-xs">
                            <!-- Date -->
                            <?= date_format(date_create($cours['enroll_date']), "F d, Y ") ?>

                            <!-- Niveau -->
                            <a class="badge bg-info text-decoration-none text-white" href="cours.php?niveau=<?= $cours['Niveau'] ?>">
                                <?= $cours['Niveau'] ?>
                            </a>
                        </span>

                    </div>
                    <div class=" col-auto">
                        <i class="fas fa-arrow-right text-info"></i>
                    </div>
                </div>
            </li>

        <?php endforeach;  ?>

    </ul>
</div>