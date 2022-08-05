<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>

	<?php echo $this->load->view('template/head', '', TRUE); ?>

</head>

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

	<?php echo $this->load->view('template/navbar', '', TRUE); ?>
	<!-- /.navbar -->

	<?php echo $this->load->view("template/sidebar", '', TRUE) ?>

	<?php echo $this->load->view($content_file, $content_data, TRUE); ?>
	<!-- /.content-wrapper -->

	<?php echo $this->load->view('template/footer', '', TRUE); ?>

	<div class="sidenav-overlay"></div>
	<div class="drag-target"></div>

	<?php echo $this->load->view('template/js', '', TRUE); ?>

	<script type="text/javascript">
		var BASE_URL = '<?= BASE_URL . $this->uri->segment(1) . '/' ?>';
		var funct = '<?= $this->uri->segment(2) ?>';
		var index = '<?= $this->uri->segment(3) ?>';
		// console.log(index);
	</script>

	<?php echo (isset($js) ? '<script src="' . ASSETS_ROOT . 'main/' . $js . '.js' . '"></script>' : '') . "\r\n\x20\x20" ?>

	<script src="<?= ASSETS_ROOT ?>main.js"></script>
</body>

</html>
