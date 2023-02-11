<?php
include 'koneksi.php';
  $nama_produk   = $_POST['nama_produk'];
  $deskripsi     = $_POST['deskripsi'];
  $harga_jual    = $_POST['harga_jual'];
  $gambar = $_FILES['gambar']['name'];

if($gambar != "") {
  $ekstensi_diperbolehkan = array('png','jpg','jpeg'); 
  $space = explode('.', $gambar); 
  $ekstensi = strtolower(end($space));
  $file_tmp = $_FILES['gambar']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$gambar; 
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru);
                  $query = "INSERT INTO produk (id, nama_produk, deskripsi, harga_jual, gambar) VALUES ('','$nama_produk', '$deskripsi', '$harga_jual', '$nama_gambar_baru')";
                  $result = mysqli_query($koneksi, $query);
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                  }
            } else {     
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
            }
} else {
   $query = "INSERT INTO produk (id, nama_produk, deskripsi, harga_jual, gambar) VALUES ('','$nama_produk', '$deskripsi', '$harga_jual', null)";
                  $result = mysqli_query($koneksi, $query);
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                  }
}
