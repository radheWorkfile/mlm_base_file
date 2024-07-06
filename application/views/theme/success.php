
<style>
    .btn-primary:hover {
    color: #ffffff;
    background-color: #100f0f;
    border-color: #131313;
}
</style>
<div class="main">
    <h1 class="text-center">Registration is Completed !</h1>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <h2><?php echo $this->session->flashdata('site_flash') ?></h2>
            <p class="lead">Dear <?php echo $this->session->_user_name_ ?>,<br/>
            congratulation on your first step towards a rewarding career. We <?php echo config_item('company_name') ?> team
            cordially invite you to our home, where we make friends to earn and learn together. Below is your detail of
            Registration.</p>
            <div class="mb-5">
                <strong>Sponsor ID :</strong> <?php echo config_item('ID_EXT') . $this->session->_sponsor_ ?><br/>
                <strong>User ID :</strong> <?php echo config_item('ID_EXT') . $this->session->_user_id_ ?><br/>
                <strong>Password :</strong> (<em>You have entered already.</em>)
            </div>
            <br>
            <a href="<?php echo site_url('site/register') ?>" class="btn btn-primary btn-lg" id="submit-footer">Register Another</a>
        </div>
    </div>
        <!--404 section start--
        <section class="section py-0 position-relative" style="background: url('assets/img/slider-img-5.jpg')no-repeat center center / cover">
            <div class="section-lg bg-gradient-primary min-vh-100 d-flex align-items-center w-100">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-8">
                            
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-5 col-lg-5">
                            <form action="#" method="post" class="subscribe-form position-relative d-none d-md-block d-lg-block">
                                <div class="d-flex align-items-center">
                                    
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        !--404 section end-->

    </div>