<?php foreach ($items as $item):?>
<li>
	<a href="<?php echo $this->url('blog/'.$item['id']);?>" target="_blank">
		<h5><?php echo $item['title'];?></h5>
		<div class="meta">
			<time><?php echo date('F j, Y', $item['ctime']);?></time>
		</div>
	</a>
</li>
<?php endforeach;?>