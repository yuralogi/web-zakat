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

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h2 class=" mb-0 text-gray-800">Detail Data Muzzaki Periode Tahun 2023</h2>
     </div>
     <div class="card mb-4 py-3 border-left-primary">
         <div class="card-body">
             <h3 class="font-size-5 font-weight-bold mb-3">Pendapatan Berupa Uang</h3>
             <h5>Total : <strong>
                     <u> <?php echo number_format($jumlahUang, 2,',','.') ?></u>
                 </strong>dari <strong><?php echo $muzzakiUang ?></strong> Orang Muzzaki</h5>
         </div>

     </div>
     <div class="card mb-4 py-3 border-left-warning">
         <div class="card-body">
             <h3 class="font-size-5 font-weight-bold mb-3">Pendapatan Berupa Beras</h3>
             <h5>Total : <strong>
                     <u> <?php echo $jumlahBeras ?> Kg</u>
                 </strong>dari <strong><?php echo $muzzakiBeras ?></strong> Orang Muzzaki</h5>
         </div>

     </div>
 </div>
 <!-- Footer -->
 <?php $this->load->view('backend/template/footer') ?>

 <!-- JS -->
 <?php $this->load->view('backend/template/js') ?>