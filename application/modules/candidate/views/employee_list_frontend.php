
<div class="row" style="margin:30px 0;">
    <?php
    if (isset($list) && is_array($list) && count($list) > 0) {
        foreach ($list as $key => $value) {
            ?>
            <div class="col-md-2">
                <div class="inner-list-sec employee-list-front">
                    <img class="img-responsive img-bordered" src="<?php echo MEDIA_PATH_FRONTEND . $value['image'] ?>"/>
                    <h5><?php echo ucwords($value['name']); ?></h5>
                    <h6>Designation : <?php echo $roles[$value['role']]; ?></h6>
                </div>
            </div>
            <?php
        }
    }
    ?>
</div>
