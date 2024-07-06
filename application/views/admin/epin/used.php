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
            <th>Epin</th>
            <th>Amount</th>
            <th>Used By</th>
            <th>Used Date</th>
            <!-- <th>Type</th>
            <th>Actions</th> -->
        </tr>
    </thead>
    <tbody>
        <?php
        $sn = 1;
        foreach ($epin as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e['epin']; ?></td>
                <td><?php echo $e['amount']; ?></td>
                <td><?php echo config_item('ID_EXT') . $e['used_by']; ?></td>
                <td><?php echo $e['used_time']; ?></td>
                <!-- <td><?php echo $e['type']; ?></td>
                <td>
                    <a href="<?php echo site_url('admin/epin/edit/' . $e['id']); ?>" class="btn btn-info btn-xs">Edit</a>
                    <a onclick="return confirm('Are you sure you want to delete this epin ?')" href="<?php echo site_url('admin/epin/remove/' . $e['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
                </td> -->
            </tr>
        <?php } ?>
    </tbody>
</table>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>
</div>