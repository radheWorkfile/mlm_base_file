<?php
/***************************************************************************************************
 * Copyright (c) 2020. by Camwel Corporate Solution PVT LTD
 * This project is developed and maintained by Camwel Corporate Solution PVT LTD.
 * Nobody is permitted to modify the source or any part of the project without permission.
 * Project Developer: Camwel Corporate Solution PVT LTD
 * Developed for: Camwel Corporate Solution PVT LTD
 **************************************************************************************************/
?>
<?php echo form_open() ?>
<div class="col-sm-7 col-md-offset-2">
    <label>Enter Current Password:</label>
    <input type="password" name="password" required class="form-control"><br/>
    <label>Enter Transaction Pin:</label>
    <input type="password" name="newpin" maxlength="6" required class="form-control"><br/>
    <label>Confirm Transaction Pin:</label>
    <input type="password" name="repin" maxlength="6" required class="form-control"><br/>
    <button class="btn btn-success" name="submit" value="add">Update</button>
</div>
<?php echo form_close() ?>

