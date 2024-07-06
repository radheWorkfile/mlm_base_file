<?php

/***************************************************************************************************
 * Copyright (c) 2020. by Camwel Corporate Solution PVT LTD
 * This project is developed and maintained by Camwel Corporate Solution PVT LTD.
 * Nobody is permitted to modify the source or any part of the project without permission.
 * Project Developer: Camwel Corporate Solution PVT LTD
 * Developed for: Camwel Corporate Solution PVT LTD
 **************************************************************************************************/
$package = $this->db->select('*')->get('product')->result();

?><?php echo form_open() ?>
<div class="row">
    <div class="form-group">
        <div class="col-sm-6">
            <label>From User ID <span class="text-danger">*</span></label>
            <input placeholder="From where to deduct epin" value="<?php echo set_value('from') ?>" oninput="this.value = this.value.toUpperCase().replace(/[^0-9]/g, '').replace(/(\  *?)\  */g, '$1')" class="form-control" id="from_id" name="from">
            <span id="from"></span>
        </div>
        <div class="col-sm-6">
            <label>To User ID <span class="text-danger">*</span></label>
            <input placeholder="Where to transfer epins" value="<?php echo set_value('to') ?>" class="form-control" oninput="this.value = this.value.toUpperCase().replace(/[^0-9]/g, '').replace(/(\  *?)\  */g, '$1')" id="to_id" name="to">
            <span id="to"></span>
        </div>
        <div class="col-sm-6">
            <label>Amount <span class="text-danger">*</span></label>
            <select name="amount" id="amount" class="form-control">
                <?php foreach ($package as $pack) : ?>
                    <option value="<?php echo $pack->prod_price ?>"><?php echo config_item('currency') . '&nbsp;' . number_format($pack->prod_price, 2) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-sm-6">
            <label>Number of Pins <span class="text-danger">*</span></label>
            <input placeholder="How many epin to transfer" value="<?php echo set_value('qty') ?>" class="form-control" name="qty">
        </div>
        <div class="col-sm-6">
            <br />
            <input type="submit" class="btn btn-primary" value="Transfer" onclick="this.value='Transferring..'">
        </div>
    </div>
</div>
<p>&nbsp;</p>
<?php echo form_close() ?>


<script>
    var base_url = "<?php echo base_url(); ?>";
    $("#from_id").on('change', function() {

        var id = $("#from_id").val();

        $.ajax({
            url: base_url + "Admin/get_user_name",
            type: "post",
            data: {
                "id": id
            },
            success: function(data) {
                $("#from").html("<span class='text-success'>" + data + "</span>")
            }
        });

    });

    $("#to_id").on('change', function() {

        var id = $("#to_id").val();

        $.ajax({
            url: base_url + "Admin/get_user_name",
            type: "post",
            data: {
                "id": id
            },
            success: function(data) {
                $("#to").html("<span class='text-success'>" + data + "</span>")
            }
        });

    });
</script>
