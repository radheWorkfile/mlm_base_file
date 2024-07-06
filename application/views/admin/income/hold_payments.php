<?php

/***************************************************************************************************
 * Copyright (c) 2020. by Camwel Corporate Solution PVT LTD
 * This project is developed and maintained by Camwel Corporate Solution PVT LTD.
 * Nobody is permitted to modify the source or any part of the project without permission.
 * Project Developer: Camwel Corporate Solution PVT LTD
 * Developed for: Camwel Corporate Solution PVT LTD
 **************************************************************************************************/

$this->db->where('status', 'Hold');
$data = $this->db->get('withdraw_request')->result();
?>
<hr />
<table id="example" class="table table-striped">
    <thead>
        <tr>
            <th>S.N.</th>
            <th>User ID</th>
            <th>Amount</th>
            <th>Admin (%)</th>
            <th>Tax (%)</th>
            <th>Net Payable</th>
            <th>Date</th>
            <th>Account Detail</th>
            <th>#</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sn = 1;
        foreach ($data as $e) {
            $tax = config_item('payout_tax') + config_item('payout_admin_tax');
        ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo config_item('ID_EXT') . $e->userid ?></td>
                <td><?php echo config_item('currency') . $e->amount ?></td>
                <td><?php echo config_item('payout_tax') ?> %</td>
                <td><?php echo config_item('payout_admin_tax') ?> %</td>
                <td><?php echo config_item('currency') . ($e->amount - ($e->amount * $tax / 100)) ?></td>
                <td><?php echo $e->date ?></td>
                <td style="font-size:12px;">
                    <?php
                    echo $this->db_model->select('name', 'member', array('id' => $e->userid)) . "<br/>";
                    $data = $this->db_model->select_multi('bank_ac_no, bank_name, bank_ifsc, bank_branch, btc_address, tcc_address', 'member_profile', array('userid' => $e->userid));
                    echo $data->bank_name ? '<strong>Bank Name:</strong> ' . $data->bank_name . '<br/>' : '';
                    echo $data->bank_ac_no ? '<strong>A/C No:</strong> ' . $data->bank_ac_no . '<br/>' : '';
                    echo $data->bank_ifsc ? '<strong>IFSC:</strong> ' . $data->bank_ifsc . '<br/>' : '';
                    echo $data->bank_branch ? '<strong>Bank Branch:</strong> ' . $data->bank_branch . '<br/>' : '';
                    echo $data->btc_address ? '<strong>BTC Add:</strong> ' . $data->btc_address . '<br/>' : '';
                    echo $data->tcc_address ? '<strong>TCC Add:</strong> ' . $data->tcc_address . '<br/>' : '';
                    ?>
                </td>
                <td><a data-toggle="modal" data-target="#myModal" onclick="document.getElementById('payid').value='<?php echo $e->id ?>'" class="btn btn-primary btn-xs">Pay</a>
                    <a href="<?php echo site_url('income/unhold/' . $e->id) ?>" class="btn btn-success btn-xs">Un-Hold</a>
                    <a href="<?php echo site_url('income/remove/' . $e->id) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure want to delete this payout ?')">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Payout Detail</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('income/pay') ?>
                <label>Enter Transaction Detail</label>
                <input type="hidden" name="payid" value="" id="payid">
                <textarea class="form-control" name="tdetail"></textarea>
                <div class="pull-right">
                    <button type="submit" class="btn btn-success">Pay Now</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>