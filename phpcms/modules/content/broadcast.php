<?php
defined('IN_PHPCMS') or exit('No permission resources.');

class broadcast {
  private $broadcast;
  private $broadcastdata;
  function __construct() {
    $this->broadcast = pc_base::load_model('word_online_model');
    $this->broadcastdata = pc_base::load_model('word_online_data_model');
  }
  //内容页
  public function show() {
    if(isset($_GET['siteid'])) {
      $siteid = intval($_GET['siteid']);
    } else {
      $siteid = 1;
    }
    $id = intval($_GET['id']);
    $broadcast = $this->broadcast->get_one(array('id'=> $id ));
    extract($broadcast);
    $previous_page = $this->broadcast->get_one("id < {$id}", "id,title", "id desc");
    $next_page = $this->broadcast->get_one("id > {$id}", "id,title" ,"id asc");
    $broadcastdata = $this->broadcastdata->listinfo(array('cid' => $id), 'time asc');
    include template('content',"broadcast");
  }
  //列表页
  public function lists() {
    if(isset($_GET['siteid'])) {
      $siteid = intval($_GET['siteid']);
    } else {
      $siteid = 1;
    }
    $page = intval($_GET['page']);
    $datas = $this->broadcast->listinfo('','updatetime desc', $page);
    $pages = $this->broadcast->pages;
    include template('content',"broadcast_list");
  }
}
?>