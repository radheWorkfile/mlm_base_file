<?php

/***************************************************************************************************
 * Copyright (c) 2020. by Camwel Corporate Solution PVT LTD
 * This project is developed and maintained by Camwel Corporate Solution PVT LTD.
 * Nobody is permitted to modify the source or any part of the project without permission.
 * Project Developer: Camwel Corporate Solution PVT LTD
 * Developed for: Camwel Corporate Solution PVT LTD
 **************************************************************************************************/
?>
<!-- <?php echo form_open() ?>
<div class="row">
    <div class="form-group">
        <div class="col-sm-4">
            <input placeholder="Enter User ID" class="form-control" name="uid">
        </div>
    </div>
    Or
    <div class="form-group">
        <div class="col-sm-4">
            <input class="form-control" name="epin" placeholder="Enter e-PIN">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-4">
            <input type="submit" class="btn btn-primary" value="Search" onclick="this.value='Searching..'">
        </div>
    </div>
</div>
<p>&nbsp;</p>
<?php echo form_close() ?> -->

<table id="example" class="table table-striped">
    <thead>
        <tr>
            <th>SN</th>
            <th>Epin</th>
            <th>Amount</th>
            <th>Issued To</th>
            <th>Transferred By</th>
            <th>Used By</th>
            <th>Used Date</th>
            <!-- <th>Actions</th> -->
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
                <td><?php echo $e['issue_to'] ? config_item('ID_EXT') . $e['issue_to'] : ''; ?></td>
                <td><?php echo $e['transfer_by'] ? config_item('ID_EXT') . $e['transfer_by'] : ' Self Generated'; ?></td>
                <td><?php echo $e['used_by'] ? config_item('ID_EXT') . $e['used_by'] : ''; ?></td>
                <td><?php echo $e['used_time']; ?></td>
                <!-- <td>
                    <a href="<?php echo site_url('admin/epin/edit/' . $e['id']); ?>" class="btn btn-info btn-xs">Edit</a>
                    <a onclick="return confirm('Are you sure you want to delete this epin ?')" href="<?php echo site_url('admin/epin/remove/' . $e['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
                </td> -->
            </tr>
        <?php } ?>
    </tbody>
</table>
</div>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>
</div>