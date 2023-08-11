 <!-- Meta -->
 <?php $this->load->view('backend/template/meta') ?>

 <!-- Main Sidebar Container -->
 <?php $this->load->view('backend/template/sidebar') ?>

 <!-- Navbar -->
 <?php $this->load->view('backend/template/navbar') ?>
 <!-- Second Navbar -->
 <?php $this->load->view('backend/template/navbarsecond') ?>

 <div class="container-fluid">
     <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
     <?php $this->session->flashdata('flash')?>
     <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus data dan Rekap</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <!-- form start -->
                     <form class="needs-validation" role="form" action="<?php echo base_url('admin/profile')?>"
                         method="post" novalidate>
                         <div class="form-group">
                             <input name="inputUsername" type="email" class="form-control form-control-user"
                                 id="inputUsername" aria-describedby="emailHelp" placeholder="Masukan Username"
                                 required>
                             <div class="invalid-feedback">
                                 masukan username
                             </div>
                         </div>
                         <div class="form-group">
                             <input name="inputPassword" type="password" class="form-control form-control-user"
                                 id="inputPassword" placeholder="Masukan Password" required>
                             <div class="invalid-feedback">
                                 masukan password
                             </div>
                         </div>


                         <button type="submit" class="btn btn-primary btn-user btn-block mb-2">
                             Konfirmasi
                         </button>
                         <p class="text-danger">*Rekap hanya bisa dilakukan setahun sekali, jadi pastikan periode zakat
                             telah benar-benar selesai</p>
                     </form>


                 </div>

             </div>
         </div>
     </div>
     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h2 class=" mb-0 text-gray-800">Profile <?php echo $this->session->userdata('role_user')?></h2>
     </div>
     <div class="card mb-4 py-3 border-left-primary">
         <div class="card-body">
             <img class="img-profile rounded-circle"
                 src="<?php echo base_url('assets/sbadmin2-templating/')?>/img/undraw_profile.svg"
                 style="height: 150px">
         </div>
         <div class="card-body">
             <h4>Nama : <?php echo $this->session->userdata('name')?></h4>
             <h4>Username : <?php echo $this->session->userdata('username') ?></h4>
         </div>


     </div>
     <?php if ($this->session->userdata('role_user') == 'admin') : ?>
     <div class="btn-group mr-2 mb-3" role="group" aria-label="Second group">
         <button data-toggle="modal" data-target="#exampleModal" type="button" class="btn btn-danger"
             data-target="#exampleModal"><i class="fas fa-trash"></i>
             Hapus Session</button>
     </div>
     <?php endif; ?>

 </div>

 <!-- Footer -->
 <?php $this->load->view('backend/template/footer') ?>

 <!-- JS -->
 <?php $this->load->view('backend/template/js') ?>