<?php
$form = array(
	'cat_title' => array(
		'id' => 'cat_title',
		'name' => 'cat_title',
		'placeholder' => 'Title',
		'rows' => '5',
		'class' => 'form-control',
		'value' => set_value('title', isset($form_value['title']) ? $form_value['title'] : '')
		), 
	'cat_desc' => array(
		'id' => 'cat_desc',
		'name' => 'cat_desc',
		'placeholder' => 'Description',
		'rows' => '5',
		'class' => 'form-control',
		'value' => set_value('desc', isset($form_value['desc']) ? $form_value['desc'] : '')
		),
	'header_background' => array(
		'id' => 'header_background',
		'name' => 'header_background',
		'title' => 'Header Background',
		'rows' => '5',
		'class' => 'form-control',
		'value' => set_value('header_background', isset($form_value['header_background']) ? $form_value['header_background'] : '')
		));
		?>
		<legend>New Category</legend>
		<?php echo form_open($form_action); ?>
		<div class="form-group">
			<label for="cat_title">Title</label>
			<?php echo form_input($form['cat_title']); ?>
			<?php echo form_error('cat_title', '<p class="help-block">', '</p>'); ?>
		</div>

		<div class="form-group">
			<label for="cat_desc">Description</label>
			<?php echo form_textarea($form['cat_desc']); ?>
		</div>
		<div class="form-group">
			<label for="header_background">Header Background</label>
			<input type="color" name="header_background" id="header_background" class="form-control" value="<?php echo isset($form_value['header_background']) ? $form_value['header_background'] : '' ?>" required="required" title="Header Background">
		</div>
		<div class="pull-right">
			<button type="reset" class="btn btn-danger">Reset</button>
			<input type="submit" name="submit" class="btn btn-primary">
		</div>
	</form>