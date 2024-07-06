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
            <th>Service Type</th>
            <th>Recharge No</th>
            <th>Amount</th>
            <th>Area / Operator</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sn = 1;
        foreach ($rcg as $e) {
        ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e->service_type; ?></td>
                <td><?php echo $e->recharge_no; ?></td>
                <td><?php echo $e->amount; ?></td>
                <td><?php echo $e->area; ?><br />(<?php echo $e->operator; ?>)</td>
                <td><?php echo date('d/m/Y', $e->time); ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>
</div>