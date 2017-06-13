<main class="fw-index">
	<section class="about">
		<div class="cover" style="background-image:url(<?php echo $this->url('data/'.$site['my_cover']);?>)">
			<div class="info">
				<hgroup>
					<h1 id="my_name" style="color:<?php echo $site['my_name_color'];?>;"><?php echo $site['my_name'];?></h1>
					<h6 style="color:<?php echo $site['my_job_color'];?>;"><?php echo $site['my_job'];?></h6>
				</hgroup>
				<?php echo $this->decode($site['my_intro']);?>
				<!--<ul class="list-float clearfix sns">
					<li><a href="#">新浪微博</a></li>
					<li><a href="#">微信</a></li>
					<li><a href="#">豆瓣</a></li>
				</ul>-->
			</div>
			<!--<div class="mask" style="background-image:linear-gradient(180deg, rgba(255,255,255,0) 0, <?php echo $site['my_cover_precolor'];?> 100%);"></div>-->
		</div>
	</section>
	<section class="blog">
		<?php if ($years):?>
		<div class="year">
			<a href="#" class="year-menu">
				<svg viewBox="0 0 24 24">
				    <path fill="#ffffff" d="M12,20A7,7 0 0,1 5,13A7,7 0 0,1 12,6A7,7 0 0,1 19,13A7,7 0 0,1 12,20M19.03,7.39L20.45,5.97C20,5.46 19.55,5 19.04,4.56L17.62,6C16.07,4.74 14.12,4 12,4A9,9 0 0,0 3,13A9,9 0 0,0 12,22C17,22 21,17.97 21,13C21,10.88 20.26,8.93 19.03,7.39M11,14H13V8H11M15,1H9V3H15V1Z" />
				</svg>
			</a>
			<ul class="year-list">
				<li><a href="<?php echo $this->url();?>" class="last <?php echo active($year, '');?>">最近</a></li>
				<?php foreach ($years as $value):?>
				<li><a href="<?php echo $this->url($value['year']);?>" class="<?php echo active($year, $value['year']);?>"><?php echo $value['year'];?></a></li>
				<?php endforeach;?>
			</ul>
		</div>
		<?php endif;?>
		<?php if ($items):?>
		<ul class="blog-list">
			<?php include 'blog_li.php';?>
		</ul>
		<div class="ajax-loading">loading...</div>
		<?php else:?>
		<div class="no-data"><?php echo $year;?>年，没有记录！</div>
		<?php endif;?>

        <?php
        $numPages = $pager->getNumPages();
        if ($numPages > 1):
            $prevUrl = $pager->getPrevUrl();
            $nextUrl = $pager->getNextUrl();
        ?>
		<ul class="blog-pager">
			<li>
				<a href="<?php echo $prevUrl?$prevUrl:'javascript:;'; ?>" class="prev">
					<svg style="width:32px;height:32px" viewBox="0 0 24 24">
                        <path fill="<?php echo $prevUrl?'#333333':'#999999'; ?>" d="M15.41,16.58L10.83,12L15.41,7.41L14,6L8,12L14,18L15.41,16.58Z" />
                    </svg>
				</a>
			</li>
            <li><?php echo $pager->getCurrentPage().'/'.$numPages;?></li>
			<li>
				<a href="<?php echo $nextUrl?$nextUrl:'javascript:;'; ?>" class="next">
					<svg style="width:32px;height:32px" viewBox="0 0 24 24">
                        <path fill="<?php echo $nextUrl?'#333333':'#999999'; ?>" d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" />
                    </svg>
				</a>
			</li>
		</ul>
        <?php endif;?>
	</section>
</main>
