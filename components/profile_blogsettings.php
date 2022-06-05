<div class="card shadow mb-5">
    <div class="card-header py-3">
        <p class="text-primary m-0 fw-bold">Blog Settings</p>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label" for="signature"><strong>Signature</strong><br></label>
                        <textarea class="form-control" id="signature" rows="4" name="signature"><?= property_exists($user->userInfo, 'signature') ? $user->userInfo->signature : '' ?></textarea>
                    </div>

                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="formCheck-1">
                            <label class="form-check-label" for="formCheck-1"><strong>Notify me about new replies</strong></label>
                        </div>
                    </div>

                    <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit" name="updateBlogSettings">Save Settings</button></div>
                </form>
            </div>
        </div>
    </div>

</div>