<?php

/***************************************************************************************************
 * Copyright (c) 2020. by Codepeople India
 * This project is developed and maintained by Codepeople India.
 * Nobody is permitted to modify the source or any part of the project without permission.
 * Project Developer: Bidush Sarkar
 * Developed for: Codepeople India
 **************************************************************************************************/
?>
<table  id="example" class="table table-striped">
    <thead>
        <tr>
            <th>SN</th>
            <th>Epin</th>
            <th>Amount</th>
            <th>Issue To</th>
            <th>Date</th>
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
                <td>₹ <?php echo number_format($e['amount'], 2); ?></td>
                <td><?php echo config_item('ID_EXT') . $e['issue_to']; ?></td>
                <td><?php echo date('d-M-Y', strtotime($e['generate_time'])); ?></td>
                <!-- <td>
                    <a onclick="return confirm('Are you sure you want to delete this epin ?')"
                       href="<?php echo site_url('admin/epin/remove/' . $e['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
                </td> -->
            </tr>
        <?php } ?>
    </tbody>
</table>
<!-----<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>
</div>---->

