<?php

/***************************************************************************************************
 * Copyright (c) 2020. by Camwel Corporate Solution PVT LTD
 * This project is developed and maintained by Camwel Corporate Solution PVT LTD.
 * Nobody is permitted to modify the source or any part of the project without permission.
 * Project Developer: Bidush Sarkar
 * Developed for: Camwel Corporate Solution PVT LTD
 **************************************************************************************************/

$top_id = $this->uri->segment('3') ? $this->uri->segment('3') : config_item('top_id');

?>
<!-- 
<div class="row col-md-offset-2">
    <div class="col-sm-5">
        <form method="post" action="<?php echo site_url('tree/referred-list') ?>">
            <label>Enter User Id</label>
            <input type="text" name="top_id" class="form-control">
            <button class="btn btn-xs btn-danger" type="submit">Search</button>
        </form>
    </div>
    <hr />
</div> -->
<table id="example" class="table table-striped">
    <thead>
        <tr>
            <th>S.N.</th>
            <th>Name</th>
            <th>Join Date</th>
            <th>Total Downline</th>
            <th>Sponsor</th>
        </tr>
    </thead>
    <tbody>
        <?php $this->plan_model->ref_list($top_id) ?>
    </tbody>
</table>