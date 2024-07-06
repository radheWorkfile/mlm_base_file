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
            <th>Reward Name</th>
            <th>Achieve Date</th>
            <th>Paid Date</th>
            <th>Delivery Detail</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sn = 1;
        foreach ($rewards as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td>
                    <?php
                    if ($e['reward_id'] == 1) {
                        echo $this->db_model->select('reward_name', 'reward_setting', array('id' => $e['reward_id']));
                    } elseif ($e['reward_id'] == 2) {
                        echo $this->db_model->select('reward_name', 'reward_setting', array('id' => $e['reward_id']));
                    } elseif ($e['reward_id'] == 3) {
                        echo $this->db_model->select('reward_name', 'reward_setting', array('id' => $e['reward_id']));
                    } elseif ($e['reward_id'] == 4) {
                        echo $this->db_model->select('reward_name', 'reward_setting', array('id' => $e['reward_id']));
                    } elseif ($e['reward_id'] == 5) {
                        echo $this->db_model->select('reward_name', 'reward_setting', array('id' => $e['reward_id']));
                    } else {
                        echo $e['reward_id'];
                    }
                    ?>
                </td>
                <td><?php echo $e['date']; ?></td>
                <td><?php echo ($e['paid_date'] == 0000 - 00 - 0) ? 'Not Paid Yet' : $e['paid_date'];  ?></td>
                <td><?php echo !empty($e['tid']) ? $e['tid'] : 'Not Paid Yet'; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>
</div>