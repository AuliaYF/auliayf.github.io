				<!-- Search Box -->
				<div class="search-box">
					<form action="index.php" method="POST" role="search">
						<legend>
							<div class="form-group">
								<div class="input-group ">
									<input type="search" class="form-control" placeholder="Search parameter">
									<a href="#" type="submit" class="input-group-addon"><i class="glyphicon glyphicon-search"></i></a>
								</div>
							</div>
						</legend>
					</form>
				</div>
				<!-- End of Search Box -->
				<?php if(!empty($logged)){ ?>
				<a href="<?php echo base_url('c/'.$page_short.'/tp/add') ?>" class="btn btn-primary col-md-12">New Topic</a>
				<?php } ?>