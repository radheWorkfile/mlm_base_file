<?php

/***************************************************************************************************
 * Copyright (c) 2020. by Camwel Corporate Solution PVT LTD
 * This project is developed and maintained by Camwel Corporate Solution PVT LTD.
 * Nobody is permitted to modify the source or any part of the project without permission.
 * Project Developer: Camwel Corporate Solution PVT LTD
 * Developed for: Camwel Corporate Solution PVT LTD
 **************************************************************************************************/

$top_id = $this->uri->segment('3') ? $this->uri->segment('3') : config_item('top_id');
$sdate  = $this->uri->segment('5') ? $this->uri->segment('5') : '';
$edate  = $this->uri->segment('6') ? $this->uri->segment('6') : '';
$this->db->where('userid', htmlentities($top_id));
if ($sdate !== "") {
    $this->db->where('date >=', $sdate);
}
if ($edate !== "") {
    $this->db->where('date <=', $edate);
}
$this->db->limit(100);
$data = $this->db->get('tax_report')->result();
?>
<div class="row">
    <form method="post" action="">
        <div class="col-sm-6">
            <label>Enter User Id</label>
            <input type="text" required name="top_id" class="form-control">
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
            <th>Payout Amount</th>
            <th>Tax</th>
            <th>Net Paid</th>
            <th>Tax (%)</th>
            <th>Date</th>
            <th>#</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sn = 1;
        foreach ($data as $e) { $amt =$this->db->select('amount')->where('id',$e->payout_id)->get('withdraw_request')->row_array();
        ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e->userid ?></td>
                <td><?php echo config_item('currency') .  $amt['amount'] ?></td>
                <td><?php echo config_item('currency') . $e->tax_amount ?></td>
                <td><?php echo config_item('currency') . $e->amount ?></td>
                <td><?php echo $e->tax_percnt ?></td>
                <td><?php echo $e->date ?></td>
                <td>

                    <a href="<?php echo site_url('income/tax-remove/' . $e->id) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure want to delete this record ?')">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>