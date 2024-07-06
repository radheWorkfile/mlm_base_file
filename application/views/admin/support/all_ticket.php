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
            <th>Ticket Subject</th>
            <th>Date</th>
            <th style="background-color: #d6e9c6">Status</th>
            <th>#</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sn = 1;
        foreach ($data as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e->ticket_title; ?></td>
                <td><?php echo $e->date; ?></td>
                <td style="background-color: #d6e9c6"><?php echo $e->status; ?></td>
                <td><a href="<?php echo site_url('ticket/view/' . $e->id) ?>" class="btn btn-xs btn-danger">View</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</div>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>
</div>