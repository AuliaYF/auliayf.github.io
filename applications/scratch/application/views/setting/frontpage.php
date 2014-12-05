<div class="paper-shadow-bottom-z-1" style="background: #eee;">
	<ul class="nav nav-tabs" role="tablist" id="myTab">
		<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Preview</a></li>
		<li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
	</ul>

	<div class="tab-content" style="padding: 16px;">
		<div role="tabpanel" class="tab-pane active" id="home">
			<legend><?php echo $data->welcome_title ?></legend>
			<p>
				<?php echo $data->welcome_content ?>
			</p>
		</div>
		<div role="tabpanel" class="tab-pane" id="settings">
			<?php echo form_open($form_action); ?>
				<div class="row">
					<div class="form-group col-md-6">
						<label for="name_first">First Name</label>
						<input type="text" id="name_first" class="form-control" name="name_first" value="<?php echo $data->name_first ?>">
						<?php echo form_error('name_first', '<p class="help-block">', '</p>'); ?>
					</div>
					<div class="form-group col-md-6">
						<label for="name_last">Last Name</label>
						<input type="text" id="name_last" class="form-control" name="name_last" value="<?php echo $data->name_last ?>">
						<?php echo form_error('name_last', '<p class="help-block">', '</p>'); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="profile_pic">Profile Picture</label>
					<input type="file" id="profile_pic" name="profile_pic">
				</div>
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" id="username" class="form-control" name="username" value="<?php echo $data->username ?>">
					<?php echo form_error('username', '<p class="help-block">', '</p>'); ?>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" id="email" class="form-control" name="email" value="<?php echo $data->email ?>">
					<?php echo form_error('email', '<p class="help-block">', '</p>'); ?>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" id="password" class="form-control" name="password" value="<?php echo $this->encrypt->decode($data->password) ?>">
					<?php echo form_error('password', '<p class="help-block">', '</p>'); ?>
				</div>
				<div class="form-group">
					<label for="welcome_title">Welcome Title</label>
					<input type="text" id="welcome_title" class="form-control" name="welcome_title" value="<?php echo $data->welcome_title ?>">
					<?php echo form_error('welcome_title', '<p class="help-block">', '</p>'); ?>
				</div>
				<div class="form-group">
					<label for="welcome_content">Welcome Content</label>
					<textarea class="form-control" id="welcome_content" name="welcome_content"><?php echo $data->welcome_content ?></textarea>
					<?php echo form_error('welcome_content', '<p class="help-block">', '</p>'); ?>
				</div>
				<div class="form-group">
					<label for="header_background">Header background</label>
					<input type="color" id="header_background" class="form-control" name="header_background" value="<?php echo $data->header_background ?>">
				</div>
				<section class="row"><h3 class="hidden">Save</h3>
					<div class="col-md-12">
						<div class="pull-right">
							<input type="submit" id="submit" name="submit" class="btn btn-success" value="Save"></button>
						</div>
						<div class="clearfix"></div>
					</div>
				</section>
			</form>
		</div>
	</div>
</div>