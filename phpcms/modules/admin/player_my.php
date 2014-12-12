<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_app_class('admin','admin',0);
class player_my extends admin {
	function __construct() {
		$this->db = pc_base::load_model('player_my_model');
		pc_base::load_sys_class('form', '', 0);
		parent::__construct();
	}
	
	function init () {
		$page = $_GET['page'] ? $_GET['page']:'1';
		$infos = $this->db->listinfo('','playerid DESC',$page ,'20');
		$pages = $this->db->pages;	
		$str = '添加播放器';
		$big_menu = array('javascript:window.top.art.dialog({id:\'add\',iframe:\'?m=admin&c=player_my&a=add\', title:\''.$str.'\', width:\'450\', height:\'300\'}, function(){var d = window.top.art.dialog({id:\'add\'}).data.iframe;var form = d.document.getElementById(\'dosubmit\');form.click();return false;}, function(){window.top.art.dialog({id:\'add\'}).close()});void(0);', $str);
		include $this->admin_tpl('player_list_my');
	}

		/**
	 * 验证数据有效性 
	 */
	public function public_name() {
			$subject = isset($_GET['subject']) && trim($_GET['subject']) ? (CHARSET == 'gbk' ? iconv('utf-8', 'gbk', trim($_GET['subject'])) : trim($_GET['subject'])) : exit('0');
			//修改检测
			$playerid = isset($_GET['playerid']) && intval($_GET['playerid']) ? intval($_GET['playerid']) : '';
	 		$data = array();
			if ($playerid) {
				$data = $this->db->get_one(array('playerid'=>$playerid), 'subject');
				if (!empty($data)) {
					exit('1');
				}
			}
			//添加检测
			if ($this->db->get_one(array('subject'=>$subject), 'playerid')) {
				exit('0');
				} else {
				exit('1');
			}
		}

	function add(){
			if(isset($_POST['dosubmit'])){
				$this->db->insert($_POST['info']);
				showmessage(L('operation_success'),'?m=admin&c=player_my&a=add','', 'add');
			}else{
				$show_validator = $show_scroll = $show_header = true;
	 			include $this->admin_tpl('player_add_my');
		}
	
	}

		function edit(){
			$playerid = intval($_GET['playerid']?$_GET['playerid']:$_POST['playerid']);
			if(isset($_POST['dosubmit'])){
				$this->db->update($_POST['info'],array('playerid'=>$playerid));
				showmessage(L('operation_success'),'?m=admin&c=player_my&a=init','', 'init');
			}else{
				$show_validator = $show_scroll = $show_header = true;
				$info = $this->db->get_one(array('playerid'=>$playerid));
			    if(!$info) showmessage('播放器不存在!');
	 			include $this->admin_tpl('player_add_my');
		}
	
	}

		/**
	 * 删除播放器
	 */
	function delete() {
 		if(is_array($_POST['playerid'])){
				foreach($_POST['playerid'] as $keylinkid_arr) {
					$this->db->delete(array('playerid'=>$keylinkid_arr));
				}
				showmessage(L('operation_success'),'?m=admin&c=player_my');	
		} else {
			$keylinkid = intval($_GET['playerid']);
			if($keylinkid < 1) return false;
			$result = $this->db->delete(array('playerid'=>$keylinkid));
			if($result){
				showmessage(L('operation_success'),'?m=admin&c=player_my');
			}else {
				showmessage(L("operation_failure"),'?m=admin&c=player_my');
			}
		}
	}

	/**
 * 禁用播放器
 */
 function changestatus(){
	 $playerid = intval($_GET['playerid']);
	 $status = intval($_GET['status']);
 if(!$playerid) showmessage('未选择需要操作的播放器','?m=admin&c=player_my');
 if(!isset($status)) showmessage('未选择播放器的状态','?m=admin&c=player_my');
 $issuccess = $this->db->update(array('disabled'=>$status?0:1),array('playerid'=>$playerid));
 $issuccess?showmessage(L('operation_success'),'?m=admin&c=player_my'):showmessage(L("operation_failure"),'?m=admin&c=player_my');
 }

}
?>