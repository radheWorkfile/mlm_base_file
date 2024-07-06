<?php
/***************************************************************************************************
 * Copyright (c) 2020. by Camwel Corporate Solution PVT LTD
 * This project is developed and maintained by Camwel Corporate Solution PVT LTD.
 * Nobody is permitted to modify the source or any part of the project without permission.
 * Project Developer: Camwel Corporate Solution PVT LTD
 * Developed for: Camwel Corporate Solution PVT LTD
 **************************************************************************************************/
?>
<div class="row">
    <?php echo form_open() ?>
    <div class="col-sm-6">
        <label>User ID</label>
        <input type="text" class="form-control" value="<?php echo set_value('userid') ?>" name="userid">
    </div>
    <div class="col-sm-6">
        <label>Coupon Category</label>
        <select class="form-control" value="<?php echo set_value('coupon_cat') ?>" name="coupon_cat">
            <?php
            foreach ($result as $e) {
                echo '<option value="' . $e->id . '">' . $e->cat_name . '</option>';
            }
            ?>
        </select>
    </div>
    <div class="col-sm-6">
        <label>Coupon Amount</label>
        <input type="text" class="form-control" value="<?php echo set_value('coupon_amt') ?>" name="coupon_amt">
    </div>
    <div class="col-sm-6">
        <label>Coupon Code</label>
        <input type="text" class="form-control" value="<?php echo set_value('coupon_code') ?>" name="coupon_code">
    </div>
    <div class="col-sm-6"><br/>
        <input type="submit" class="btn btn-success" value="Create" onclick="this.value='Generating..'">
    </div>
    <?php echo form_close() ?>
</div>