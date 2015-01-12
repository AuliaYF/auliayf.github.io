<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PAKET_A</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" media="screen" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" media="screen" href="<?php echo base_url('assets/css/style.css') ?>">

	<script src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<?php $this->load->view('include/head_nav'); ?>
		</div>
		<div class="row">
			<div class="col-md-12 head">
				<h1 id="judul" class="page-header">Test</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos ratione, odio quibusdam vero quo tempora commodi natus dolorem unde doloremque reprehenderit distinctio modi, aliquid deleniti mollitia sed iste sint ad!</p>
			</div>
		</div>
		<div class="wrapper">
			<div class="col-md-9 col">
				<?php $this->load->view($main_view); ?>
			</div>
			<div class="col-md-3 col">
				<section class="row">
					<h1 id="judul" class="page-header">Admin Panel</h1>
					<div class="list-group">
						<?php foreach($this->config->item('tables') as $row){ ?>
						<a href="<?php echo base_url('use/'.$row['table']) ?>" class="list-group-item <?php if($current_table === $row['table']){echo 'active'; } ?>"><?php echo $row['name'] ?></a>
						<?php }	?>
					</div>
				</section>
			</div>
		</div>
	</div>
</body>
</html>