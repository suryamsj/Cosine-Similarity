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

// Menghitung Persentase
function persentase($number)
{
    return $number * 100;
}
