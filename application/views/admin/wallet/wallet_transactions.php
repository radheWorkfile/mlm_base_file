<?php

/***************************************************************************************************
 * Copyright (c) 2020. by Camwel Corporate Solution PVT LTD
 * This project is developed and maintained by Camwel Corporate Solution PVT LTD.
 * Nobody is permitted to modify the source or any part of the project without permission.
 * Project Developer: Bidush Sarkar
 * Developed for: Camwel Corporate Solution PVT LTD
 **************************************************************************************************/

$top_id = $this->uri->segment('3') ? $this->uri->segment('3') : config_item('top_id');
$this->db->select('id, transfer_from, transfer_to, amount, time')->from('transfer_balance_records')
    ->where('transfer_to', htmlentities($top_id))->or_where('transfer_from', htmlentities($top_id));
$this->db->limit(100);
$data = $this->db->get()->result();
?>
<!-- 
<div class="row col-md-offset-2">
    <div class="col-sm-5">
        <form method="post" action="<?php echo site_url('wallet/wallet_transactions') ?>">
            <label>Enter User Id</label>
            <input type="text" name="top_id" class="form-control">
            <button class="btn btn-xs btn-danger" type="submit">Search</button>
        </form>
    </div>
    <hr/>
</div> -->
<table id="example" class="table table-striped">
    <thead>
        <tr>
            <th>S.N.</th>
            <th>Transferred From</th>
            <th>Transferred To</th>
            <th>Amount</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sn = 1;
        foreach ($data as $e) {

        ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e->transfer_from ?></td>
                <td><?php echo $e->transfer_to ?></td>
                <td><?php echo config_item('currency') . $e->amount ?></td>
                <td><?php echo $e->time ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
