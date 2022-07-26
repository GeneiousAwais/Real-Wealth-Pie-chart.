<div class="col-xl-6">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">YOU’RE ALMOST DONE!</h4>
            <h2 class="card-title mb-2">Where should we send your Organizational Checkup results?</h2>
            <p class="card-title-desc">Please enter your name and email address</p>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label">First name</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required="">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="validationCustom02" class="form-label">Last name</label>
                        <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required="">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter your Email..." required>
                        <div class="invalid-feedback">
                            Please Enter Email Address.
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" id="role" name="role" required="">
                            <option value="">Select role</option>
                            <option value="1">1 - Owner (not on Leadership Team)</option>
                            <option value="2">2 - Leadership Team</option>
                            <option value="3">3 - Manager, Supervisor</option>
                            <option value="4">4 - Team Member, Employee, Staff, Associate</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a role.
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label class="d-block mb-3">Subscribe to EOS Blog? :</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sub_blog" id="yes" value="yes">
                        <label class="form-check-label" for="yes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sub_blog" id="no" value="no">
                        <label class="form-check-label" for="no">No</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="formmessage">Are you working with an implementer? (If yes, check the box and enter their email.)</label>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="checked" id="copycheck" name="copycheck">
                        <input type="text" autocomplete="off" class="form-control" id="copy" name="copy" placeholder="EOSI email">
                    </div>
                </div>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required="">
                <label class="form-check-label" for="invalidCheck">
                    Agree to terms and conditions
                </label>
                <div class="invalid-feedback">
                    You must agree before submitting.
                </div>
            </div>
            <div>
                <button class="btn btn-primary" type="submit">Submit form</button>
            </div>
        </div>
    </div>
</div>