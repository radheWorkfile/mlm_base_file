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
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <h3>Submit Date: <?php echo date('d/m/Y h:i A', $data->date) ?></h3>
        <table class="table" style="max-width: 600px; background-color: #fff; border-bottom: 0 none;
	box-shadow: 0 1px 5px rgba(0, 0, 0, 0.46);">
            <tr>
                <td>
                    <?php
                    $data = unserialize($data->data);
                    foreach ($data as $e => $v) {
                        echo '<div class="col-sm-12"><h4 class="alert alert-warning">' . $e . '</h4>';
                        echo '<strong>Your Answer: </strong><br/>';
                        echo $v;
                        echo '</div>';
                    }
                    ?>

                </td>
            </tr>
        </table>
    </div>
    <div class="col-sm-2"></div>
</div>