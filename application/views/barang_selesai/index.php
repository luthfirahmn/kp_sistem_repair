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
                        <a class="btn btn-primary mb-75" data-toggle="modal" data-target="#exampleModal">
                            <i data-feather="printer"></i> Print All</a>
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
                                            <th>TOT</th>
                                            <th>Remark</th>
                                            <th>Grade</th>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kirim Email</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= BACKEND_URL . 'barang_selesai/report_all' ?>" method="post" target="_blank">
                    <div class="modal-body">
                        <div class="col-12">
                            <div class="form-group">
                                <div class="col-sm-3 col-form-label">
                                    <label for="first-name">Email</label>
                                </div>
                                <div class="col-sm-12">
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Tulis Email Penerima" required />
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
















    <!-- END: Content-->