<!-- MLM_ddd_LAB_ -->
<!doctype html>
<html lang="en" itemscope itemtype="javaScript:void(0);">
<meta http-equiv="content-type" content="" />

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="">
    <title>Camwel Solution || Sign Up </title>
    <meta name="title" Content="">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <?php include('include/css.php'); ?>
</head>

<body>
    <?php include('include/header.php'); ?>

    <section class="page-header bg_img" data-background="<?php echo base_url(); ?>assets/images/frontend/breadcrumb/63821bed5b0bb1669471213.jpg">
        <div class="container">
            <div class="page-header-wrapper">
                <h2 class="title">Sign Up</h2>
                <ul class="breadcrumb">
                    <li>
                        <a href="https://script.viserlab.com/mlmlab">
                            Home </a>
                    </li>
                    <li>Sign Up</li>
                </ul>
            </div>
        </div>
    </section>


    <?php if (config_item('disable_registration') !== "Yes") { ?>
        <?php echo form_open() ?>

        <div id="load" style="display:none !important;" align="center">
            <img src="<?php echo site_url('uploads/load.gif') ?>">
            <h3 style="color:lightseagreen">Registering...</h3>
        </div>


        <section class="contact-section pt-5 padding-bottom">
            <div class="container">
                <div class="row" id="form">

                    <div class="col-lg-5 d-none d-lg-block">
                        <img class="wow slideInRight" src="<?php echo base_url(); ?>assets/img/register_img.png" alt="contact">
                    </div>

                    <div class="col-lg-7">
                        <?php echo validation_errors('<div class="alert alert-danger">', '</div>') ?>
                        <?php echo $this->session->flashdata('site_flash') ?>

                        <div class="contact-form-wrapper rounded bg-white shadow-sm">
                            <div class="section-header left-style mb-4">
                                <h2 class="title mb-4">Registration Form</h2>
                                <p style="text-align:justify;">Sign up now to access exclusive benefits and join our community dedicated to innovation and growth.</p>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" id="name" name="name" value="<?php echo set_value('name') ?>">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label class="form-label" for="name">Mobile Number</label>
                                    <input type="number" value="<?php echo set_value('phone') ?>" id="phone" name="phone" required>
                                </div>


                                <div class="col-lg-12 form-group">
                                    <label class="form-label" for="name">Email</label>
                                    <input value="<?php echo set_value('email') ?>" id="email" name="email" type="email" required>
                                </div>

                                <div class="col-lg-12 form-group">
                                    <label class="form-label" for="name">Address</label>
                                    <textarea id="address_1" name="address_1" rows="2" required></textarea>
                                </div>

                                <div class="col-lg-12 form-group">
                                    <label class="form-label" for="name">Address Line 2</label>
                                    <textarea value="<?php echo set_value('address_2') ?>" id="address_2" name="address_2" rows="2" required></textarea>
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label class="form-label" for="name">Password</label>
                                    <input type="password" value="<?php echo set_value('password') ?>" id="password" name="password">
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label class="form-label" for="name">Match Password </label>
                                    <input type="password" value="<?php echo set_value('password_2') ?>" id="password_2" name="password_2">
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4 class="text-danger">Joining Information</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group col-sm-12">
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
                                    <div class="col-sm-12">
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
                                    <div class="col-sm-12">
                                        <?php if (config_item('leg') == "1") {
                                            echo form_hidden('leg', 'A');
                                        } else {
                                            if (config_item('show_leg_choose') == "Yes" && config_item('autopool_registration') == "No") {
                                        ?>
                                                <div class="form-group col-sm-12">
                                                    <label for="leg" class="control-label">Position11<span class="text-danger">*</span></label>
                                                    <select class="form-control" id="leg" name="leg">
                                                        <option value="">Select One</option>
                                                        <?php
                                                        $lg = '';
                                                        if (trim($this->uri->segment(3)) !== "" && trim($this->uri->segment(3)) !== "epin") {
                                                            $lg = trim($this->uri->segment(3));
                                                        }
                                                        ?>
                                                        <?php foreach ($leg as $key => $val) { ?>
                                                            <option value="<?php echo $key; ?>" <?php echo ($lg == $key) ? "Selected" : " " ?>><?php echo $val; ?></option>
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
                        //} 
                        ?>
                </div>
            </div> -->
                                <input type="hidden" id="product" name="product" value="1">

                                <div class="row">
                                    <div class="col-sm-12">
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
                                    <div class="col-sm-12">
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
                                    <div class="col-sm-12">
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





                                <div class="col-lg-12 form-group">
                                    <button class="btn btn-primary btn-lg" type="submit" onclick="show()">Register</button>
                                </div>
                            </div>
                            <div class="">
                                <span>if your have an Account</span>
                                <span onclick="document.getElementById('id01').style.display='block'" style="float:right;color:#0f1932;"><strong>Login</strong>&nbsp;&nbsp;&nbsp;</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>



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
    <?php include('include/login.php'); ?>
    <?php include('include/footer.php'); ?>
    <?php include('include/js.php'); ?>
</body>

</html>