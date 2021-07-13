<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Admin</title>
	<link rel="stylesheet" href="assets\css\bootstrap.min.css">

	<style>
		body{
	background-color: #e3f2fd;
}
.container .col-md-4{
	border-top: 4px solid #1053EF;
}
h2{
	color: grey;
}
.btn{
	width: 340px;
}
	</style>

</head>
<body>

<div class="container mt-5">
	<div class="col-12 mt-5">
	<div class="row mt-5">
		<div class="col-12">
			
			<center>
				<h2>LOGIN ADMIN</h2>
			</center>
		</div>
	</div>
			<div class="row">
				<div class="col"></div>
				<div class="col-md-4 bg-white mt-4 pt-5 pb-4">
					<form action="index.php?page=auth&aksi=authAdmin" method="POST">
					  <div class="form-group">
					    <label>Email</label>
					    <input type="email" class="form-control" name="email">
					  </div>
					  <div class="form-group">
					    <label>Password</label>
					    <input type="password" class="form-control" name="password">
					  </div>
					  <div class="form-group form-check">
					  </div>
					  <button type="submit" class="btn btn-primary">Login</button>
					</form>
				</div>
				<div class="col"></div>
			</div>
			<div class="row mt-4 text-white">
				<div class="col-12">
					<center>
						<p class="text-secondary">Copyright © 2021 Sistem Informasi Toko Sambal</p>
					</center>
				</div>
			</div>
	
	</div>
</div>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>