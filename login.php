<!DOCTYPE html>
<html>
<head>
	<title>Form Login Kantin Dargombez</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style type="text/css">
	
		body {
			background-color: #7a58ff;
			font-family: "Segoe UI";
		}
		#wrapper {
			background-color: #fff;
			height: 400px;
			margin-top: 16%;
			margin-left: auto;
			margin-right: auto;
			padding: 20px;
			border-radius: 4px;
		}
		input[type=text], input[type=password] {
			border: 1px solid #ddd;
			padding: 10px;
			width: 95%;
			border-radius: 2px;
			outline: none;
			margin-top: 10px;
			margin-bottom: 20px;
		}
		label, h1 {
			text-transform: uppercase;
			font-weight: bold;
		}
		h1 {
			text-align: center;
			font-size: 40px;
			color: #7a58ff;
		}
		
		.error {
			background-color: #f72a68;
			width: 400px;
			height: auto;
			margin-top: 20px;
			margin-left: auto;
			margin-right: auto;
			padding: 20px;
			border-radius: 4px;
			color: #fff;
		
		}
		table, th, td {
          border:1px solid black;
          margin-left:50%;
        }
	</style>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
</head>
<body>
	<div class="row">
		<div class="col-md-6">
			<table style="margin-left:0%;margin-top:16%;  background-color:white;" class="table">
				<tr class="ml1">
					<center><th colspan="2" class="letters">Kelompok 3</th><center>
				</tr>
				<tr>
					<th>Nama</th>
					<th>NIM</th>
				</tr>
				<tr>
					<td>Arman Widodo</td>
					<td>200101010097</td>
				</tr>
				<tr>
					<td>Jeremy Tumbur Mamompar</td>
					<td>200101072060</td>
				</tr>
				<tr>
					<td>Joko Sanjoyo</td>
					<td>200101072075</td>
				</tr>
				<tr>
					<td>Kimberly Fridolin </td>
					<td>210101010015</td>
				</tr>
				<tr>
					<td>Ovi Julia</td>
					<td>200101010104</td>
				</tr>
				<tr>
					<td>Putri Tjania Octaviyanti</td>
					<td>200101010095</td>
				</tr>
			</table>
		</div>
		<div class="col-md-6">
				<div id="wrapper" style="margin-right: 15%;">
				<form action="logincontroller.php" method="POST">
					<div class="form-group">
						<h1>Login</h1>
						<label>Username</label>
						<input type="text" name="username" placeholder="Masukkan username" required="" autofocus="" onclick="clickWarnaUsername(this)" onkeypress="ubahWarnaUsername(this)">
						<label>Password </label>
						<input type="password" name="password" placeholder="Masukkan password" required="" onclick="clickWarnaPassword(this)" onkeypress="ubahWarnaPassword(this)">
						<button type="submit" class="btn btn-primary">Login</button>
					</div>	
				</form>
				</div>
		</div>
	</div>
	
	
	<?php if(isset($_GET['pesan'])) { ?>
		<div class="error">
			<label>Oopps... <?php echo $_GET['pesan']; ?></label>
		</div>
	<?php } ?>
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script>
		var textWrapper = document.querySelector('.ml1 .letters');
		textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");
		
		anime.timeline({
			loop: true
		})
		.add({
			targets: '.ml1 .letter',
			scale: [0.3, 1],
			opacity: [0, 1],
			translateZ: 0,
			easing: "easeOutExpo",
			duration: 600,
			delay: (el, i) => 70 * (i + 1)
		}).add({
			targets: '.ml1 .line',
			scaleX: [0, 1],
			opacity: [0.5, 1],
			easing: "easeOutExpo",
			duration: 700,
			offset: '-=875',
			delay: (el, i, l) => 80 * (l - i)
		}).add({
			targets: '.ml1',
			opacity: 0,
			duration: 1000,
			easing: "easeOutExpo",
			delay: 1000
		});
		
		function clickWarnaUsername(x) {
		x.style.background = "yellow";
		}
		function ubahWarnaUsername(x) {
		x.style.background = "white";
		}
		function clickWarnaPassword(x) {
		x.style.background = "yellow";
		}
		function ubahWarnaPassword(x) {
		x.style.background = "white";
		}
	</script>	
</body>
</html>