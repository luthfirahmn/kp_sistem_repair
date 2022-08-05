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
    			<div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
    				<div class="form-group breadcrumb-right">
    					<button type="button" class="btn btn-primary" onclick="myForm()">
    						<i data-feather="plus-circle" class="mr-25"></i>
    						<span>Tambah</span>
    					</button>
    				</div>
    			</div>
    		</div>
    		<div class="content-body">
    			<!-- Basic table -->
    			<section id="basic-datatable">
    				<div class="row">
    					<div class="col-12">
    						<div class="card">
    							<table id="main-table" class="datatables-basic table">
    								<thead>
    									<tr>
    										<th>Action</th>
    										<th>Nomor PO</th>
    										<th>Style No</th>
    										<th>Barang</th>
    										<th>Tanggal PO</th>
    									</tr>
    								</thead>
    							</table>
    						</div>
    					</div>
    				</div>
    			</section>
    			<!--/ Basic table -->

    		</div>
    	</div>
    </div>
    <!-- END: Content-->
