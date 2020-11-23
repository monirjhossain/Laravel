<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>tools/css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>tools/fonts/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>tools/css/auth.css">
</head>
<body>
<div class="container">
	<div class="title_box">
		<div class="row">
			<div class="col-sm-12">
				<nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-3">
			        <div class="container">
			            <a class="navbar-brand" href="#"><font face="FreeMono">E-Shop</font></a>
			            <ul class="navbar-nav">
			                <li class="nav-item">
			                    <a class="nav-link" href="#">Home</a>
			                </li>
			                <li class="nav-item">
			                    <a class="nav-link" href="#">Kits</a>
			                </li>
			                <li class="nav-item">
			                    <a class="nav-link" href="#">Electronics</a>
			                </li>
			                <li class="nav-item">
			                    <a class="nav-link" href="#">Contact</a>
			                </li>
			                <li class="nav-item">
			                    <a class="nav-link" href="<?php echo base_url().'home/login' ?>"><i class="fa fa-sign-in"></i></a>
			                </li>
			            </ul>
			        </div>
			    </nav>
			</div>
		</div>
	</div>
	<div class="login_box">
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group">
					<label>Enter Name</label>
					<input type="name" name="name" class="form-control" placeholder="Your Name"> 
				</div>
				<div class="form-group">
					<label>Enter E-Mail (Username)</label>
					<input type="email" name="username" class="form-control" placeholder="username@example.com"> 
				</div>
				<div class="form-group">
					<label>Enter Mobile No</label>
					<input type="text" name="mobile_no" class="form-control" placeholder="+91 6265521071"> 
				</div>
				<div class="form-group">
					<label>Enter Password</label>
					<input type="password" name="password" class="form-control" placeholder="***********"> 
				</div> 
				<div class="form-group">
					<button type="submit" class="btn btn-info">SignUp</button>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<center><a href="<?php  echo base_url().'home/login' ?>">Have An Account <span class="text-info"><b>Login</b></span></a></center>
			</div>
		</div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="<?php echo base_url() ?>tools/js/swiper.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>tools/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>tools/js/auth.js"></script>
</body>
</html>