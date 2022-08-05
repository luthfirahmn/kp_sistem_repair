<div class="app-content content ">
	<div class="content-overlay"></div>
	<div class="header-navbar-shadow"></div>
	<div class="content-wrapper">
		<div class="content-header row">
		</div>
		<div class="content-body">
			<section class="invoice-preview-wrapper">
				<div class="row invoice-preview">
					<!-- Invoice -->
					<div class="col-xl-9 col-md-8 col-12">
						<div class="card invoice-preview-card">
							<div class="card-body invoice-padding pb-0">
								<!-- Header starts -->
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
								<!-- Header ends -->
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

							<!-- Invoice Note ends -->
						</div>
					</div>
					<!-- /Invoice -->

					<!-- Invoice Actions -->
					<div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
						<div class="card">
							<div class="card-body">

								<a class="btn btn-outline-secondary btn-block mb-75" href="<?= BACKEND_URL . 'barang_selesai/report/' . $all_data->id ?>" target="_blank">
									Print
								</a>
								<button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#exampleModal">
									Send Email
								</button>
								<button class="btn btn-danger btn-block" onclick="window.history.go(-1); return false;">
									Kembali
								</button>
							</div>
						</div>
					</div>
					<!-- /Invoice Actions -->
				</div>
			</section>

		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Kirim Email</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form action="<?= BACKEND_URL . 'send_email/send/' . $all_data->id ?>" method="post" target="_blank">
				<div class="modal-body">
					<div class="col-12">
						<div class="form-group">
							<div class="col-sm-3 col-form-label">
								<label for="first-name">Email</label>
							</div>
							<div class="col-sm-12">
								<input type="email" class="form-control" name="email" placeholder="Tulis Email Penerima" required />
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
					<button type="submit" class="btn btn-primary">Kirim Email</button>
				</div>

			</form>
		</div>
	</div>
</div>