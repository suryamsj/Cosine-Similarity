<?php

// Koneksi Ke Database
function Connection()
{
    return mysqli_connect("localhost", "root", "", "cocok");
}

// Menampilkan Data
function showData($query)
{
    $con = Connection();
    $result = mysqli_query($con, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// Tambah Data Orang
function tambahOrang($data)
{
    $con = Connection();
    $name = htmlspecialchars($data["name"]);

    // Query
    tambahNilai();
    $query = "INSERT INTO human VALUES (null,'$name')";
    mysqli_query($con, $query);
    return mysqli_affected_rows($con);
}

// Ubah Data Orang
function ubahOrang($data)
{
    $con = Connection();
    $id = htmlspecialchars($data["id"]);
    $name = htmlspecialchars($data["name"]);

    // Query
    $query = "UPDATE human SET name = '$name' WHERE id = '$id'";
    mysqli_query($con, $query);
    return mysqli_affected_rows($con);
}

// Hapus Data Orang
function hapusOrang($id)
{
    $con = Connection();

    // Query
    $query = "DELETE FROM human WHERE id = $id";
    mysqli_query($con, $query);
    return mysqli_affected_rows($con);
}

// Tambah Data Nilai Otomatis Menjadi 0
function tambahNilai()
{
    $con = Connection();

    // Mendapatkan ID baru
    $search = showData("SELECT id FROM human ORDER BY id DESC LIMIT 1");
    foreach ($search as $human) {
        $id = $human["id"];
    }

    if (empty($id)) {
        $newid = 1;
    } else {
        $newid = $id + 1;
    }

    //Data
    $data = "0";

    //Query
    for ($i = 1; $i <= 20; $i++) {
        $query = "INSERT INTO score VALUES (null, '$newid', '$i','$data')";
        mysqli_query($con, $query);
    }
    return mysqli_affected_rows($con);
}

// Ubah Data Nilai
function ubahNilai($data)
{
    $con = Connection();
    $id = htmlspecialchars($data["id"]);
    $score = htmlspecialchars($data["value"]);

    // Query
    $query = "UPDATE score SET value = '$score' WHERE id = '$id'";
    mysqli_query($con, $query);
    return mysqli_affected_rows($con);
}

// Menghitung Persentase
function persentase($number)
{
    return $number * 100;
}
