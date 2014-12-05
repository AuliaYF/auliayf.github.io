<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $page_title ?></title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" media="screen" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">

	<!-- Custom CSS -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css') ?>">

	<!-- Font Roboto -->
	<link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">

	<style>
		.header{
			background: <?php echo $page_header_background; ?>;
		}
		.nav-tabs{
		}
		.nav-tabs>li.active>a, .nav-tabs>li.active>a:hover, .nav-tabs>li.active>a:focus{
			border: 5px solid #eee;
			border-right: 0px; border-left: 0px; border-top: 0px;
			border-bottom-color: #fff;
			background: #eee;
		}
		.nav-tabs>li>a{
			border-radius: 0px;
		}
		.nav-tabs>li>a:hover{
			border-color: #eee #eee #eee;

			background: rgba(255,255,255,0.7);
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="header">
				<div class="header-info">
					<p class="title"><?php echo $page_title ?></p>
					<p class="desc"><?php echo $page_desc ?></p>
				</div>
				<div class="navbar">
					<a href="<?php echo base_url() ?>">Home</a>
					<?php if($logged): ?>
						<a href="<?php echo base_url('user/'.$logged->id) ?>">Profile</a>
						<a href="<?php echo base_url('setting') ?>">Setting</a>
					<?php endif ?>
					<a href="#">About</a>
				</div>
			</div>
		</div>
		<div class="row content">
			<div class="col-md-8">
				<?php $this->load->view($main_view); ?>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-3 container-sidebar">
				<?php if(!$logged){ ?>
				<!-- Login Box -->
				<div class="login-box">
					<form action="<?php echo base_url('auth/login') ?>" method="POST" role="login">
						<legend>
							Login
							<div class="form-group">
								<input type="text" name="username" class="form-control" placeholder="Username">
							</div>
							<div class="form-group">
								<input type="password" name="password" class="form-control" placeholder="Password">
							</div>
							<div class="form-group">
								<input type="submit" name="submit" class="btn btn-primary" style="width: 100%" value="Login">
							</div>
						</legend>
					</form>
				</div>
				<!-- End of Login Box -->
				<?php }else{ ?>
				<legend>Logged in as <?php echo anchor(base_url('user/'.$logged->id), $logged->username) ?></legend>
				<legend><a href="<?php echo base_url('auth/logout') ?>" class="btn btn-danger" style="width: 100%;">Logout</a></legend>
				<?php } ?>
				<?php $this->load->view($sidebar); ?>
			</div>
		</div>
	</div>
	<script src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
	
	<script>
		$(function () {
			<?php if(!$isError){ ?>
				$('#myTab a:first').tab('show')
				<?php }else{ ?>
					$('#myTab a:last').tab('show')
					<?php } ?>
				})
			</script>
		</body>
		</html>