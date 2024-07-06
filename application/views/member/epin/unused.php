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
            <th>Epin</th>
            <th>Amount</th>
            <th>Issue To</th>
            <th>Date</th>
            <!-- <th>Type</th> -->
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sn = 1;
        foreach ($epin as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e['epin']; ?></td>
                <td><?php echo '₹  '.$e['amount']; ?></td>
                <td><?php echo config_item('ID_EXT') . $e['issue_to']; ?></td>
                <td><?php echo $e['generate_time']; ?></td>
                <!-- <td><?php echo $e['type']; ?></td> -->
                <td>
                    <a target="_blank" href="<?php echo site_url('site/register/epin/' . $e['epin']); ?>" class="btn btn-info btn-xs">Add New Member</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</div>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>
</div>