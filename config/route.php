<?php
return array(
	
	//首页，博客列表
	'/(\d+)?' => array(
		'method' => 'GET',
		'controller' => 'Home',
		'action' => 'index'
	),
	
	//博客详细
	'/blog/(\d+)?' => array(
		'method' => 'GET',
		'controller' => 'Home',
		'action' => 'blog'
	),
	
	// 流量统计
	'/stats' => array(
		'method' => 'POST',
		'controller' => 'Stats',
		'action' => 'index'
	),
	
);
