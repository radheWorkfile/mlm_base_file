<style>
    .btn-primary:hover {
    color: #ffffff;
    background-color: #100f0f;
    border-color: #131313;
}
</style>
<?php if (config_item('disable_registration') !== "Yes") { ?>
    <?php echo form_open() ?>
    <h1 align="center">Register Now !</h1>

    <div id="load" style="display:none !important;" align="center">
        <img src="<?php echo site_url('uploads/load.gif') ?>">
        <h3 style="color:lightseagreen">Registering...</h3>
    </div>


    <div class="container">

        <div class="row" id="form">
            <?php echo validation_errors('<div class="alert alert-danger">', '</div>') ?>
            <?php echo $this->session->flashdata('site_flash') ?>
            <div class="row">

                <div class="col-sm-5"></div>
                <div class="col-sm-4">
                    <h4 class="text-danger">Personal Information</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-7">
                    <div class="form-group col-sm-6">
                        <label for="name" class="control-label">Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo set_value('name') ?>" placeholder="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-7">
                    <div class="form-group col-sm-6">
                        <label for="phone" class="control-label">Phone No<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="<?php echo set_value('phone') ?>" id="phone" name="phone" placeholder="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-7">
                    <div class="form-group col-sm-6">
                        <label for="email" class="control-label">Email</label>
                        <input type="email" class="form-control" value="<?php echo set_value('email') ?>" id="email" name="email" placeholder="">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-5"></div>
                <div class="col-sm-4">
                    <h4 class="text-danger">Address</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-7">
                    <div class="form-group col-sm-6">
                        <label for="address_1" class="control-label">Address Line 1<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="<?php echo set_value('address_1') ?>" id="address_1" name="address_1">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-7">
                    <div class="form-group col-sm-6">
                        <label for="address_2" class="control-label">Address Line 2</label>
                        <input type="text" class="form-control" value="<?php echo set_value('address_2') ?>" id="address_2" name="address_2">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-5"></div>
                <div class="col-sm-4">
                    <h4 class="text-danger">Password</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-7">
                    <div class="form-group col-sm-6">
                        <label for="password" class="control-label">Password<span class="text-danger">*</span></label>
                        <input type="password" class="form-control" value="<?php echo set_value('password') ?>" id="password" name="password">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-7">
                    <div class="form-group col-sm-6">
                        <label for="password_2" class="control-label">Retype Password<span class="text-danger">*</span></label>
                        <input type="password" class="form-control" value="<?php echo set_value('password_2') ?>" id="password_2" name="password_2">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-5"></div>
                <div class="col-sm-4">
                    <h4 class="text-danger">Joining Information</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-7">
                    <div class="form-group col-sm-6">
                        <label for="sponsor" class="control-label">Sponsor ID<span class="text-danger">*</span></label>
                        <input type="text" onchange="get_user_name('#sponsor', '#spn_res')" class="form-control" value="<?php if ($this->uri->segment(3) !== "epin") {
                                                                                                                            $uri4 = $this->uri->segment(4);
                                                                                                                        };
                                                                                                                        echo set_value('sponsor', $uri4) ?>" id="sponsor" name="sponsor" placeholder="">
                        <span id="spn_res" style="color: red; font-weight: bold"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-7">
                    <?php if (config_item('leg') !== "1" && config_item('show_placement_id') == "Yes" && config_item('autopool_registration') == "No") { ?>
                        <div class="form-group col-sm-6">
                            <label for="position" class="control-label">Placement ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="psn_res" style="color: red; font-weight: bold"></span></label>
                            <input type="text" class="form-control" onchange="get_user_name('#position', '#psn_res')" id="position" value="<?php if ($this->uri->segment(3) !== "epin") {
                                                                                                                                                $uri4 = $this->uri->segment(4);
                                                                                                                                            };
                                                                                                                                            echo set_value('position', $uri4) ?>" name="position" id="position" placeholder="Where you want to place the ID">
                        </div>
                    <?php
                    } ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-7">
                    <?php if (config_item('leg') == "1") {
                        echo form_hidden('leg', 'A');
                    } else {
                        if (config_item('show_leg_choose') == "Yes" && config_item('autopool_registration') == "No") {
                    ?>
                            <div class="form-group col-sm-6">
                                <label for="leg" class="control-label">Position<span class="text-danger">*</span></label>
                                <select class="form-control" id="leg" name="leg">
                                    <option value="">Select One</option>
                                    <?php 
                                        $lg = '';
                                        if (trim($this->uri->segment(3)) !== "" && trim($this->uri->segment(3)) !== "epin") {
                                            $lg = trim($this->uri->segment(3));
                                        }
                                    ?>
                                    <?php foreach ($leg as $key => $val) { ?>
                                        <option value="<?php echo $key;?>"<?php echo ($lg == $key) ? "Selected": " "?>><?php echo $val;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                    <?php }
                    } ?>
                </div>
            </div>

            <!-- <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-7">
                    <?php //if (config_item('show_join_product') == "Yes") {
                    ?>
                        <div class="form-group col-sm-6">
                            <label for="product" class="control-label">Sign Up Product / Package</label>
                            <select class="form-control" id="product" name="product" >
                                <?php foreach ($products as $val) {
                                    echo '<option value="' . $val['id'] . '">' . $val['prod_name'] . '. Price :' . config_item('currency') . number_format($val['prod_price'] + ($val['prod_price'] * $val['gst'] / 100), 2) . ' </option>';
                                } ?>

                            </select>
                        </div>
                        <?php
                    //} ?>
                </div>
            </div> -->
            <input type="hidden" id="product" name="product" value="1">

            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-7">
                    <?php if (config_item('enable_epin') == "Yes" && config_item('free_registration') == "No") {
                    ?>
                        <div class="form-group col-sm-6" id="e_pin">
                            <label for="epin" class="control-label">e-PIN</label>
                            <input type="text" value="<?php if (trim($this->uri->segment(3)) == "epin") {
                                                            echo set_value('epin', $this->uri->segment(4));
                                                        } ?>" class="form-control" id="epin" name="epin">
                        </div>
                    <?php } ?>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-7">
                    <?php if (config_item('show_join_product') == "No" && config_item('free_registration') == "No") {
                    ?>
                        <div class="form-group col-sm-6" id="amt_to_pay">
                            <label for="amt_to_pay" class="control-label">Amount You Want to Pay ?</label>
                            <input type="text" required value="<?php echo set_value('amt_to_pay') ?>" class="form-control" id="amt_to_pay" name="amt_to_pay">
                        </div>
                    <?php } ?>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-7">
                    <?php if (config_item('enable_pg') == "Yes" && config_item('free_registration') == "No") {
                    ?>
                        <div class="form-group col-sm-6">
                            <label for="epin" class="control-label" style="color: #3a80d7">Payment Gateway</label><br />
                            <input type="checkbox" value="yes" id="pg" name="pg" onclick="toogle_div('#e_pin', '#pg')"> I'll Pay
                            Using
                            Payment
                            Gateway.
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-5"></div>
                <div class="col-sm-5">
                    <div class="form-group col-sm-6">
                        <button class="btn btn-primary btn-lg" type="submit" onclick="show()">Register</button>
                    </div>
                </div>
            </div>














        </div>
    </div>
<?php echo form_close();
} else {
    echo "<h3 align='center' style='margin: 10%'> Registration is disabled for maintanance. Please come later.</h3>";
} ?>
<script type="text/javascript">
    function toogle_div(id1, id2) {
        if ($(id2).prop("checked") == true) {
            $(id1).hide('slow');
        } else {
            $(id1).show('slow');
        }
    }

    function show() {
        $('#form').hide('slow');
        $('#load').show('slow');
    }

    function get_user_name(id, result) {
        var id = $(id).val();
        $.get("<?php echo site_url('site/get_user_name/') ?>" + id, function(data) {
            $(result).html(data);
        });
    }
</script>