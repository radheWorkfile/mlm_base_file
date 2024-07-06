<?php

/***************************************************************************************************
 * Copyright (c) 2020. by Camwel Corporate Solution PVT LTD
 * This project is developed and maintained by Camwel Corporate Solution PVT LTD.
 * Nobody is permitted to modify the source or any part of the project without permission.
 * Project Developer: Bidush Sarkar
 * Developed for: Camwel Corporate Solution PVT LTD
 **************************************************************************************************/
?>
<table id="example" class="table table-striped">
    <thead>
        <tr>
            <th>SN</th>
            <th>Package Name</th>
            <th>Amount</th>
            <th>ROI</th>
            <th>ROI Payout</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sn = 1;
        foreach ($result

            as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e->pack_name; ?></td>
                <td><?php echo config_item('currency') . $e->amount; ?></td>
                <td><?php echo $e->roi; ?></td>
                <td>Every <?php echo $e->roi_frequency; ?> days</td>
                <td>
                    <a href="<?php echo site_url('investments/edit_pack/' . $e->id); ?>" class="btn btn-info btn-xs">Edit</a>
                    <a onclick="return confirm('Are you sure you want to delete this Package ?')" href="<?php echo site_url('investments/remove_inv_pack/' . $e->id); ?>" class="btn btn-danger btn-xs">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>
</div>