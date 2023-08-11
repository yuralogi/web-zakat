<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets/sbadmin2-templating') ?> /vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url('assets/sbadmin2-templating') ?> /vendor/bootstrap/js/bootstrap.bundle.min.js">
</script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url('assets/sbadmin2-templating') ?> /vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url('assets/sbadmin2-templating') ?> /js/sb-admin-2.min.js"></script>

<!-- datatable -->
<script src="<?php echo base_url('assets/sbadmin2-templating') ?> /vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/sbadmin2-templating') ?> /vendor/datatables/dataTables.bootstrap4.min.js">
</script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url('assets/sbadmin2-templating') ?> /js/demo/datatables-demo.js"></script>

<!-- SweetAlert -->
<script src="<?php echo base_url('assets/sbadmin2-templating') ?> /js/sweetalert2.all.min.js"></script>

<!-- My Js -->


<!-- validation form -->
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
</script>

<!-- sweetalert -->
<script>
const flashData = $('.flash-data').data('flashdata');

if (flashData == "ditambahkan") {
    Swal.fire(
        'Berhasil!',
        'Data Telah di Masukan',
        'success'
    )
} else if (flashData == "dihapus") {
    Swal.fire(
        'Berhasil!',
        'Data telah dihapus',
        'success'
    )
} else if (flashData == "gagal-kirim") {
    Swal.fire(
        'Gagal!',
        'Pilih Minimal Satu Data',
        'error'
    )
} else if (flashData == "berhasil-diupdate") {
    Swal.fire(
        'Berhasil!',
        'Data Telah di Update',
        'success'
    )
} else if (flashData == "gagal-login") {
    Swal.fire(
        'Gagal',
        'Username dan Password tidak ditemukan',
        'error'
    )
}

function confirmLogout() {
    Swal.fire({
        title: 'Anda Yakin Ingin Keluar?',
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Keluar',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "<?php echo base_url('auth/logout'); ?>"
        }
    })
}

function confirmDelete() {
    Swal.fire({
        title: 'Anda Yakin untuk Menghapus?',
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yakin',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "<?php echo base_url('admin/datamustahik/hapusdata') ?>"
        }
    })
}
</script>

<script>
function showJenisZakat(select) {
    if (select.value == 'Uang Tunai') {
        document.getElementById('pilihNominal').style.display = "block";
        document.getElementById('labelPilih').innerHTML = "Pilih Nominal";

        let options = document.getElementById('nominal');

        while (options.hasChildNodes()) {
            options.removeChild(options.firstChild);
        }

        function createOption(text, nominal) {
            var money = document.createElement('option');
            money.setAttribute('value', nominal);
            money.textContent = text;
            return money;
        }

        function appendChildren(parent, children) {
            children.forEach(function(child) {
                parent.appendChild(child);
            });
        }


        var items = [
            createOption('Rp. 35.000', '35000'),
            createOption('Rp. 40.000', '40000'),
            createOption('Rp. 45.000', '45000'),
            createOption('Rp. 50.000', '50000')
        ];

        appendChildren(options, items);
    } else {
        let options = document.getElementById('nominal');

        while (options.hasChildNodes()) {
            options.removeChild(options.firstChild);
        }

        function createOption(text, nominal) {
            var money = document.createElement('option');
            money.setAttribute('value', nominal);
            money.textContent = text;
            return money;
        }

        function appendChildren(parent, children) {
            children.forEach(function(child) {
                parent.appendChild(child);
            });
        }

        var items = [
            createOption('3,5 Liter', '3.5'),
            createOption('4 Liter', '4'),
            createOption('4,5 Liter', '4.5'),
            createOption('5 Liter', '5')
        ];


        appendChildren(options, items);


        document.getElementById('pilihNominal').style.display = "block";
        document.getElementById('labelPilih').innerHTML = "Pilih Liter";
    }
}
</script>


</body>

</html>