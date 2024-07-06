<?php

/***************************************************************************************************
 * Copyright (c) 2020. by Camwel Corporate Solution PVT LTD
 * This project is developed and maintained by Camwel Corporate Solution PVT LTD.
 * Nobody is permitted to modify the source or any part of the project without permission.
 * Project Developer: Camwel Corporate Solution PVT LTD
 * Developed for: Camwel Corporate Solution PVT LTD
 **************************************************************************************************/

$top_id = $this->session->user_id;
$this->db->select('id, transfer_from, transfer_to, amount, time')->from('transfer_balance_records')
    ->where('transfer_to', htmlentities($top_id))->or_where('transfer_from', htmlentities($top_id));
$data = $this->db->get()->result();
?>

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