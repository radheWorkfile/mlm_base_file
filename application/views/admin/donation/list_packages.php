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
            <th>Stage Name</th>
            <th>Donation Amount</th>
            <th>Donation Qty</th>
            <th>Donation Level</th>
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
                <td><?php echo $e->plan_name; ?></td>
                <td><?php echo config_item('currency') . $e->donation_amount; ?> </td>
                <td><?php echo $e->donation_qty; ?></td>
                <td>Stage <?php echo $e->donation_level; ?></td>
                <td>
                    <a href="<?php echo site_url('donation/edit_pack/' . $e->id); ?>" class="btn btn-info btn-xs">Edit</a>
                    <a onclick="return confirm('Are you sure you want to delete this Package ?')" href="<?php echo site_url('donation/remove_don_pack/' . $e->id); ?>" class="btn btn-danger btn-xs">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>
</div>