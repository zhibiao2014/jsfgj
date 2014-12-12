<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_app_class('admin','admin',0);
class word_online extends admin {
  private $db;
  private $admin;
  private $broadcast;
  public $siteid;
  function __construct() {
    parent::__construct();
    $this->db = pc_base::load_model('word_online_model');
    $this->broadcast = pc_base::load_model('word_online_data_model');
    $this->admin = pc_base::load_model('admin_model');
    $this->siteid = $this->get_siteid();
  }

  public function init () {
    pc_base::load_sys_class('format','',0);
    $datas = $this->db->listinfo('','updatetime desc', $_GET['page']);
    $pages = $this->db->pages;
    include $this->admin_tpl('word_online_list');
  }

  public function add () {
    if(isset($_POST['dosubmit']) || isset($_POST['dosubmit_continue']) || isset($_POST['dosubmit_report'])) {
      if(trim($_POST['info']['title']) == '')  showmessage(L('title_is_empty'));
      $amdinid=$_SESSION['userid'];
      $infoadmin=$this->admin->get_one(array('userid'=>$amdinid));
      $_POST['info']['editor'] = (empty($infoadmin['realname']) ? $infoadmin['username'] : $infoadmin['realname']);
      $this->db->add_content($_POST['info']);
      if (isset($_POST['dosubmit'])) {
        showmessage(L('add_success'),'?m=content&c=word_online&a=init');
      } elseif (isset($_POST['dosubmit_continue'])) {
        showmessage(L('add_success'),HTTP_REFERER);
      } else {
        showmessage(L('add_success'),'?m=content&c=word_online&a=add');
      }
    } else {
      $show_validator = true;
      pc_base::load_sys_class('form','',0);
      include $this->admin_tpl('word_online_add');
    }
  }

  public function edit() {
    if (isset($_POST['dosubmit'])) {
      if(trim($_POST['info']['title']) == '')  showmessage(L('title_is_empty'));
      $this->db->update_content($_POST['info'], 'id = '.$_POST['id']);
      showmessage(L('update_success'),'?m=content&c=word_online&a=init');
    } else {
      $show_validator = true;
      pc_base::load_sys_class('form','',0);
      $r = $this->db->get_one(array('id' => $_GET['id']));
      if ($r) extract($r);
      include $this->admin_tpl('word_online_edit');
    }
  }

  public function delete() {
    if (isset($_GET['dosubmit'])) {
      if(isset($_GET['item'])) {
        $ids = intval($_GET['id']);
        $_POST['ids'] = array(0=>$ids);
      }
      $ids = join(",",$_POST['ids']);
      $this->db->delete("id in ({$ids})");
      showmessage(L('operation_success'),HTTP_REFERER);
    } else {
      showmessage(L('operation_failure'));
    }
  }

  public function broadcast() {
    $show_header = "";
    // showmessage("正在开发中",HTTP_REFERER);
    $show_validator = true;
    pc_base::load_sys_class('form','',0);
    $r = $this->db->get_one(array('id' => $_GET['id']));
    if ($r) extract($r);
		$relative_people = preg_split('/[,\x{FF0C}\s]+/u',$relative_people);
    include $this->admin_tpl('word_online_broadcast');
  }

  public function ajax_broadcast() {
    $is_success = $this->broadcast->insert($_POST);
    if ($is_success) {
      echo 1;
    } else {
      echo 0;
    }
  }
}
?>