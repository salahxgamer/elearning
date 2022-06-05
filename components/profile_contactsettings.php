<div class="card shadow">
    <div class="card-header py-3">
        <p class="text-primary m-0 fw-bold">Contact Settings</p>
    </div>
    <div class="card-body">
        <form method="POST">

            <div class="mb-3">
                <label class="form-label" for="address"><strong>Address</strong></label>
                <input class="form-control" type="address" id="address" placeholder="<?= property_exists($user->userInfo, 'address') ? $user->userInfo->address : '' ?>" name="address">
            </div>

            <div class="row">

                <div class="col">
                    <div class="mb-3">
                        <label class="form-label" for="telephone"><strong>Phone number</strong>
                        </label>
                        <input class="form-control" type="tel" id="telephone" placeholder="<?= property_exists($user->userInfo, 'telephone') ? $user->userInfo->telephone : '' ?>" name="telephone">
                    </div>
                </div>

                <div class="col">
                    <div class="mb-3">
                        <label class="form-label" for="nais"><strong>Birthday</strong></label>
                        <input class="form-control" type="date" id="dateNais" value="<?= property_exists($user->userInfo, 'dateNais') ? $user->userInfo->dateNais : '' ?>" name="dateNais">
                    </div>
                </div>

            </div>

            <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit" name="updateContactSettings">Save&nbsp;Settings</button></div>
        </form>
    </div>
</div>