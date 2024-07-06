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
            <th>Invst Amount</th>
            <th>Date</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sn = 1;
        foreach ($result as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $this->db_model->select('pack_name', 'investment_pack', array('id' => $e->pack_id)); ?></td>
                <td><?php echo config_item('currency') . $e->amount; ?></td>
                <td><?php echo $e->date; ?></td>
                <td style="font-weight: bold; color: #0d638f"><?php echo $e->status; ?></td>
                <td>
                    <a class="btn btn-info btn-xs" href="<?php echo site_url('investments/pdf_invoice/' . $e->id) ?>" target="_blank">Receipt</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>
</div>