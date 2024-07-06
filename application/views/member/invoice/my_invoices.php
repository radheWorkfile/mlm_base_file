<?php

/***************************************************************************************************
 * Copyright (c) 2020. by Camwel Corporate Solution PVT LTD
 * This project is developed and maintained by Camwel Corporate Solution PVT LTD.
 * Nobody is permitted to modify the source or any part of the project without permission.
 * Project Developer: Camwel Corporate Solution PVT LTD
 * Developed for: Camwel Corporate Solution PVT LTD
 **************************************************************************************************/
?>
<table id="example" class="table table-striped">
    <thead>
        <tr>
            <th>SN</th>
            <th>Invoice Name</th>
            <th>Total Amt</th>
            <th>Paid Amt</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sn = 1;
        foreach ($invoice as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e->invoice_name; ?></td>
                <td><?php echo config_item('currency') . $e->total_amt; ?></td>
                <td><?php echo config_item('currency') . $e->paid_amt; ?></td>
                <td><?php echo $e->date; ?></td>
                <td>
                    <a target="_blank" href="<?php echo site_url('member/invoice_view/' . $e->id); ?>" class="btn btn-info btn-xs">Print</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>
</div>