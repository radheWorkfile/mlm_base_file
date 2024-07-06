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
<div class="col-sm-12">
    <label>Subject in Breif <span class="text-danger">*</span></label>
    <input type="text" class="form-control" value="<?php echo set_value('ticket_title') ?>" name="ticket_title">
</div>
<div class="col-sm-12">
    <label>Issue in Detail<span class="text-danger">*</span></label>
    <textarea class="form-control" id="editor" name="ticket_data"><?php echo set_value('ticket_data') ?></textarea>
</div>
<div class="col-sm-12">
    <br/>
    <button type="submit" class="btn btn-primary">Submit</button>
    <br/><br/>
</div>
<?php echo form_close() ?>
