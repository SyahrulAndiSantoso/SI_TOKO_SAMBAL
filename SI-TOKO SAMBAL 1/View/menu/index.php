<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <link rel="stylesheet" href="assets\css\bootstrap.min.css">
    <link rel="stylesheet" href="assets\css\style.css">
    <script src="https://kit.fontawesome.com/3b243b46ca.js" crossorigin="anonymous"></script>
    
   
</head>
<body>

	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-light bg-primary fixed-top">
  <a class="navbar-brand pl-5 text-white" href="index.php?page=dashbord&aksi=view">SELAMAT DATANG ADMIN  |  <b>Sistem Informasi Toko Sambal</b></a>
   <div class="form-inline ml-auto">
   	<a href="index.php?page=auth&aksi=logout" class="btn btn-danger">Logout</a>
   </div>
  </div>
  <br>
</nav>
	<!-- Akhir Navbar -->


<!-- Sidebar -->
<div class="sidebar bg-dark">
		<div class="container mt-5 pt-2 pr-4">

		
			<center>
		<img src="assets\img\1.jpg" width="50%" style="border : 3px solid blue;" class="rounded-circle img-thumbnail">
		</center>
		 <?php foreach($data as $row) : ?>
        <p class="display-5 text-white mt-2 text-center"><?= $row['nama_admin'] ?></p>
		<hr class="bg-secondary">
		<?php endforeach; ?>
	
			<ul class="nav flex-column ml-2">
				  <li class="nav-item pt-2">
				    <a class="nav-link text-white" href="index.php?page=pembeli&aksi=view"><i class="fas fa-users mr-2"></i>Data Pembeli</a><hr class="bg-secondary">
				  </li>
				  <li class="nav-item pt-2">
				    <a class="nav-link text-white" href="index.php?page=produk&aksi=view">	<i class="fas fa-archive mr-2"></i>Data Produk</a><hr class="bg-secondary">
				  </li>
				   <li class="nav-item pt-2">
				    <a class="nav-link text-white" href="index.php?page=transaksi&aksi=view"><i class="fas fa-handshake mr-2"></i>Transaksi</a><hr class="bg-secondary">
				  </li>

			</ul>

		</div>
	</div>


	<!-- Akhir Sidebar -->



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>
</html>