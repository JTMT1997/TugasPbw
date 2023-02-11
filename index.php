<?php
session_start();
if($_SESSION['status']!="sudah_login"){
  header("location:login.php");
} 
include('koneksi.php'); 
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Produk Kantin Dargombez </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style type="text/css">
      *{
        font-family: "Trebuchet MS";
      }
      h1 {
        text-transform: uppercase;
        color: cyan;
      }
      table {
        border: solid 1px #DDEEEE;
        border-collapse: collapse;
        border-spacing: 0;
        width: 70%;
        margin: 10px auto 10px auto;
      }
      table thead th {
          background-color: #DDEFEF;
          border: solid 1px #DDEEEE;
          color: #336B6B;
          padding: 10px;
          text-align: left;
          text-shadow: 1px 1px 1px #fff;
          text-decoration: none;
      }
      table tbody td {
          border: solid 1px #DDEEEE;
          color: #333;
          padding: 10px;
          text-shadow: 1px 1px 1px #fff;
      }
      a {
            color: #fff;
            padding: 10px;
            text-decoration: none;
            font-size: 12px;
      }

      #tambah{
        margin-right: 63.4%;
        background-color: green;
      }
      *{
          margin:0; 
          padding:0;
      }
      nav {
          margin:auto;
          text-align: center;
          width: 100%;
          font-family: arial;
      } 
      nav ul {
          background:#37988e;
          padding: 0 20px;
          list-style: none;
          position: relative;
          display: inline-table;
          width: 100%;
      }
      nav ul li{
          float:left;
      }
      nav ul li:hover{
          background:#d68d9a;
      }
      nav ul li:hover a{
        color:#000;
      }
      nav ul li a{
        display: block;
        padding: 25px;
        color: #fff;
        text-decoration: none;
      }
    </style>
  </head>
  <body>
  <nav>
     <ul>
      <li> <img class="img-profile rounded-circle" src="https://ui-avatars.com/api/?name=<?php echo $_SESSION['nama'];?>"></li>
      <li><a target = _blank' href="report.php">Reporting</a></li>
      <li><a href="logout.php">Logout</a></li>
      
       
     </ul>
</nav>
<center><h1>Produk di Kantin Dargombez </h1><center>
  <a href="tambah_produk.php" id="tambah" style="margin-left: 1%;">+ Tambah Produk</a>
    <br/>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Produk</th>
          <th>Dekripsi</th>
          <th>Harga Jual</th>
          <th>Gambar</th>
          <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
      $query = "SELECT * FROM produk ORDER BY id ASC";
      $result = mysqli_query($koneksi, $query);
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }
      $no = 1; 
      while($row = mysqli_fetch_assoc($result))
      {
    ?>
       <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row['nama_produk']; ?></td>
          <td><?php echo substr($row['deskripsi'], 0, 20); ?></td>
          <td>Rp <?php echo $row['harga_jual']; ?></td>
          <td style="text-align: center;"><img src="gambar/<?php echo $row['gambar']; ?>" style="width: 120px;"></td>
          <td>
              <a href="edit_produk.php?id=<?php echo $row['id']; ?>" style="padding-left: 30px; padding-right:30px; background-color: aqua;">Edit</a> 
              <a style="padding-left: 30px; padding-right:30px; background-color: red;" href="proses_hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
          </td>
      </tr>
         
      <?php
        $no++; 
      }
      ?>
    </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>