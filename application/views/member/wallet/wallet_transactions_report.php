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
            <th>S.N.</th>
            <th>Amount</th>           
            <th>Remark</th>
            <th>CR/DR</th>
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
                <td><?php echo config_item('currency') . $e->amount; ?></td>
                <td><?php echo $e->remark; ?></td>
                <td><?php echo ($e->status=='CR')?"<span class='text-success'>CR</span>":"<span class='text-danger'>DR</span>"; ?></td>
                 <td><?php echo $e->date; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>