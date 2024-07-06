<div class="main">

    <!--login section start-->
    <section class="section py-0 " style="background: url('<?php echo base_url('axxets/site/assets/img/slider-img-3.jpg') ?>')no-repeat center bottom / cover">
        <section class="section section-lg section-header position-relative  flex-column d-flex justify-content-center bg-gradient-primary">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-md-7 col-lg-6">
                        <div class="hero-content-left text-white">
                            <h1 class="display-2">Don't Worry You Can Reset Password?</h1>
                            <p class="lead">
                                Keep your face always toward the sunshine - and shadows will fall behind you. Continually pursue fully researched niches whereas timely platforms.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-5">
                        <div class="card login-signup-card shadow-lg mb-0">
                            <div class="card-body px-md-5 py-5">
                                <div class="mb-5">
                                    <h3>Password Reset</h3>
                                    <p class="text-muted">Enter your email to get a password reset link.</p>
                                </div>

                                <!--login form-->
                                <?php echo form_open() ?>
                                <!-- Password -->
                                <div class="form-group">
                                    <label class="font-weight-bold">ID / Username <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-icon">
                                            <i class="ti-user"></i>
                                        </div>
                                        <input type="text" class="form-control" id="user" name="user">
                                    </div>
                                </div>

                                <!-- Submit -->
                                <button class="btn btn-block btn-secondary mt-4 mb-3">Reset Password</button>

                                <div class="text-center">
                                    <p class="font-small"> .</p>
                                </div>

                                <?php echo form_close() ?>
                            </div>
                            <div class="card-footer bg-soft text-center border-top px-md-5"><small>Remember your password?</small>
                                <a href="<?php echo site_url('site/login') ?>" class="small">Want to Login ?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <!--login section end-->


</div>
