<?php require APP_ROOT . '/views/extra/header.php'; ?>
<?php flash('policy_alert'); ?>
<div class="row ">
    <div class="col-md-8">
        <h2>Policy List</h2>
    </div>
    <div class="col-md-4">
        <a class="btn btn-primary pull-right" href="<?php echo URLROOT; ?>/policy/add"><i class="fa fa-pencil"></i> Add Policy</a>
    </div>
</div>
<?php
if (count($data['policies'])) {  ?>
    <table class="table table-striped">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Policy Number</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Premium(INR)</th>
            <th>Action</th>
        </tr>
        <?php
        foreach ($data['policies'] as $policy) : ?>
            <tr>
                <td><?php echo  $policy->first_name; ?></td>
                <td><?php echo  $policy->last_name; ?></td>
                <td><?php echo  $policy->policy_number; ?></td>
                <td><?php echo  $policy->start_date; ?></td>
                <td><?php echo  $policy->end_date; ?></td>
                <td><?php echo  $policy->premium; ?></td>
                <td><a href="<?php echo URLROOT; ?>/policy/edit/<?php echo $policy->id; ?>">Edit</a> |
                    <a href="<?php echo URLROOT; ?>/policy/delete/<?php echo $policy->id; ?>">Delete</a>
                </td>
            </tr>

        <?php endforeach;
        ?>
    </table>
<?php
} else {
    echo "No record found";
?>
    </br><a class="btn btn-primary pull-right" href="<?php echo URLROOT; ?>/policy/add"><i class="fa fa-pencil"></i> Add Policy</a>

<?php } ?>
<?php require APP_ROOT . '/views/extra/footer.php'; ?>