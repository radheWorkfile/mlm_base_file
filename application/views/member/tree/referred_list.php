<?php

/***************************************************************************************************
 * Copyright (c) 2020. by Camwel Corporate Solution PVT LTD
 * This project is developed and maintained by Camwel Corporate Solution PVT LTD.
 * Nobody is permitted to modify the source or any part of the project without permission.
 * Project Developer: Camwel Corporate Solution PVT LTD
 * Developed for: Camwel Corporate Solution PVT LTD
 **************************************************************************************************/

$top_id = $this->session->user_id;
$this->db->select('id, name, phone, join_time, topup, total_a, rank, total_b, total_c, total_d, total_e')->from('member')
    ->where(array('sponsor' => htmlentities($top_id)));
$data = $this->db->get()->result();
?>
<table id="example" class="table table-striped">
    <thead>
        <tr>
            <th>S.N.</th>
            <th>Name</th>
            <?php if (config_item('enable_investment') == "Yes") { ?>
                <th>My Investment</th>
            <?php } ?>
            <th>Join Date</th>
            <th>Total Downline</th>
            <th>Rank</th>
        </tr>
    </thead>
    <tbody>
        <?php $sn = 1;foreach ($data as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e->name ?></td>
                <?php if (config_item('enable_investment') == "Yes") {
                    echo "<td>" . config_item('currency') . $e->topup . "</td>";
                } ?>
                <td><?php echo $e->join_time ?></td>
                <td><?php echo ($e->total_a + $e->total_b + $e->total_c + $e->total_d + $e->total_e) ?></td>
                <td><?php echo $e->rank ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>