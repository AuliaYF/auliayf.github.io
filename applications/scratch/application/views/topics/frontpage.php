<legend>Topics</legend>
<?php foreach($data as $row): ?>
	<?php $user_data = $this->user_model->getUser($row->starter) ?>
	<div class="content-topic-row">
		<img src="<?php echo base_url('assets/img/user.png') ?>" title="<?php echo $user_data->username ?>">
		<div class="info">
			<a href="<?php echo base_url('c/'.$page_short.'/tp/'.$row->short) ?>" class="title"><?php echo $row->title ?></a>
			<p class="desc"><?php echo $row->date_modified ?> | 0 Comment(s) | by. <a href="<?php echo base_url('user/'.$row->starter) ?>"><?php echo $user_data->username ?></a></p>
		</div>
	</div>
<?php endforeach ?>
<center>
	<ul class="pagination">
		<li><a href="#">&laquo;</a></li>
		<li class="active"><a>1</a></li>
		<li><a href="#">2</a></li>
		<li><a href="#">3</a></li>
		<li><a href="#">4</a></li>
		<li><a href="#">5</a></li>
		<li><a href="#">&raquo;</a></li>
	</ul>
</center>