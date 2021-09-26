<?php
// Include
include("function/Function.php");
include("function/CosineSimilarity.php");

// Query
$vektor1 = showData("SELECT score.id AS id, human.name AS humanName, sub_attribute.name AS subName, score.value FROM score INNER JOIN human ON score.human_id = human.id INNER JOIN sub_attribute ON score.sub_attribute_id = sub_attribute.id WHERE human.id = 1");
$vektor2 = showData("SELECT score.id AS id, human.name AS humanName, sub_attribute.name AS subName, score.value FROM score INNER JOIN human ON score.human_id = human.id INNER JOIN sub_attribute ON score.sub_attribute_id = sub_attribute.id WHERE human.id = 2");

// Push Vektor 1 dan Vektor 2 Kedalam Array
$array1 = [];
$array2 = [];
$empty = "Data Kosong";

if (!empty($vektor1) && !empty($vektor2)) {
    foreach ($vektor1 as $pektor1) {
        $array1["nilai"][] = $pektor1["value"];
    }

    foreach ($vektor2 as $pektor2) {
        $array2["nilai"][] = $pektor2["value"];
    }

    // Hasil
    $result = CosineSimilarity::calc($array1["nilai"], $array2["nilai"]);
}
?>
<section class="py-5">
    <div class="container">
        <?php if (empty($vektor1) && empty($vektor2)) : ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h1>Data Tidak Ada</h1>
                        </div>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow-sm mb-5">
                        <div class="card-header">
                            Data Aku
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Sub Atribut</th>
                                            <th>Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($vektor1 as $data) : ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?= $data["humanName"] ?></td>
                                                <td><?= $data["subName"] ?></td>
                                                <td><?= $data["value"] ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow-sm mb-5">
                        <div class="card-header">
                            Data Kamu
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="table1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Sub Atribut</th>
                                            <th>Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $j = 1; ?>
                                        <?php foreach ($vektor2 as $kamu) : ?>
                                            <tr>
                                                <td><?= $j++ ?></td>
                                                <td><?= $kamu["humanName"] ?></td>
                                                <td><?= $kamu["subName"] ?></td>
                                                <td><?= $kamu["value"] ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow-sm mb-5">
                        <div class="card-body">
                            <p>Hasil Kecocokan Aku dan Kamu : <span><?= $result ?></span> atau <span><?= bcdiv(persentase($result), 1, 0) . "%" ?></span></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>
    </div>
</section>