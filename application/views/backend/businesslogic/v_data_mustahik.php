    <!-- Meta -->
    <?php $this->load->view('backend/template/meta') ?>

    <!-- Main Sidebar Container -->
    <?php $this->load->view('backend/template/sidebar') ?>

    <!-- Navbar -->
    <?php $this->load->view('backend/template/navbar') ?>
    <!-- Second Navbar -->
    <?php $this->load->view('backend/template/navbarsecond') ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Input Data Mustahik</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- form start -->
                        <form class="needs-validation" role="form" method="POST"
                            action="<?php echo base_url() . 'admin/DataMustahik/inputDataMustahik'; ?>" novalidate>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="namaMustahik">Nama Mustahik</label>
                                    <input type="text" class="form-control" id="namaMustahik" name="namaMustahik"
                                        placeholder="" required>
                                    <div class="invalid-feedback">
                                        Nama Mustahik Wajib diisi
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="alamatMustahik">Alamat Mustahik</label>
                                    <input type="text" class="form-control" id="alamatMustahik" name="alamatMustahik"
                                        placeholder="" required>
                                    <div class="invalid-feedback">
                                        Alamat Mustahik Wajib di isi
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ketMustahik">Keterangan</label>
                                    <select class="custom-select" id="ketMustahik" name="ketMustahik"
                                        placeholder="Pilih Keterangan Mustahik" required>
                                        <option selected></option>
                                        <option value="Fakir">Fakir</option>
                                        <option value="Miskin">Miskin</option>
                                        <option value="Hamba Sahaya">Hamba Sahaya</option>
                                        <option value="Mualaf">Mualaf</option>
                                        <option value="Amil">Amil</option>
                                        <option value="Gharimin">Gharimin</option>
                                        <option value="Fisabilillah">Fisabilillah</option>
                                        <option value="Ibnu Sabil">Ibnu Sabil</option>
                                    </select>

                                    <div class="invalid-feedback">
                                        Keterangan Mustahik Wajib di isi
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary ml-3 float-right ">Submit</button>
                                <!-- <button type="button" class="btn btn-warning float-right">Kosongkan</button> -->

                            </div>
                            <!-- /.card-body -->
                        </form>

                    </div>

                </div>
            </div>
        </div>

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Tabel Mustahik</h1>
            <p class="mb-4">Dibawah ini merupakan data dari Mustahik</p>



            <form action="<?php echo base_url('admin/datamustahik/konfirmasimustahik') ?>" method="POST">
                <?php if ($this->session->userdata('role_user') == 'admin') : ?>
                <div class="btn-group mr-2 mb-3" role="group" aria-label="Second group">
                    <button data-toggle="modal" data-target="#exampleModal" type="button" class="btn btn-success"
                        data-target="#exampleModal"><i class="fas fa-plus-circle"></i>
                        Input Data</button>
                </div>
                <div class="btn-group mr-2 mb-3" role="group" aria-label="Second group">
                    <button id="updateBtn" type="submit" name="updateBtn" class="btn btn-warning" data-toggle="modal"><i
                            class="fas fa-bin-circle"></i>
                        Konfirmasi</button>
                </div>
                <div class="btn-group mr-2 mb-3" role="group" aria-label="Second group">
                    <a href="<?php echo base_url('admin/cetaklaporan/cetakdatamustahik'); ?>" target="_blank"
                        type="button" class="btn btn-primary"><i class="fas fa-save"></i>
                        Simpan (pdf)</a>
                </div>
                <?php endif; ?>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-gray-800">Tabel Data Mustahik</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Pilih</th>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Waktu Penerimaan</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Pilih</th>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Waktu Penerimaan</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                                $no = 1;
                                                foreach ($db_zakat as $zakat) :
                                                ?>
                                    <tr>
                                        <td class="text-center">
                                            <input type="checkbox" name="checkbox_value[]"
                                                value="<?php echo $zakat['id_mustahik']; ?>">
                                        </td>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $zakat['nama_mustahik'] ?></td>
                                        <td><?php echo $zakat['alamat_mustahik'] ?></td>
                                        <td><?php echo $zakat['waktu_penerimaan'] ?></td>
                                        <td><?php echo $zakat['ket_mustahik'] ?></td>
                                        <td><?php echo $zakat['status_mustahik'] ?></td>
                                        <td><?php echo anchor('admin/datamustahik/hapusmustahik/' . $zakat['id_mustahik'], ' <div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>')?>

                                        </td>
                                    </tr>
                                    <?php
                                                    $no++;
                                                endforeach; ?>
                                </tbody>
                            </table>
            </form>
        </div>
    </div>
    </div>
    </div>
    </div>
    <!-- /.container-fluid -->


    <!-- /.container-fluid -->

    <!-- Footer -->
    <?php $this->load->view('backend/template/footer') ?>

    <!-- JS -->
    <?php $this->load->view('backend/template/js') ?>