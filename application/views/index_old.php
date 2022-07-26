<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Life wheel</title>
	<link rel="shortcut icon" href="<?= base_url();?>assets/images/favicon.ico">
	<link href="<?= base_url();?>assets/libs/bootstrap-rating/bootstrap-rating.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url();?>assets/css/app.min.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url();?>assets/css/custom.css" rel="stylesheet" type="text/css" />
</head>

<body data-topbar="dark" data-layout="horizontal">
	<div id="layout-wrapper">

		<header id="page-topbar">
			<div class="navbar-header">
				<div class="d-flex">
					<div class="navbar-brand-box">
						<a href="<?= base_url();?>" class="logo logo-dark">
							<span class="logo-sm">
								<img src="<?= base_url();?>assets/images/logo2.svg" alt="" height="22">
							</span>
							<span class="logo-lg">
								<img src="<?= base_url();?>assets/images/logo2.svg" alt="" height="17">
							</span>
						</a>

						<a href="<?= base_url();?>" class="logo logo-light">
							<span class="logo-sm">
								<img src="<?= base_url();?>assets/images/logo2.svg" alt="" height="22">
							</span>
							<span class="logo-lg">
								<img src="<?= base_url();?>assets/images/logo2.svg" alt="" height="19">
							</span>
						</a>
					</div>
				</div>
			</div>
		</header>

		<div class="main-content">
			<div class="page-content">
				<div class="container-fluid">

					<div class="row <?= isset($questions) ? 'd-none' : ''?>">
						<div class="col-sm-12">
							<div class="welcome-container">
								<h6>You will be presented with a series of 10 statements.<br />
									For each statement,<br />
									rank your Life on a scale of 1 to 10 where 1 is weak and 10 is strong.
								</h6>
								<a class="btn btn-secondary waves-effect waves-light" href="<?= base_url('load-questionnaire');?>">Begin your checkup <em class="fa fa-arrow-right"></em></a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-6">
							<script>document.write(new Date().getFullYear())</script> © RealWealth, Inc..
						</div>
						<div class="col-sm-6">
							<div class="text-sm-end d-none d-sm-block">
								Design & Develop by RealWealth
							</div>
						</div>
					</div>
				</div>
			</footer>

		</div>
	</div>

	<script src="<?= base_url();?>assets/libs/jquery/jquery.min.js"></script>
	<script src="<?= base_url();?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url();?>assets/libs/bootstrap-rating/bootstrap-rating.min.js"></script>

	<script>
        // $(document).ready(function() {
        //     function disableBack() {
        //         window.history.forward()
        //     }
        //     window.onload = disableBack();
        //     window.onpageshow = function(e) {
        //         if (e.persisted)
        //             disableBack();
        //     }
        // });

        $(document).ready(function() {
			window.history.pushState(null, "", window.location.href);        
			window.onpopstate = function() {
				window.history.pushState(null, "", window.location.href);
			};
		});
		
    </script>

</body>
</html>

