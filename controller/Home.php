<?php
namespace controller;

use ifeiwu\Controller;

class Home extends Controller
{

	public function _init()
	{
		$site = theme(site());
		
		$this->layout(true, $site['theme']);
		$this->assign('site', $site);
	}

	public function index($year)
	{
		$db = db();

		//年份
		$years = $db->select('item', "date_format(from_UNIXTIME(ctime), '%Y') as year, COUNT(*) as count")
					->group("date_format(from_UNIXTIME(ctime), '%Y')")
					->all();

		$years = array_reverse($years);
		$this->assign('years', $years);
	
		//博客，可按年份过虑
		$where = "nid = 2 AND state = 1";
		
		if ($year)
		{
			$where .= " AND date_format(from_UNIXTIME(ctime), '%Y') = {$year}";
		}

		$page = $_GET['p'];
		$page = $page ? $page - 1 : 0;
		$prepage = 8;
		
		$total = $db->select('item')->where($where)->count();
		$items = $db->select('item', array('id', 'title', 'ctime'))
					->where($where)
					->order('sortby DESC, ctime DESC')
					->limit(array($page * $prepage, $prepage))
					->all();

		\ifeiwu\Loader::extend('Paginator');
		$urlPattern = '?p=(:num)';
		if ($year) {
			$urlPattern = $year . '/?p=(:num)';
		}
		$pager = new \Paginator($total, $prepage, $page + 1, $this->view->url($urlPattern));

		$this->assign('pager', $pager);
		$this->assign('year', $year);
		$this->assign('items', $items);
		$this->assign(seo($year, $this->title));
		$this->display();
	}

	public function blog($id, $request)
	{
		$db = db();
		
		$item = $db->select('item')->where("id = $id AND state = 1")->get();
	
		if ($item)
		{
			$this->assign('item', $item);
			
			//上一页/下一页
			$ctime = $item['ctime'];
			$item_prev = $db->select('item', array('id', 'title'))
							->where("state = 1 AND nid = 2 AND ctime > $ctime")
							->order('ctime ASC')
							->get();
							
			$item_next = $db->select('item', array('id', 'title'))
							->where("state = 1 AND nid = 2 AND ctime < $ctime")
							->order('ctime DESC')
							->get();
							
			$this->assign('item_prev', $item_prev);
			$this->assign('item_next', $item_next);
			
			//相关文章
			$tag = $item['tag'];
			if ($tag)
			{
				$tags = explode(' ', $tag);
				$where_tags = array();
				foreach ($tags as $value) {
					$where_tags[] = "tag LIKE '%$value%'";
				}
				$articles = $db->select('item', 'id, title')
							 ->where("state = 1 AND nid = 2 AND id != $id AND (" . implode(' OR ', $where_tags) . ")")
							 ->order('ctime DESC')
							 ->limit(5)
							 ->all();
							 
				$this->assign('articles', $articles);
			}
			
			$this->assign(seo($item['title'], $this->title, $item['keywords'], $item['description']));
			$this->display();
		}
		else
		{
			redirect($request->root());
		}
	}

}
