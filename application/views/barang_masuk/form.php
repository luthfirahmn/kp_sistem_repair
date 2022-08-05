    <!-- BEGIN: Content-->
    <div class="app-content content ">
    	<div class="content-overlay"></div>
    	<div class="header-navbar-shadow"></div>
    	<div class="content-wrapper">
    		<div class="content-header row">
    			<div class="content-header-left col-md-9 col-12 mb-2">
    				<div class="row breadcrumbs-top">
    					<div class="col-12">
    						<h2 class="content-header-title float-left mb-0"><?= $title ?></h2>
    						<div class="breadcrumb-wrapper">
    							<ol class="breadcrumb">
    								<li class="breadcrumb-item"><?= $breadcrumb ?>
    								</li>
    								<li class="breadcrumb-item active"><a href="#"><?= $breadcrumb1 ?></a>
    								</li>
    							</ol>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    		<div class="content-body">
    			<!-- Basic Horizontal form layout section start -->
    			<section id="basic-horizontal-layouts">
    				<div class="row">
    					<div class="col-md-12 col-12">
    						<div class="card">
    							<div class="card-header">
    								<h4 class="card-title"><?= $breadcrumb1 ?></h4>
    							</div>
    							<div class="card-body">
    								<form class="form form-horizontal" id="form-main">
    									<input type="hidden" name="status_form" id="status_form" value="<?= $status_form ?>">
    									<input type="hidden" name="id" id="id" value="<?= isset($id) ? $id : 0 ?>">
    									<div class="row">
    										<div class="col-12">
    											<div class="form-group row">
    												<div class="col-sm-3 col-form-label">
    													<label for="first-name">PO Number</label>
    												</div>
    												<div class="col-sm-9">
    													<input type="text" class="form-control" name="po_no" placeholder="PO Number" value="<?= isset($all_data->po_no) ? $all_data->po_no : '' ?>" />
    												</div>
    											</div>
    										</div>
    										<div class="col-12">
    											<div class="form-group row">
    												<div class="col-sm-3 col-form-label">
    													<label for="first-name">Style No</label>
    												</div>
    												<div class="col-sm-9">
    													<input type="text" class="form-control" name="style_no" placeholder="Style No" value="<?= isset($all_data->style_no) ? $all_data->style_no : '' ?>" />
    												</div>
    											</div>
    										</div>
    										<div class="col-12">
    											<div class="form-group row">
    												<div class="col-sm-3 col-form-label">
    													<label for="first-name">Barang</label>
    												</div>
													<div class="col-sm-9">
    													<input type="text" class="form-control" name="barang" placeholder="Nama Barang" value="<?= isset($all_data->barang) ? $all_data->barang : '' ?>" />
    												</div>
    												<!-- <div class="col-sm-9">
    													<select class="form-control" name="id_barang">
    														<option value="<?= isset($all_data->id_barang) ? $all_data->id_barang : '' ?>" selected><?= isset($all_data->barang) ? $all_data->barang : 'Pilih Barang' ?></option>
    														<?php
															foreach ($barang as $row) {
																echo '<option value="' . $row->id . '">' . $row->barang . '</option>';
															}
															?>
    													</select>
    												</div> -->
    											</div>
    										</div>
    										<div class="col-sm-9 offset-sm-3">
    											<button type="button" class="btn btn-primary mr-1" id="btn-save" onclick="btn_save()">Simpan</button>
    											<a href="<?= BACKEND_URL ?><?= $this->uri->segment(2) ?>" class="btn btn-outline-secondary">Kembali</a>
    										</div>
    									</div>
    								</form>
    							</div>
    						</div>
    					</div>
    				</div>
    			</section>
    			<!-- Basic Horizontal form layout section end -->

    		</div>
    	</div>
    </div>
    <!-- END: Content-->
