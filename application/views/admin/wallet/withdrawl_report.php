<?php

/***************************************************************************************************
 * Copyright (c) 2020. by Camwel Corporate Solution PVT LTD
 * This project is developed and maintained by Camwel Corporate Solution PVT LTD.
 * Nobody is permitted to modify the source or any part of the project without permission.
 * Project Developer: Bidush Sarkar
 * Developed for: Camwel Corporate Solution PVT LTD
 **************************************************************************************************/

$top_id = $this->uri->segment('3') ? $this->uri->segment('3') : config_item('top_id');
$status = $this->uri->segment('4') ? $this->uri->segment('4') : '';
$sdate  = $this->uri->segment('5') ? $this->uri->segment('5') : '';
$edate  = $this->uri->segment('6') ? $this->uri->segment('6') : '';
$this->db->where('userid', htmlentities($top_id));
if ($status !== "") {
    $this->db->where('status', $status);
}
if ($sdate !== "") {
    $this->db->where('date >=', $sdate);
}
if ($edate !== "") {
    $this->db->where('date <=', $edate);
}

$this->db->limit(100);
$data = $this->db->get('withdraw_request')->result();
?>
<div class="row">
    <form method="post" action="">
        <div class="col-sm-6">
            <label>Enter User Id</label>
            <input type="text" required name="top_id" class="form-control">
        </div>
        <div class="col-sm-6">
            <label>Status</label>
            <select name="status" class="form-control">
                <option selected>Paid</option>
                <option>Un-Paid</option>
                <option>Hold</option>
            </select>
        </div>
        <div class="col-sm-6">
            <label>Start Date</label>
            <input type="text" readonly class="form-control datepicker" name="sdate">
        </div>
        <div class="col-sm-6">
            <label>End Date</label>
            <input type="text" readonly class="form-control datepicker" name="edate">
            <br />
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>
</div>
<hr />
<table id="example" class="table table-striped">
    <thead>
        <tr>
            <th>S.N.</th>
            <th>User ID</th>
            <th>Amount</th>
            <th>Tax Deducted</th>
            <th>Date</th>
            <th>Status</th>
            <th>Transaction Detail</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sn = 1;
        foreach ($data as $e) {

        ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e->userid ?></td>
                <td><?php echo config_item('currency') . $e->amount ?></td>
                <td><?php echo config_item('currency') . $e->tax ?></td>
                <td><?php echo $e->date ?></td>
                <td><?php echo $e->status ?></td>
                <td><?php echo $e->tid ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>