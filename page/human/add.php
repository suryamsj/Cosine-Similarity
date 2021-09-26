<?php
// Include
include("function/Function.php");

// Fungsi Tambah
if (isset($_POST["tambah"])) {
    if (tambahOrang($_POST) > 0) {
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Data berhasil ditambahkan'
        }).then(function() {
            window.location.href = 'index.php?page=data_orang';
        });
        </script>";
    } else {
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Data gagal ditambahkan'
        }).then(function() {
            window.location.href = 'index.php?page=data_orang';
        });
        </script>";
    }
}

?>
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Beranda</li>
                        <li class="breadcrumb-item"><a href="index.php?page=data_orang">Data Orang</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
                    </ol>
                </nav>
                <div class="card">
                    <div class="card-header">
                        Form Tambah
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="name" placeholder="Nama Lengkap" name="name" required autocomplete="off">
                                <label for="name">Nama Lengkap</label>
                            </div>
                            <div class="float-end mb-3">
                                <button class="btn btn-primary" type="submit" name="tambah">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>