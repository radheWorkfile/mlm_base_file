<?php

/***************************************************************************************************
 * Copyright (c) 2020. by Camwel Corporate Solution PVT LTD
 * This project is developed and maintained by Camwel Corporate Solution PVT LTD.
 * Nobody is permitted to modify the source or any part of the project without permission.
 * Project Developer: Camwel Corporate Solution PVT LTD
 * Developed for: Camwel Corporate Solution PVT LTD
 **************************************************************************************************/
?>
<form action="<?php echo base_url() ?>wallet/verify" method="post">
    <div class="col-sm-7 col-md-offset-2" style="text-align: center">

        <label>Enter Transection Pin:</label>
        <input type="password" name="transection_password"  class="form-control"><br />
        <input type="hidden" name="balance" required value="<?php echo $balan; ?>"><br/><br>
        <button class="btn btn-success" name="submit">Verify</button>
    </div>
</form>