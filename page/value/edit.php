<?php
// Include
include("function/Function.php");

// AMBIL ID
$id = $_GET["id"];

// QUERY
$query = showData("SELECT * FROM score WHERE id = $id");

// Melakukan Foreach
foreach ($query as $data) {
    $value = $data["value"];
}

// Fungsi Ubah
if (isset($_POST["ubah"])) {
    if (ubahNilai($_POST) > 0) {
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Data berhasil diubah'
        }).then(function() {
            window.location.href = 'index.php?page=data_nilai';
        });
        </script>";
    } else {
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Data gagal diubah'
        }).then(function() {
            window.location.href = 'index.php?page=data_nilai';
        });
        </script>";
    }
}
?>
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Form Ubah
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="value" name="value" required min="0" max="5" value="<?= $value ?>">
                                <input type="hidden" name="id" value="<?= $id ?>">
                                <label for="value">Nilai</label>
                            </div>
                            <div class="float-end mb-3">
                                <button class="btn btn-primary" type="submit" name="ubah">Ubah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>