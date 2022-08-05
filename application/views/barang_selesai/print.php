<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
	<title>Report</title>
	<link rel="apple-touch-icon" href="<?= ASSETS_ROOT ?>images/ico/apple-icon-120.png">
	<link rel="shortcut icon" type="image/x-icon" href="<?= ASSETS_ROOT ?>images/ico/favicon.ico">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

	<!-- BEGIN: Vendor CSS-->
	<link rel="stylesheet" type="text/css" href="<?= ASSETS_ROOT ?>vendors/css/vendors.min.css">
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
	<link rel="stylesheet" type="text/css" href="<?= ASSETS_ROOT ?>css/core/menu/menu-types/vertical-menu.css">
	<link rel="stylesheet" type="text/css" href="<?= ASSETS_ROOT ?>css/pages/app-invoice-print.css">
	<!-- END: Page CSS-->

	<!-- BEGIN: Custom CSS-->
	<link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
	<!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
	<!-- BEGIN: Content-->
	<div class="app-content content ">
		<div class="content-overlay"></div>
		<div class="header-navbar-shadow"></div>
		<div class="content-wrapper">
			<div class="content-header row">
			</div>
			<div class="content-body">
				<div class="invoice-print p-3">
					<div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
						<div>
							<div class="logo-wrapper">
								<img src="<?= ASSETS_ROOT . 'images/custom/logo.png' ?>" width="130">
								<h3 class="text-primary invoice-logo">PT Pratama Abadi Industri</h3>
							</div>
							<p class="card-text mb-25">Jl. Raya Serpong Km 7 Pakualam Serpong Tangerang Selatan</p>
							<p class="card-text mb-25">Kota Tangerang Selatan , Banten</p>
						</div>
						<div class="mt-md-0 mt-2">
							<h4 class="invoice-title">
							</h4>
							<div class="invoice-date-wrapper">
								<p class="invoice-date-title">PO No</p>
								<p class="invoice-date"><?= $all_data->po_no ?></p>
							</div>
							<div class="invoice-date-wrapper">
								<p class="invoice-date-title">PO Date</p>
								<p class="invoice-date"><?= $all_data->po_date ?></p>
							</div>
						</div>
					</div>
				</div>
				<hr class="invoice-spacing" />


				<!-- Invoice Description starts -->
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th class="py-1">Nomor PO</th>
								<th class="py-1">Style No</th>
								<th class="py-1">Barang</th>
								<th class="py-1">Tanggal PO</th>
								<th class="py-1">TOT</th>
								<th class="py-1">Remark</th>
								<th class="py-1">Grade</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="py-1">
									<span class="font-weight-bold"><?= $all_data->po_no ?></span>
								</td>
								<td class="py-1">
									<span class="font-weight-bold"><?= $all_data->style_no ?></span>
								</td>
								<td class="py-1">
								<span class="font-weight-bold"><?= $all_data->barang ?></span>
								</td>
								<td class="py-1">
									<span class="font-weight-bold"><?= $all_data->po_date ?></span>
								</td>
								<td class="py-1">
									<span class="font-weight-bold"><?= $all_data->tot ?></span>
								</td>
								<td class="py-1">
									<span class="font-weight-bold"><?= $all_data->remark ?></span>
								</td>
								<td class="py-1">
									<span class="font-weight-bold"><?= $all_data->grade ?></span>
								</td>
							</tr>
						</tbody>
					</table>
				</div>


				<hr class="invoice-spacing" />
			</div>
		</div>
	</div>
	<!-- END: Content-->


	<!-- BEGIN: Vendor JS-->
	<script src="<?= ASSETS_ROOT ?>vendors/js/vendors.min.js"></script>
	<!-- BEGIN Vendor JS-->

	<!-- BEGIN: Page Vendor JS-->
	<!-- END: Page Vendor JS-->

	<!-- BEGIN: Theme JS-->
	<script src="<?= ASSETS_ROOT ?>js/core/app-menu.js"></script>
	<script src="<?= ASSETS_ROOT ?>js/core/app.js"></script>
	<!-- END: Theme JS-->

	<!-- BEGIN: Page JS-->
	<script src="<?= ASSETS_ROOT ?>js/scripts/pages/app-invoice-print.js"></script>
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
	</script>
</body>
<!-- END: Body-->

</html>
