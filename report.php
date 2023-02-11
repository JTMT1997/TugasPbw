<!DOCTYPE html>
<html>
<head>
	<title>CETAK PRINT DATA PRODUK KANTIN DARGOMBEZ</title>
</head>
<body>
	<center>
		<h2>DATA LAPORAN BARANG KANTIN</h2>
	</center>
	<?php 
	include 'koneksi.php';
	?>
	<table border="1" style="width: 100%">
		<tr>
			<th width="1%">No</th>
			<th>Nama Produk</th>
			<th>Deskripsi</th>
			<th width="5%">Harga Jual</th>
			<th width="5%">Gambar</th>

		</tr>
		<?php 
		$no = 1;
		$sql = mysqli_query($koneksi,"select * from produk");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['nama_produk']; ?></td>
			<td><?php echo $data['deskripsi']; ?></td>
			<td><?php echo $data['harga_jual']; ?></td>
			<td><img src="gambar/<?php echo $data['gambar']; ?>" style="width: 120px;"></td>

		</tr>
		<?php 
		}
		?>
	</table>
 
	<script>
		window.print();
	</script>
 
</body>
</html>