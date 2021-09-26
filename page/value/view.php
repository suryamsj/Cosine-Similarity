<?php
// Include
include("function/Function.php");

// Query
$query = showData("SELECT score.id AS id, human.name AS humanName, sub_attribute.name AS subName, score.value FROM score INNER JOIN human ON score.human_id = human.id INNER JOIN sub_attribute ON score.sub_attribute_id = sub_attribute.id");
?>
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header">
                        Data Nilai
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
                                    <?php foreach ($query as $data) : ?>
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
    </div>
</section>