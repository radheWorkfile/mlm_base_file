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
        <tr style="font-weight: bold">
            <th>Product Name</th>
            <th>Qty</th>
            <th>Order Date</th>
            <th>Status</th>
            <th>Total Cost</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $this->db_model->select('prod_name', 'product', array('id' => $orders->product_id)); ?></td>
            <td><?php echo $orders->qty ?></td>
            <td><?php echo $orders->date ?></td>
            <td><?php echo $orders->status ?></td>
            <td><?php echo config_item('currency') . ($orders->cost * $orders->qty) ?></td>
        </tr>
    </tbody>
</table>
</div>
<a href="javascript:history.back()" class="btn btn-xs btn-danger">Go Back</a>