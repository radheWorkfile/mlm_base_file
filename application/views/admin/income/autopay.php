<?php
/***************************************************************************************************
 * Copyright (c) 2020. by Camwel Corporate Solution PVT LTD
 * This project is developed and maintained by Camwel Corporate Solution PVT LTD.
 * Nobody is permitted to modify the source or any part of the project without permission.
 * Project Developer: Camwel Corporate Solution PVT LTD
 * Developed for: Camwel Corporate Solution PVT LTD
 **************************************************************************************************/
?>
<div class="panel panel-warning">
    <div class="panel-heading">Confirmation !</div>
    <div class="panel-body">
        <p>If you click on confirm and proceed button, <strong><?php echo config_item('payment_api') ?></strong> gateway
            will be
            used to process all your payments. If your Company Account has enough fund, then The funds will be used to
            pay for user earning and will auto debit from your company account and will auto credit to user account.
        </p>
        <table class="table-striped table" style="max-width: 350px">
            <tr>
                <td>Total Payable Balance:</td>
                <td><?php echo config_item('currency') . $payable_balance ?></td>
            </tr>
        </table>

        <a href="<?php echo site_url('income/payall_gateway/accept') ?>"
           onclick="return confirm('Are you sure ? This cannot be reversed.')" class="btn btn-primary">Confirm
            and Proceed &rarr;</a>
    </div>
</div>