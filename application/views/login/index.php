<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="author" content="PIXINVENT">
	<title>Login Page</title>
	<link rel="apple-touch-icon" href="<?= ASSETS_ROOT ?>images/ico/apple-icon-120.png">
	<link rel="shortcut icon" type="image/x-icon" href="<?= ASSETS_ROOT ?>images/ico/favicon.ico">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

	<!-- BEGIN: Vendor CSS-->
	<link rel="stylesheet" type="text/css" href="<?= ASSETS_ROOT ?>vendors/css/vendors.min.css">

	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_ROOT ?>vendors/css/extensions/toastr.min.css">
	<!-- END: Vendor CSS-->

	<!-- BEGIN: Theme CSS-->
	<link rel="stylesheet" type="text/css" href="<?= ASSETS_ROOT ?>css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?= ASSETS_ROOT ?>css/bootstrap-extended.css">
	<link rel="stylesheet" type="text/css" href="<?= ASSETS_ROOT ?>css/colors.css">
	<link rel="stylesheet" type="text/css" href="<?= ASSETS_ROOT ?>css/components.css">
	<link rel="stylesheet" type="text/css" href="<?= ASSETS_ROOT ?>css/themes/dark-layout.css">
	<link rel="stylesheet" type="text/css" href="<?= ASSETS_ROOT ?>css/themes/bordered-layout.css">
	<link rel="stylesheet" type="text/css" href="<?= ASSETS_ROOT ?>css/themes/semi-dark-layout.css">

	<!-- BEGIN: Page CSS-->
	<link rel="stylesheet" type="text/css" href="<?= ASSETS_ROOT ?>css/core/menu/menu-types/horizontal-menu.css">
	<link rel="stylesheet" type="text/css" href="<?= ASSETS_ROOT ?>css/plugins/forms/form-validation.css">
	<link rel="stylesheet" type="text/css" href="<?= ASSETS_ROOT ?>css/pages/page-auth.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_ROOT ?>css/plugins/extensions/ext-component-toastr.css">
	<!-- END: Page CSS-->

	<!-- BEGIN: Custom CSS-->
	<!-- <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css"> -->
	<!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu blank-page navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="blank-page">
	<!-- BEGIN: Content-->
	<div class="app-content content ">
		<div class="content-overlay"></div>
		<div class="header-navbar-shadow"></div>
		<div class="content-wrapper">
			<div class="content-header row">
			</div>
			<div class="content-body">
				<div class="auth-wrapper auth-v1 px-2">
					<div class="auth-inner py-2">
						<!-- Register v1 -->
						<div class="card mb-0">
							<div class="card-body">


								<a href="javascript:void(0);" class="brand-logo">
									<img src="<?= ASSETS_ROOT ?>images/custom/logo.png" width="200" class="d-flex justify-content-center">
								</a>

								<h4 class="card-title mb-1">LOGIN</h4>
								<p class="card-text mb-2">Login to start your session</p>

								<form class="auth-register-form mt-2">
									<div class="form-group">
										<label for="username" class="form-label">Username</label>
										<input type="text" class="form-control" id="username" name="username" placeholder="john@example.com" aria-describedby="register-email" tabindex="2" />
									</div>
									<div class="form-group">
										<div class="d-flex justify-content-between">
											<label for="password" class="form-label">Password</label>
										</div>
										<div class="input-group input-group-merge form-password-toggle">
											<input type="password" class="form-control form-control-merge" id="password" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="register-password" tabindex="3" />
											<div class="input-group-append">
												<span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input" type="checkbox" id="register-privacy-policy" tabindex="4" />
											<label class="custom-control-label" for="register-privacy-policy">
												Remember me
											</label>
										</div>
									</div>
									<button class="btn btn-primary btn-block save" tabindex="5">Login</button>
								</form>


							</div>
						</div>
						<!-- /Register v1 -->
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- END: Content-->


	<!-- BEGIN: Vendor JS-->
	<script src="<?= ASSETS_ROOT ?>vendors/js/vendors.min.js"></script>
	<!-- BEGIN Vendor JS-->

	<!-- BEGIN: Page Vendor JS-->
	<script src="<?= ASSETS_ROOT ?>vendors/js/ui/jquery.sticky.js"></script>
	<script src="<?= ASSETS_ROOT ?>vendors/js/forms/validation/jquery.validate.min.js"></script>
	<!-- END: Page Vendor JS-->

	<!-- BEGIN: Theme JS-->
	<script src="<?= ASSETS_ROOT ?>js/core/app-menu.js"></script>
	<script src="<?= ASSETS_ROOT ?>js/core/app.js"></script>
	<!-- END: Theme JS-->


	<script src="<?php echo ASSETS_ROOT ?>vendors/js/extensions/toastr.min.js"></script>

	<!-- BEGIN: Page JS-->
	<!-- <script src="<?= ASSETS_ROOT ?>js/scripts/pages/page-auth-register.js"></script> -->
	<!-- END: Page JS-->

	<script>
		$(window).on('load', function() {
			if (feather) {
				feather.replace({
					width: 14,
					height: 14
				});
			}
		})

		$(function() {
			'use strict';

			var page = $('.auth-register-form');

			// jQuery Validation
			// --------------------------------------------------------------------
			if (page.length) {
				page.validate({

					onkeyup: function(element) {
						$(element).valid();
					},
					rules: {
						'username': {
							required: true,
						},
						'password': {
							required: true,
							minlength: 6
						}
					},
					messages: {
						'username': {
							required: 'username tidak boleh kosong'
						},
						'password': {
							required: 'Password tidak boleh kosong',
							minlength: jQuery.validator.format("Password harus memiliki minimal {0} karakter")
						}
					},

					submitHandler: function(page) {
						$.ajax({
							url: "<?php echo base_url('backend/login/login_proccess') ?>",
							type: "POST",
							data: $(page).serialize(),
							dataType: "json",
							beforeSend: function() {
								$('.save').attr('disable', 'disabled');
								$('.save').html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> <span class = "ml-25 align-middle" > Loading... </span>');
							},
							complete: function() {
								$('.save').removeAttr('disable');
								$('.save').html('Login');
							},
							success: function(data) {
								if (data.error == false) {
									toastr.success(data.msg, 'Success!', {
										closeButton: true,
										progressBar: true,
										tapToDismiss: false
									})
									window.location.href = '<?php echo base_url('backend/dashboard') ?>';

								} else {
									toastr.error(data.msg, 'Error!', {
										progressBar: true,
										allowHtml: true,
										closeButton: true,
										tapToDismiss: false
									});
								}
							},
						});
					}
				});


			}
			// end validation

		});
	</script>
</body>
<!-- END: Body-->

</html>
