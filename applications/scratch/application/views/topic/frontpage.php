<?php $count = 0 ?>
<?php foreach($data['replies'] as $row): ?>
	<?php $user_data = $this->user_model->getUser($row->starter) ?>
	<div class="content-topic-row">
		<img src="<?php echo base_url('assets/img/user.png') ?>" title="<?php echo $user_data->username ?>">
		<div class="info">
			<?php if($count === 0){ ?>
			<a href="./sub-topic.html" class="title"><?php echo $data['topic']->title ?></a>
			<?php } ?>
			<p><?php echo parse_bbcode($row->content) ?></p>
			<p class="desc"><?php echo $row->date_modified ?> | by. <a href="<?php echo base_url('user/'.$row->starter) ?>"><?php echo $user_data->username ?></a></p>
		</div>
	</div>
	<hr>
	<?php $count++ ?>
<?php endforeach ?>
