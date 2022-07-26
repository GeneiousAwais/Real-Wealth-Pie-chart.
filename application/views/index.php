<!doctype html>
    <html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>

        <meta charset="utf-8" />
        <title>Life Wheel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- owl.carousel css -->
        <link rel="stylesheet" href="<?= base_url();?>assets/libs/owl.carousel/assets/owl.carousel.min.css">

        <link rel="stylesheet" href="<?= base_url();?>assets/libs/owl.carousel/assets/owl.theme.default.min.css">

        <!-- Bootstrap Css -->
        <link href="<?= base_url();?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?= base_url();?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?= base_url();?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <!-- hero section start -->
        <section class="section hero-section bg-ico-hero" id="home">
            <div class="bg-overlay bg-primary"></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="text-white-50">
                            <h1 class="text-white fw-semibold mb-3 hero-title">The Life Wheel</h1>
                            <p class="font-size-17">Complete your own Life Wheel to clarify how you are feeling about ten major areas of your life. It’s helpful to fill out a Life Wheel every 3–6 months to reflect on what is working and what might need your attention.</p>
                            
                            <div class="d-flex flex-wrap gap-2 mt-4">
                                <a href="<?= base_url('load-questionnaire');?>" class="btn btn-success">CREATE MY LIFE WHEEL</a>
                                <a href="javascript:void(0);" class="btn btn-light d-none">How it work</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-8 col-sm-10 ms-lg-auto">
                        <div class="card">
                            <img class="card-img-top img-fluid" src="assets/images/small/img-2.jpg" alt="Card image cap">
                            <div class="card-body d-none">
                                <p class="card-text">Some quick example text to build on the card title and make
                                    up the bulk of the card's content.</p>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
        <!-- hero section end -->
        
        <!-- currency price section start -->
        <section class="section bg-white p-0 d-none">
            <div class="container">
                <div class="currency-price">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h4 class="card-title mt-0 text-muted">The Life Wheel score greater than 75 </h4>
                                    <div class="d-flex">
                                        <div class="avatar-xs me-3">
                                            <span class="avatar-title rounded-circle bg-success bg-soft text-warning font-size-18">
                                                <i class="far fa-smile fa-2x text-success"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="text-muted">Satisfied </p>
                                            
                                            <h5><i class="fas fa-users"></i> <?= $satisfiedUser?></h5>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h4 class="card-title mt-0 text-muted">The Life Wheel score between 50 to 75 </h4>
                                    <div class="d-flex">
                                        <div class="avatar-xs me-3">
                                            <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                                <i class="fas fa-meh fa-2x text-primary"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="text-muted">Average </p>
                                            
                                            <h5><i class="fas fa-users"></i> <?= $averageUser?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h4 class="card-title mt-0 text-muted">The Life Wheel score Below 50</h4>
                                    <div class="d-flex">
                                        <div class="avatar-xs me-3">
                                            <span class="avatar-title rounded-circle bg-warning bg-soft text-info font-size-18">
                                                <i class="far fa-frown fa-2x text-warning"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="text-muted">Unsatisfied </p>
                                            
                                            <h5><i class="fas fa-users"></i> <?= $unsatisfiedUser?></h5>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div>
            <!-- end container -->
        </section>
        


<!-- JAVASCRIPT -->
<script src="<?= base_url();?>assets/libs/jquery/jquery.min.js"></script>
<script src="<?= base_url();?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url();?>assets/libs/metismenu/metisMenu.min.js"></script>
<script src="<?= base_url();?>assets/libs/simplebar/simplebar.min.js"></script>
<script src="<?= base_url();?>assets/libs/node-waves/waves.min.js"></script>
<script src="<?= base_url();?>assets/libs/jquery.easing/jquery.easing.min.js"></script>

<!-- Plugins js-->
<script src="<?= base_url();?>assets/libs/jquery-countdown/jquery.countdown.min.js"></script>

<!-- owl.carousel js -->
<script src="<?= base_url();?>assets/libs/owl.carousel/owl.carousel.min.js"></script>

<!-- ICO landing init -->
<script src="<?= base_url();?>assets/js/pages/ico-landing.init.js"></script>

<script src="<?= base_url();?>assets/js/app.js"></script>

</body>
</html>
