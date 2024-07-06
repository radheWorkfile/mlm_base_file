<style>
    .vertical {
            border-left: 3px solid #999595;
            height: 350px;
            position:absolute;
            left: 35%;
            top:35px;
            }
            .btn-primary:hover {
    color: #ffffff;
    background-color: #100f0f;
    border-color: #131313;
}
</style>
<?php echo form_open() ?>

<div class="container" align="center">
    <div class="row" >
        <?php echo validation_errors('<div class="alert alert-danger">', '</div>') ?>
        <?php echo $this->session->flashdata('site_flash') ?>
        <?php if (config_item('is_demo') == TRUE) {
            echo '<div class="alert alert-danger">Please Pay your remaining balance to remove this banner !<br/> इस बैनर को हटाने के
        लिए कृपया अपनी शेष राशि का भुगतान करें !</div>';
        } ?>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-5">
                <h2 >REGISTERED CUSTOMERS</h2><br>
                <p style="text-align:justify;margin-left:19px">If you have an account, sign in with your ID and Password.</p><br>
                <div class="form-group col-sm-12" style="max-width: 400px; text-align: left;">
                    <label for="user" class="control-label">ID / Username</label>
                    <input type="text" required class="form-control" id="user" name="username">
                </div>
                <div class="form-group col-sm-12" style="max-width: 400px; text-align: left;">
                    <label for="password" class="control-label">Password*</label>
                    <input type="password" required class="form-control" id="password" name="password">
                </div>
                <div class="form-group col-sm-12" style="max-width: 400px; text-align: left;">
                    <label for="password" class="control-label">captcha*: <span style="background: black; padding:10px; color:white; font-size:20px;"><?php $sign=($captcha['sign']=='*')?'X':$captcha['sign']; echo $captcha['n1'].'&nbsp;&nbsp;'.$sign.'&nbsp;&nbsp;'.$captcha['n2'];?></span> </label>
                    <input type="text" required class="form-control" id="captcha" name="captcha">
                    <input type="hidden" required class="form-control" id="captcha_word" name="captcha_word" value="<?php echo $captcha['captcha_word'];?>">
                </div>
                <div class="form-group col-sm-12" style="max-width: 400px; text-align: left;">
                    <button class="btn btn-success">Login</button>
                    <!-- <a href="<?php echo site_url('site/forgotpw') ?>">Forgot Password ?</a> -->
                </div>
            </div>
            <div id="" class="col-sm-1 site-header hidden-md hidden-sm hidden-xs main-sticky-header"> <div class="vertical"></div></div>
            <div class="col-sm-4">
                <h2>NEW CUSTOMERS</h2><br>
                <p style="text-align:justify;">New to Camwel Solution LLP? Create an account and be a part of our company, enjoy benefits and promotions</p><br>
                <a href="<?php //echo site_url('site/register') ?>" class="btn btn-lg btn-primary" style=" font-size:15px;">Create An Account </a>
                
                </div>
            </div>
        </div>
        <br>
    </div>
</div>
<?php echo form_close() ?>
