<legend>Categories</legend>
<?php foreach($data as $row): ?>
	<div class="header-category" style="background-color: <?php echo $row->header_background ?>;">
		<div class="header-category-info">
			<a href="<?php echo base_url('c/'.$row->short) ?>" class="title"><?php echo $row->title ?></a>
			<p class="desc"><?php echo $row->desc ?></p>
		</div>
		<?php if($logged){ ?>
		<?php if($logged->level === '1'){ ?>
		<div class="navbar">
			<a href="<?php echo base_url('c/'.$row->short.'/edit') ?>"><span class="fa fa-edit"></span></a>
			<a href="<?php echo base_url('c/'.$row->short.'/remove') ?>" onClick='return confirm("Are you sure?")'><span class="fa fa-remove"></span></a>
		</div>
		<?php } ?>
		<?php } ?>
	</div>
<?php endforeach ?>
<?php if(!empty($data)){ ?>
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
<?php } ?>