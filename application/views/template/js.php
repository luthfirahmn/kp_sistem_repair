<!-- BEGIN: Vendor JS-->
<script src="<?= ASSETS_ROOT ?>vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="<?= ASSETS_ROOT ?>vendors/js/charts/apexcharts.min.js"></script>
<script src="<?= ASSETS_ROOT ?>vendors/js/extensions/toastr.min.js"></script>
<script src="<?= ASSETS_ROOT ?>vendors/js/extensions/sweetalert2.all.min.js"></script>
<script src="<?= ASSETS_ROOT ?>vendors/js/extensions/moment.min.js"></script>
<script src="<?= ASSETS_ROOT ?>vendors/js/tables/datatable/datatables.min.js"></script>
<script src="<?= ASSETS_ROOT ?>vendors/js/tables/datatable/datatables.buttons.min.js"></script>
<script src="<?= ASSETS_ROOT ?>vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
<script src="<?= ASSETS_ROOT ?>vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
<script src="<?= ASSETS_ROOT ?>vendors/js/tables/datatable/responsive.bootstrap.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="<?= ASSETS_ROOT ?>js/core/app-menu.js"></script>
<script src="<?= ASSETS_ROOT ?>js/core/app.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="<?= ASSETS_ROOT ?>js/scripts/pages/dashboard-analytics.js"></script>
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
