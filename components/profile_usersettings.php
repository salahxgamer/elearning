<div class="card shadow mb-3">

    <div class="card-header py-3">
        <p class="text-primary m-0 fw-bold">User Settings</p>
    </div>

    <div class="card-body">
        <form action="profile.php" method="POST">

            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label class="form-label" for="username"><strong>Username</strong></label>
                        <input readonly class="form-control" type="text" id="username" placeholder="<?= property_exists($user->userInfo, 'username') ? $user->userInfo->username : '' ?>" name="username">
                    </div>
                </div>

                <div class="col">
                    <div class="mb-3">
                        <label class="form-label" for="email"><strong>Email Address</strong></label>
                        <input class="form-control" type="email" id="email" placeholder="<?= property_exists($user->userInfo, 'email') ? $user->userInfo->email : '' ?>" name="email">
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col">
                    <div class="mb-3">
                        <label class="form-label" for="prenom"><strong>First Name</strong></label>
                        <input class="form-control" type="text" id="prenom" placeholder="<?= property_exists($user->userInfo, 'prenom') ? $user->userInfo->prenom : '' ?>" name="prenom">
                    </div>
                </div>

                <div class="col">
                    <div class="mb-3">
                        <label class="form-label" for="nom"><strong>Last Name</strong></label>
                        <input class="form-control" type="text" id="nom" placeholder="<?= property_exists($user->userInfo, 'nom') ? $user->userInfo->nom : '' ?>" name="nom">
                    </div>
                </div>

            </div>

            <div class="mb-3">
                <button class="btn btn-primary btn-sm" type="submit" name="updateUserSettings">Save Settings</button>
            </div>
        </form>
    </div>

</div>