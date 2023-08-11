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
                        <h5 class="modal-title" id="exampleModalLabel">Input Data Muzzaki</h5>


                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- form start -->
                        <form class="needs-validation" role="form" method="POST"
                            action="<?php echo base_url() . 'admin/DataMuzzaki/inputDataMuzzaki'; ?>" novalidate>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="namaMuzzaki">Nama Muzzaki</label>
                                    <input type="text" class="form-control" id="namaMuzzaki" name="namaMuzzaki"
                                        placeholder="" required>
                                    <div class="invalid-feedback">
                                        Nama Muzzaki Wajib di isi
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tlpMuzzaki">No Tlp Muzzaki</label>
                                    <input type="text" class="form-control" id="tlpMuzzaki" name="tlpMuzzaki"
                                        placeholder="" required>
                                    <div class="invalid-feedback">
                                        No Telepon Wajib di isi
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamatMuzzaki">Alamat Muzzaki</label>
                                    <input type="text" class="form-control" id="alamatMuzzaki" name="alamatMuzzaki"
                                        placeholder="" required>
                                    <div class="invalid-feedback">
                                        Alamat Muzzaki Wajib di isi
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamatMuzzaki">Jenis Zakat</label>
                                    <select class="custom-select" id="jenisZakat" name="jenisZakat"
                                        placeholder="Pilih Jenis Zakat" onchange="showJenisZakat(this)" required>
                                        <option selected></option>
                                        <option value="Beras">Beras</option>
                                        <option value="Uang Tunai">Uang Tunai</option>
                                    </select>

                                    <div class="invalid-feedback">
                                        Jenis Zakat Wajib di isi
                                    </div>
                                </div>
                                <div class="form-group pilihNominal" id="pilihNominal">
                                    <label for="alamatMuzzaki" id="labelPilih">Pilih Nominal</label>
                                    <select class="custom-select" id="nominal" name="nominal"
                                        placeholder="Pilih Jenis Zakat" required>
                                        <option selected></option>

                                    </select>
                                    <div class="invalid-feedback">
                                        Nominal Wajib di isi
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary ml-3 float-right ">Submit</button>
                                <!-- <button type=" button" class="btn btn-warning float-right">Kosongkan</button> -->

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
            <h1 class="h3 mb-2 text-gray-800">Tabel Muzzaki</h1>
            <p class="mb-4">Dibawah ini merupakan data dari muzzaki</p>

            <form action="<?php echo base_url('admin/datamuzzaki/hapusdatamuzzaki') ?>" method="POST">

                <!-- Button Input data Muzzaki -->
                <?php if ($this->session->userdata('role_user') == 'admin') : ?>
                <div class="btn-toolbar mb-2" role="toolbar" aria-label="toolbar with button groups">
                    <div class="btn-group mr-2" role="group" aria-label="First group">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                            <i class="fas fa-plus-circle"> </i> Input Data</button>
                    </div>
                    <div class="btn-group mr-2" role="group" aria-label="First group">
                        <button id="deleteBtn" name="deleteBtn" type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"> </i> Hapus Data</button>
                    </div>
                    <div class="btn-group mr-2" role="group" aria-label="First group">
                        <a href="<?php echo base_url('admin/cetaklaporan/cetakdatamuzzaki')?>" target="_blank"
                            class=" btn btn-primary">
                            <i class="fas fa-save"> </i> Simpan (pdf)</a>
                    </div>

                </div>
                <?php endif; ?>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-grey-800">Tabel Data Muzzaki</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Pilih</th>
                                        <th>No</th>
                                        <th>No Transaksi</th>
                                        <th>Nama</th>
                                        <th>No Tlp</th>
                                        <th>Alamat</th>
                                        <th>Jenis</th>
                                        <th>Nominal</th>
                                        <th>Waktu Penyerahan</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Pilih</th>
                                        <th>No</th>
                                        <th>No Transaksi</th>
                                        <th>Nama</th>
                                        <th>No Tlp</th>
                                        <th>Alamat</th>
                                        <th>Jenis</th>
                                        <th>Nominal</th>
                                        <th>Waktu Penyerahan</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach ($db_zakat as $zakat) :
                                        ?>
                                    <tr>
                                        <td class=" text-center">
                                            <input type="checkbox" name="checkbox_value[]"
                                                value="<?php echo $zakat['id_muzzaki']; ?>">
                                        </td>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $zakat['no_transaksi'] ?></td>
                                        <td><?php echo $zakat['nama_muzzaki'] ?></td>
                                        <td><?php echo $zakat['tlp_muzzaki'] ?></td>
                                        <td><?php echo $zakat['alamat_muzzaki'] ?></td>
                                        <td><?php echo $zakat['jenis_zakat'] ?></td>
                                        <?php if($zakat['jenis_zakat']  == 'Beras') : ?>
                                        <td><?php echo $zakat['nominal_zakat'] ?> Liter</td>
                                        <?php else:?>
                                        <td>Rp. <?php echo number_format($zakat['nominal_zakat'], 2,',','.') ?></td>
                                        <?php  endif; ?>
                                        <td><?php echo $zakat['waktu_penyerahan'] ?></td>
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