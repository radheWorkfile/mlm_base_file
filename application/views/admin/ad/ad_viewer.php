<?php

/***************************************************************************************************
 * Copyright (c) 2020. by Camwel Corporate Solution PVT LTD
 * This project is developed and maintained by Camwel Corporate Solution PVT LTD.
 * Nobody is permitted to modify the source or any part of the project without permission.
 * Project Developer: Camwel Corporate Solution PVT LTD
 * Developed for: Camwel Corporate Solution PVT LTD
 **************************************************************************************************/
?>
<div class="row">
    <?php echo form_open('ads/achievers') ?>
    <div class="col-sm-6">
        <label>User ID</label>
        <input class="form-control" name="userid" type="text">
    </div>
    <div class="col-sm-6"><br />
        <input type="submit" class="btn btn-success" value="Search" onclick="this.value='Searching..'">
    </div>
    <?php echo form_close() ?>
</div>
<table id="example" class="table table-striped">
    <thead>
        <tr>
            <th>SN</th>
            <th>Ad Title</th>
            <th>Expiry Date</th>
            <th>User ID</th>
            <th>Viewed Date</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sn = 1;
        foreach ($ads as $e) {
            $data = $this->db_model->select_multi('ad_title, expiry_date', 'ads', array('id' => $e->ad_id));
        ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $data->ad_title; ?></td>
                <td><?php echo $data->expiry_date; ?></td>
                <td>
                    <a target="_blank" href="<?php echo site_url('users/user_detail/' . $e->userid) ?>"> <?php echo config_item('ID_EXT') . $e->userid; ?></a>
                </td>
                <td><?php echo date('d/m/Y : h:i A', $e->date); ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>
</div>