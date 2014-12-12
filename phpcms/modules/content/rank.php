<?php
defined('IN_PHPCMS') or exit('No permission resources.');

pc_base::load_app_func('util','content');
class rank {
	private $db;
	function __construct() {
		$this->votes_db = pc_base::load_model('votes_model');
    $this->votes_types_db = pc_base::load_model('votes_types_model');
    $this->votes_option_db = pc_base::load_model('votes_option_model');
    $this->siteid = get_siteid();
  }

  public function index() {
    $siteid = $this->siteid;
    $page = max($_GET['page'], 1);
    $pagesize = 20;
    $ranks = $this->votes_db->listinfo('show_status=1', '`vote_count` DESC', $page, $pagesize, '' , 5 , APP_PATH . 'rank_{$page}.html' );
    $ranks = $this->votes_option_db->rank_thumbnail_set($ranks);
    $pages = $this->votes_db->pages;
    $tags = $this->votes_types_db->listinfo('', '', 1, 100);
    $tags = key_switch($tags);
    $SEO['keyword'] = "景点排行榜,小吃排行榜,中国城市排行榜,明星排行榜";
    $SEO['description'] = "中国城市网全力打造各大领域排行榜，为您提供最实用的";
    foreach ($tags as $key => $tag) {
      $SEO['description'] .= $tag['names'] . '排行,';
    }
    $SEO['description'] .= "等海量排行榜,及时发布最权威的排行榜榜单,是最全面排行网站。";
    $SEO['title'] = "中国城市排行榜 - 中国城市网";
    include template('content', 'rank');
  }

  public function lists() {
    $siteid = $this->siteid;
    $catid = $_GET['catid'] = intval($_GET['catid']);
    if(!$catid) showmessage(L('category_not_exists'),'blank');
    $page = intval($_GET['page']);
    $page = max($page, 1);
    $pagesize = 20;
    $ranks = $this->votes_db->listinfo('show_status=1 and vtid = ' . $catid, '`id` DESC', $page, $pagesize, '' , 5 , APP_PATH . 'rank_lists_' . $catid . '_' . '{$page}.html' );
    $ranks = $this->votes_option_db->rank_thumbnail_set($ranks);
    $pages = $this->votes_db->pages;
    $tags = $this->votes_types_db->listinfo('', '', 1, 100);
    $tags = key_switch($tags);
    $current_tag = $tags[$catid];
    $SEO['keyword'] = $current_tag['names'] . "排行榜, 中国城市排行榜";
    $SEO['description'] = $current_tag['names'] . "排行榜";
    $SEO['title'] = $current_tag['names'] . "排行榜 - 中国城市排行榜 - 中国城市网";

    include template('content','rank_list');
  }

  function show() {
    $siteid = $this->siteid;
    $catid = $_GET['catid'] = intval($_GET['catid']);
    if(!$catid) showmessage(L('category_not_exists'),'blank');
    $id = $_GET['id'] = intval($_GET['id']);
    if(!$catid) showmessage(L('information_does_not_exist'),'blank');
    $rank = $this->votes_db->get_one('show_status=1 and vtid = ' . $catid . ' and id = ' . $id);
    if ( empty($rank) ) {
      showmessage(L('information_does_not_exist'),'blank');
    }

    $options = $this->votes_option_db->listinfo('sv_id = ' . $id, '`weight` DESC', 1, 100 );

    $tags = $this->votes_types_db->listinfo('', '', 1, 100);
    $tags = key_switch($tags);

    $current_tag = $tags[$catid];
    $SEO['keyword'] = $current_tag['names'] . "排行榜, 排行榜, 中国城市网";
    if ( empty($rank['contact'])) {
      $SEO['description'] = "中国城市网全力打造各大领域排行榜。";
      foreach ($tags as $key => $tag) {
        $SEO['description'] .= $tag['names'] . '排行榜 ';
      }
    } else {
      $SEO['description'] = $rank['contact'];
    }
    $SEO['title'] = $rank['votes_name'] . "--中国城市网";
    include template('content','rank_show');
  }

}
?>