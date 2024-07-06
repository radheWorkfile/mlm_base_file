<?php
/***************************************************************************************************
 * Copyright (c) 2020. by Camwel Corporate Solution PVT LTD
 * This project is developed and maintained by Camwel Corporate Solution PVT LTD.
 * Nobody is permitted to modify the source or any part of the project without permission.
 * Project Developer: Camwel Corporate Solution PVT LTD
 * Developed for: Camwel Corporate Solution PVT LTD
 **************************************************************************************************/
?>
<?php echo form_open_multipart() ?>
<div class="row">
    
<div class="col-sm-6">
        <label>Name</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="fa fa-user"></span></span>
            <input type="text" class="form-control" name="name">
        </div>
    </div>
    <div class="col-sm-6">
        <label>Member Image</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="fa fa-user"></span></span>
            <input type="file" class="form-control" name="member_img">
        </div>
    </div>
    
   
</div>
<div>&nbsp;</div>
<div class="row">
   
    <div class="col-sm-12">      
        <div class="input-group">       
            <label>Feedback</label>
            <textarea class="form-control" id="editor" name="feedback"></textarea>
       
        </div>
    </div>
    <div class="col-sm-5">
        <div>&nbsp;</div>
        <input type="submit" class="btn btn-danger" onclick="this.value='adding..'" value="Add">
    </div>
    <div class="col-sm-1"></div>
</div>
<?php echo form_close() ?>
