<?php
defined('IN_PHPCMS') or exit('No permission resources.');

pc_base::load_app_func('util','content');
class tag {
	private $db;
	function __construct() {
		$this->db = pc_base::load_model('content_model');
		$this->keyword_db = pc_base::load_model('keyword_model');
		$this->siteid = get_siteid();
	}
	
	public function init() {
		$page = max($_GET['page'], 1);
		$pagesize = 100;
		$where = '`siteid`='.$this->siteid;
		$infos = $this->keyword_db->listinfo($where, '`searchnums` DESC, `videonum` DESC', $page, $pagesize, '' , 5 , APP_PATH . 'tags_{$page}.html' );
		$pages = $this->keyword_db->pages;
		$SEO = seo($this->siteid, '', '标签');
		include template('content', 'tag');
	}

	/**
	 * 按照模型搜索
	 */
	public function lists() {
		
		$tag = safe_replace(addslashes($_GET['tag']));
		$keyword_data_db = pc_base::load_model('keyword_data_model');
		//获取标签id
		$r = $this->keyword_db->get_one(array('keyword'=>$tag, 'siteid'=>$this->siteid), 'id');
		if (!$r['id']) showmessage('不存在此关键字！');
		$tagid = intval($r['id']);
		$page = max($_GET['page'], 1);
		$pagesize = 20;
		$where = '`tagid`=\''.$tagid.'\' AND `siteid`='.$this->siteid;
		$infos = $keyword_data_db->listinfo($where, '`id` DESC', $page, $pagesize, '' , 5 , APP_PATH . 'tag_lists_' . urlencode($tag) . '_{$page}.html' );
		$pages = $keyword_data_db->pages;
		$total = $keyword_data_db->number;
		if (is_array($infos)) {
			$datas = array();
			foreach ($infos as $info) {
				list($contentid, $modelid) = explode('-', $info['contentid']);
				$this->db->set_model($modelid);
				$res = $this->db->get_one(array('id'=>$contentid), 'title, description, url, inputtime, thumb');
				$res['title'] = str_replace($tag, '<font color="#f00">'.$tag.'</font>', $res['title']);
				$res['description'] = str_replace($tag, '<font color="#f00">'.$tag.'</font>', $res['description']);
				$datas[] = $res;
			}
		}
		$SEO = seo($this->siteid, '', $tag);
		include template('content','tag_list');
	}
}
?>