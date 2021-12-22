<?php require APP_ROOT . '/views/extra/header.php'; ?>
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card bg-light mt-5">
            <div class="card-header card-text">
                <div class="row">
                    <div class="col">
                        <h2 class="card-text">Add New Policy</h2>
                    </div>

                </div>
                <p class="card-text">Please enter your username and password</p>
            </div>

            <div class="card-body">
                <form method="post" action="<?php echo URLROOT; ?>/policy/add">


                    <div class="form-group">
                        <label for="first_name">First Name*</label>
                        <input type="text"  id="first_name" name="first_name" class="form-control form-control-lg <?php echo (!empty($data['first_name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['first_name'] ?? ''; ?>">
                        <span class="invalid-feedback" id="first_name_err"><?php echo $data['first_name_err']; ?> </span>
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last Name*</label>
                        <input type="text" name="last_name" id="last_name" class="form-control form-control-lg <?php echo (!empty($data['last_name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['last_name'] ?? ''; ?>">
                        <span class="invalid-feedback" id="last_name_err"><?php echo $data['last_name_err']; ?> </span>
                    </div>

                    <div class="form-group">
                        <label for="policy_number">Policy Number*</label>
                        <input type="number" name="policy_number" id="policy_number" class="form-control form-control-lg <?php echo (!empty($data['policy_number_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['policy_number'] ?? ''; ?>">
                        <span class="invalid-feedback" id="policy_number_err"><?php echo $data['policy_number_err']; ?> </span>
                    </div>

                    <div class="form-group">
                        <label for="start_date">Start Date*</label>
                        <input type="date"  id="start_date" name="start_date" class="form-control form-control-lg <?php echo (!empty($data['start_date_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['start_date'] ?? ''; ?>">
                        <span class="invalid-feedback" id="start_date_err"><?php echo $data['start_date_err']; ?> </span>
                    </div>

                    <div class="form-group">
                        <label for="end_date">End Date*</label>
                        <input type="date" id="end_date" name="end_date" class="form-control form-control-lg <?php echo (!empty($data['end_date_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['end_date'] ?? ''; ?>">
                        <span class="invalid-feedback" id="end_date_err"><?php echo $data['end_date_err']; ?> </span>
                    </div>


                    <div class="form-group">
                        <label for="premium">Premium($)*</label>
                        <input type="number" id="premium" name="premium" class="form-control form-control-lg <?php echo (!empty($data['premium_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['premium'] ?? ''; ?>">
                        <span class="invalid-feedback" id="premium_err"><?php echo $data['premium_err']; ?> </span>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <input type="submit" id="submit_button" class="btn btn-primary btn-block pull-left" value="Add Policy">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require APP_ROOT . '/views/extra/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/validation.js"></script>