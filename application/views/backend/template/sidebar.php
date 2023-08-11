<?php 
 $data_rekap = $this->db->get('tbl_rekap')->result_array();
?>


<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center prevent-select ">
        <div class="sidebar-brand-icon">
            <i class="fas fa-mosque"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin Amil Zakat</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('admin/dashboard')?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Master Data
    </div>



    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-folder"></i>
            <span>Rangkuman</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Pilih Data :</h6>
                <a class="collapse-item" href="<?php echo base_url('admin/detailmuzzaki')?>">Muzzaki</a>
                <a class="collapse-item" href="<?php echo base_url('admin/detailmustahik')?>">Mustahik</a>
                <!-- <a class="collapse-item" href="#">Data Zakat</a> -->
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Terikini</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Pilih Data</h6>
                <a class="collapse-item" href="<?php echo base_url('admin/datamuzzaki')?>">Muzzaki</a>
                <a class="collapse-item" href="<?php echo base_url('admin/datamustahik')?>">Mustahik</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <div class="sidebar-heading">
        Rekap Data
    </div>
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-table"></i>
            <span>Data Zakat Tahunan</span>
        </a>

        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Pilih Tahun</h6>
                <?php foreach ($data_rekap as $data) : ?>
                <a class="collapse-item"
                    href="<?php echo base_url('admin/tampilrekap') .'?tahun='. $data['tahun_rekap']?>"><?php echo $data['tahun_rekap']?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->