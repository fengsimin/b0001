<header class="fw-header">
	<a href="<?php echo $this->url();?>" class="home"><img src="<?php echo $this->url('data/logo.png');?>"></a>
	<a href="javascript:history.go(-1)" class="back">返回</a>
</header>
<main class="fw-blog">
	<article>
		<h1 class="title"><?php echo $item['title'];?></h1>
		<div class="meta">
			<time><?php echo date('F j, Y', $item['ctime']);?></time>
		</div>
		<div class="content">
			<?php echo $this->decode($item['content']);?>
		</div>
	</article>
	<aside>
		<hr class="hr">
        <dl class="page">
            <?php if ($item_prev):?>
            <dt>上一篇：</dt>
            <dd><a href="<?php echo $this->url('blog/'.$item_prev['id']);?>"><?php echo $item_prev['title'];?></a></dd>
            <?php endif;?>
			<?php if ($item_next):?>
            <dt>下一篇：</dt>
            <dd><a href="<?php echo $this->url('blog/'.$item_next['id']);?>"><?php echo $item_next['title'];?></a></dd>
            <?php endif;?>
        </dl>
		<?php if ($articles):?>
		<div class="relevant">
			<h5>相关文章</h5>
			<ul>
				<?php foreach($articles as $article):?>
	            <li><a href="<?php echo $this->url('blog/'.$article['id']);?>"><?php echo $article['title'];?></a></li>
	            <?php endforeach;?>
			</ul>
		</div>
		<?php endif;?>
	</aside>
    <ul class="scroll">
        <li>
            <a href="#" class="up">
                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                    <path fill="#000000" d="M7.41,15.41L12,10.83L16.59,15.41L18,14L12,8L6,14L7.41,15.41Z" />
                </svg>
            </a>
        </li>
        <li>
            <a href="#" class="down">
                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                    <path fill="#000000" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
                </svg>
            </a>
        </li>
    </ul>
</main>
<footer class="fw-footer">
	<?php echo $this->decode($site['footer']);?>
</footer>
