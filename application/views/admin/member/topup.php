<?php

/***************************************************************************************************
 * Copyright (c) 2020. by Camwel Corporate Solution PVT LTD
 * This project is developed and maintained by Camwel Corporate Solution PVT LTD.
 * Nobody is permitted to modify the source or any part of the project without permission.
 * Project Developer: Bidush Sarkar
 * Developed for: Camwel Corporate Solution PVT LTD
 **************************************************************************************************/
?>
    <?php echo form_open('users/topup_member') ?>
<div class="row">
    <div class="col-sm-6">
        <label>User ID</label>
        <input type="text" value="<?php echo $this->uri->segment(3) ? $this->uri->segment(3) : '' ?>" class="form-control" id="userid" name="userid">
        <strong id="member_name" class="text-danger"></strong>
    </div>
    <div class="col-sm-6">
        <label>Amount to Topup</label>
        <!-- <input type="text" class="form-control" id="amt" name="amt"> -->
        <select name="amt" id="amt"class="form-control">
        <?php foreach ($products as $val) {
                echo '<option value="' . $val['prod_price'] . '">'.number_format($val['prod_price'], 2) . ' </option>';
            } ?>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <label for="product" class="control-label">Package</label>
        <select class="form-control" id="product" name="product" required>
            <?php foreach ($products as $val) {
                echo '<option value="' . $val['id'] . '">' . $val['prod_name'] . '. Price :' . config_item('currency') . number_format($val['prod_price'] + ($val['prod_price'] * $val['gst'] / 100), 2) . ' </option>';
            } ?>
        </select>
    </div>
    <div class="col-sm-6">
        <br>
        <input type="submit" class="btn btn-success" value="TopUp" onclick="this.value='Working..'">
    </div>
</div>
<?php echo form_close() ?>


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->

<script>
    var base_url='<?php echo base_url()?>';
   
    
    $(document).on('change','#userid',function(){
         var userid =$('#userid').val();        
        $.ajax({
            type:'post',
            data:{'id':userid},
            url:base_url+'Users/get_user_name',
            success:function(data){

                $('#member_name').html(data);

            }
        });

    });
</script>

