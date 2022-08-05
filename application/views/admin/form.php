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
    													<label for="first-name">Nama</label>
    												</div>
    												<div class="col-sm-9">
    													<input type="nama" class="form-control" name="nama" placeholder="Nama" value="<?= isset($all_data->nama) ? $all_data->nama : '' ?>" />
    												</div>
    											</div>
    										</div>
    										<div class="col-12">
    											<div class="form-group row">
    												<div class="col-sm-3 col-form-label">
    													<label for="first-name">Username</label>
    												</div>
    												<div class="col-sm-9">
    													<input type="email" class="form-control" name="username" placeholder="Username" value="<?= isset($all_data->username) ? $all_data->username : '' ?>" />
    												</div>
    											</div>
    										</div>
    										<div class="col-12">
    											<div class="form-group row">
    												<div class="col-sm-3 col-form-label">
    													<label for="first-name">Password</label>
    												</div>
    												<div class="col-sm-9">
    													<input type="password" class="form-control" name="password" placeholder="Password" value="<?= isset($all_data->password) ? $all_data->password : '' ?>" />
    												</div>
    											</div>
    										</div>
    										<div class="col-12">
    											<div class="form-group row">
    												<div class="col-sm-3 col-form-label">
    													<label for="first-name">Role</label>
    												</div>
    												<div class="col-sm-9">
    													<select class="form-control" name="id_role">
    														<option value="<?= isset($all_data->id_role) ? $all_data->id_role : '' ?>" selected><?= isset($all_data->id_role) ? $all_data->id_role : 'Pilih Role' ?></option>
    														<?php
															foreach ($role as $row) {
																echo '<option value="' . $row->id . '">' . $row->role . '</option>';
															}
															?>
    													</select>
    												</div>
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
