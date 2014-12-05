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
				<?php if(!empty($logged)){ ?>
				<legend><a href="<?php echo base_url('c/'.$page_short.'/tp/add') ?>" class="btn btn-primary" style="width: 100%;">New Topic</a></legend>
				<legend><a class="btn btn-success" style="width: 100%">Post to this topic</a></legend>
				<?php } ?>