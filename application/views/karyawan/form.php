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
    													<label for="first-name">Nama Lengkap</label>
    												</div>
    												<div class="col-sm-9">
    													<input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" value="<?= isset($all_data->nama_lengkap) ? $all_data->nama_lengkap : '' ?>" />
    												</div>
    											</div>
    										</div>
    										<div class="col-12">
    											<div class="form-group row">
    												<div class="col-sm-3 col-form-label">
    													<label for="first-name">Email</label>
    												</div>
    												<div class="col-sm-9">
    													<input type="email" class="form-control" name="email" placeholder="Email" value="<?= isset($all_data->email) ? $all_data->email : '' ?>" />
    												</div>
    											</div>
    										</div>
    										<div class="col-12">
    											<div class="form-group row">
    												<div class="col-sm-3 col-form-label">
    													<label for="first-name">No Telepon</label>
    												</div>
    												<div class="col-sm-9">
    													<input type="number" class="form-control" name="no_telp" placeholder="No Telepon" value="<?= isset($all_data->no_telp) ? $all_data->no_telp : '' ?>" />
    												</div>
    											</div>
    										</div>
    										<div class="col-12">
    											<div class="form-group row">
    												<div class="col-sm-3 col-form-label">
    													<label for="first-name">Jenis Kelamin</label>
    												</div>
    												<div class="col-sm-9">
    													<select class="form-control" name="jenis_kelamin">
    														<option value="<?= isset($all_data->jenis_kelamin) ? $all_data->jenis_kelamin : '' ?>" selected><?= isset($all_data->jenis_kelamin) ? $all_data->jenis_kelamin : 'Pilih Jenis Kelamin' ?></option>
    														<option value="Laki-Laki">Laki-Laki</option>
    														<option value="Perempuan">Perempuan</option>
    													</select>
    												</div>
    											</div>
    										</div>
    										<div class="col-12">
    											<div class="form-group row">
    												<div class="col-sm-3 col-form-label">
    													<label for="first-name">Tanggal Lahir</label>
    												</div>
    												<div class="col-sm-9">
    													<input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir" value="<?= isset($all_data->tanggal_lahir) ? $all_data->tanggal_lahir : '' ?>" />
    												</div>
    											</div>
    										</div>
    										<div class="col-12">
    											<div class="form-group row">
    												<div class="col-sm-3 col-form-label">
    													<label for="first-name">Alamat</label>
    												</div>
    												<div class="col-sm-9">
    													<input type="text" class="form-control" name="alamat" placeholder="Alamat" value="<?= isset($all_data->alamat) ? $all_data->alamat : '' ?>" />
    												</div>
    											</div>
    										</div>
    										<div class="col-12">
    											<div class="form-group row">
    												<div class="col-sm-3 col-form-label">
    													<label for="first-name">Posisi</label>
    												</div>
    												<div class="col-sm-9">
    													<select class="form-control" name="posisi">
    														<option value="<?= isset($all_data->posisi) ? $all_data->posisi : '' ?>" selected><?= isset($all_data->posisi) ? $all_data->posisi : 'Pilih Posisi' ?></option>
    														<?php
															foreach ($posisi as $row) {
																echo '<option value="' . $row->param_id . '">' . $row->param_value . '</option>';
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
