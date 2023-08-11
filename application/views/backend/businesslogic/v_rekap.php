 <!-- Meta -->
 <?php $this->load->view('backend/template/meta') ?>

 <!-- Main Sidebar Container -->
 <?php $this->load->view('backend/template/sidebar') ?>

 <!-- Navbar -->
 <?php $this->load->view('backend/template/navbar') ?>
 <!-- Second Navbar -->
 <?php $this->load->view('backend/template/navbarsecond') ?>

 <div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Rekap Data Zakat Periode Tahun <?php echo $_GET['tahun']?></h1>
         <?php if ($this->session->userdata('role_user') == 'admin') : ?>
         <a href="<?php echo base_url('admin/cetaklaporan/cetakdataallrekap').'?tahun='. $_GET['tahun']?>"
             target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                 class="fas fa-download fa-sm text-white-50"></i> Rekap Data (pdf)</a>
         <?php endif; ?>
     </div>

     <!-- Content Row -->
     <div class="row">
         <?php foreach($rekap_data as $row) :?>
         <!-- Earnings (Monthly) Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
             <div class="card border-left-primary shadow h-100 py-2">
                 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                             <div class="h5 mb-0 font-weight-bold text-gray-800">
                                 <?php echo number_format( $row['total_muzzaki'], 0,'.','.') ?> Orang
                             </div>
                             <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                 Muzzaki Menunaikan Zakat</div>

                         </div>
                         <div class="col-auto">
                             <i class="fas fa-users fa-2x text-gray-300"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <!-- Earnings (Monthly) Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
             <div class="card border-left-success shadow h-100 py-2">
                 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                             <div class="h5 mb-0 font-weight-bold text-gray-800">Rp
                                 <?php echo number_format($row['total_uang'], 2,',','.') ?>
                             </div>
                             <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                 Uang Terkumpul</div>
                         </div>
                         <div class="col-auto">
                             <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <!-- Earnings (Monthly) Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
             <div class="card border-left-info shadow h-100 py-2">
                 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                         <div class="col mr-2">

                             <div class="h5 mb-0 font-weight-bold text-gray-800">
                                 <?php echo number_format($row['total_beras'], 1,',','.')?>
                                 Liter
                             </div>
                             <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Beras Terkumpul
                             </div>
                         </div>
                         <div class="col-auto">
                             <i class="fas fa-people-carry fa-2x text-gray-300"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <!-- Pending Requests Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
             <div class="card border-left-warning shadow h-100 py-2">
                 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                         <div class="col mr-2">

                             <div class="h5 mb-0 font-weight-bold text-gray-800">
                                 <?php echo number_format( $row['total_mustahik'], 0,'.','.') ?>
                                 Orang
                             </div>
                             <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                 Mustahik Menerima Zakat</div>
                         </div>
                         <div class="col-auto">
                             <i class="fas fa-user-check fa-2x text-gray-300"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <?php endforeach; ?>

     </div>
     <!-- Content Row -->

 </div>
 <!-- /.container-fluid -->

 <!-- Footer -->
 <?php $this->load->view('backend/template/footer') ?>

 <!-- JS -->
 <?php $this->load->view('backend/template/js') ?>