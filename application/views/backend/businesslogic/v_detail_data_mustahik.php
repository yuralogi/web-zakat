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
         <h2 class=" mb-0 text-gray-800">Detail Data Mustahik Periode Tahun 2023</h2>
     </div>
     <div class="card mb-4 py-3 border-left-primary">
         <div class="card-body">
             <h3 class="font-size-5 font-weight-bold mb-3">Data Mustahik</h3>
             <h5>Total :
                 <u><?php echo $jumlahMustahik?></u>
                 Orang Mustahik Terdata, dengan rincian
             </h5>
             <h5><strong>Fakir : </strong><u><?php echo $mustahikFakir?></u> Orang</h5>
             <h5><strong>Miskin : </strong><u><?php echo $mustahikMiskin?></u> Orang</h5>
             <h5><strong>Hamba Sahaya : </strong><u><?php echo $mustahikHambaSahaya?></u> Orang</h5>
             <h5><strong>Mualaf : </strong><u><?php echo $mustahikMualaf?></u> Orang</h5>
             <h5><strong>Amil : </strong><u><?php echo $mustahikAmil?></u> Orang</h5>
             <h5><strong>Gharimin : </strong><u><?php echo $mustahikGharimin?></u> Orang</h5>
             <h5><strong>Fisabilillah : </strong><u><?php echo $mustahikFisabilillah?></u> Orang</h5>
             <h5><strong>Ibnu Sabil : </strong><u><?php echo $mustahikIbnuSabil?></u> Orang</h5>

         </div>

     </div>
 </div>
 <!-- Footer -->
 <?php $this->load->view('backend/template/footer') ?>

 <!-- JS -->
 <?php $this->load->view('backend/template/js') ?>