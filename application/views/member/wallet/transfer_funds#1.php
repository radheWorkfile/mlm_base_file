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
<div class="col-sm-7 col-md-offset-2" style="text-align: center">
    <h3>
        <strong style="color: #0cc745">Available Wallet Balance:
            <?php echo config_item('currency') . $this->db_model->select('balance', 'wallet', array('userid' => $this->session->user_id)) ?></strong>
    </h3>
    <label>Enter Amount:</label>
    <input type="text" name="amount" required class="form-control" value="1"><br/>
    <label>Transfer to User ID:</label>
    <input type="text" name="transferid" required class="form-control"><br/>
    <button class="btn btn-success" name="submit" value="add">Transfer</button>
</div>
<?php echo form_close() ?>

