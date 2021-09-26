<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        case 'beranda':
            include "page/home.php";
            break;
        case 'data_orang':
            include "page/human/view.php";
            break;
        case 'tambah_data_orang':
            include "page/human/add.php";
            break;
        case 'ubah_data_orang':
            include "page/human/edit.php";
            break;
        case 'hapus_data_orang':
            include "page/human/delete.php";
            break;
        case 'data_atribut':
            include "page/attribute/view.php";
            break;
        case 'data_sub_atribut':
            include "page/sub_attribute/view.php";
            break;
        case 'nilai':
            include "page/value/view.php";
            break;
        case 'hasil':
            include "page/result/view.php";
            break;
        default:
            echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
            break;
    }
} else {
    include "page/home.php";
}
