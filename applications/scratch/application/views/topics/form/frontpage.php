<?php
$form = array(
	'topic_title' => array(
		'id' => 'topic_title',
		'name' => 'topic_title',
		'placeholder' => 'Title',
		'rows' => '5',
		'class' => 'form-control',
		'value' => set_value('title', isset($form_value['title']) ? $form_value['title'] : '')
		), 
	'topic_content' => array(
		'id' => 'topic_content',
		'name' => 'topic_content',
		'title' => 'Header Background',
		'rows' => '5',
		'class' => 'form-control',
		'value' => set_value('topic_content', isset($form_value['topic_content']) ? $form_value['topic_content'] : '')
		));
		?>
		<legend>New Topic</legend>
		<?php echo form_open($form_action); ?>
		<div class="form-group">
			<label for="topic_title">Title</label>
			<?php echo form_input($form['topic_title']); ?>
			<?php echo form_error('topic_title', '<p class="help-block">', '</p>'); ?>
		</div>
		<div class="form-group">
			<label for="topic_content">Description</label>
			<br>
			<div class="btn-group btn-group-justified">
				<?php js_insert_bbcode('topic_content') ?>
				<?php
				foreach(get_bbcode_buttons() as $btn){
					echo '<div class="btn-group" role="group">';
					echo $btn;
					echo '</div>';
				}
				?>
			</div>
			<div class="rich">
				<?php echo form_textarea($form['topic_content']); ?>
			</div>
		</div>
		<div class="pull-right">
			<button type="reset" class="btn btn-danger">Reset</button>
			<input type="submit" name="submit" class="btn btn-primary">
		</div>
	</form>