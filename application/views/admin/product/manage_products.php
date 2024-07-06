<?php

/***************************************************************************************************
 * Copyright (c) 2020. by Camwel Corporate Solution PVT LTD
 * This project is developed and maintained by Camwel Corporate Solution PVT LTD.
 * Nobody is permitted to modify the source or any part of the project without permission.
 * Project Developer: Bidush Sarkar
 * Developed for: Camwel Corporate Solution PVT LTD
 **************************************************************************************************/
?>
<a href="<?php echo site_url('product/add_product') ?>" class="btn btn-xs btn-success">Add New Product</a>
<table id="example" class="table table-striped">
    <thead>
        <tr>
            <th>SN</th>
            <th>Name</th>
            <th>Price + Tax</th>
            <th>Image</th>
            <th>Qty Avlb.</th>
            <th>Qty Sold</th>
            <th>Joining Product ?</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sn = 1;
        foreach ($prod as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e['prod_name']; ?></td>
                <td><?php echo config_item('currency') . " " . $this->common_model->filter($e['prod_price'] + ($e['prod_price'] * $e['gst'] / 100), 'decimal'); ?></td>
                <td>
                    <img src="<?php echo $e['image'] ? base_url('uploads/' . $e['image']) : base_url('uploads/default.jpg'); ?>" class="img-thumbnail img-responsive" style="max-height: 100px">
                </td>
                <td><?php echo $e['qty']; ?></td>
                <td><?php echo $e['sold_qty']; ?></td>
                <td><?php echo $e['show_on_regform']; ?></td>
                <td>
                    <a href="<?php echo site_url('product/view/' . $e['id']); ?>" class="btn btn-danger btn-xs">View</a>
                    <a href="<?php echo site_url('product/edit/' . $e['id']); ?>" class="btn btn-info btn-xs">Edit</a>
                    <a onclick="return confirm('Are you sure you want to delete this Product ?')" href="<?php echo site_url('product/remove/' . $e['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>
</div>