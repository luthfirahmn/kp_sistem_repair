<div class="app-content content ">
	<div class="content-overlay"></div>
	<div class="header-navbar-shadow"></div>
	<div class="content-wrapper">
		<div class="content-header row">
		</div>
		<div class="content-body">
			<!-- Dashboard Analytics Start -->
			<section id="dashboard-analytics">
				<div class="row match-height">
					<!-- Greetings Card starts -->
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="card card-congratulations">
							<div class="card-body text-center">
								<img src="<?= ASSETS_ROOT ?>images/elements/decore-left.png" class="congratulations-img-left" alt="card-img-left" />
								<img src="<?= ASSETS_ROOT ?>images/elements/decore-right.png" class="congratulations-img-right" alt="card-img-right" />
								<div class="avatar avatar-xl bg-primary shadow">
									<div class="avatar-content">
										<i data-feather="award" class="font-large-1"></i>
									</div>
								</div>
								<div class="text-center">
									<h1 class="mb-1 text-white">Selamat Datang</h1>
									<p class="card-text m-auto w-75">
										Halo admin, selamat datang kembali.
									</p>
								</div>
							</div>
						</div>
					</div>
					<!-- Greetings Card ends -->

					<!-- Subscribers Chart Card starts -->
					<div class="col-lg-6 col-sm-6 col-12">
						<div class="card">
							<div class="card-header flex-column align-items-start pb-0">
								<div class="avatar bg-light-primary p-50 m-0">
									<div class="avatar-content">
										<i data-feather="repeat" class="font-medium-5"></i>
									</div>
								</div>
								<h2 class="font-weight-bolder mt-1"><?= $barang_masuk ?></h2>
								<p class="card-text">Barang Masuk</p>
							</div>
							<div id="gained-chart"></div>
						</div>
					</div>
					<!-- Subscribers Chart Card ends -->

					<!-- Orders Chart Card starts -->
					<div class="col-lg-6 col-sm-6 col-12">
						<div class="card">
							<div class="card-header flex-column align-items-start pb-0">
								<div class="avatar bg-light-warning p-50 m-0">
									<div class="avatar-content">
										<i data-feather="refresh-cw" class="font-medium-5"></i>
									</div>
								</div>
								<h2 class="font-weight-bolder mt-1"><?= $barang_selesai ?></h2>
								<p class="card-text">Barang Selesai</p>
							</div>
							<div id="order-chart"></div>
						</div>
					</div>
					<!-- Orders Chart Card ends -->
				</div>



				<!--/ List DataTable -->
			</section>
			<!-- Dashboard Analytics end -->

		</div>
	</div>
</div>
