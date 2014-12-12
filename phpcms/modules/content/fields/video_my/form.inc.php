	function video_my($field, $value, $fieldinfo) {
		extract($fieldinfo);
		$textheight = $textheight?$textheight:100;
		$list_str = '';
		if($value && !empty($value)) {
			$value = string2array(html_entity_decode($value,ENT_QUOTES));
			if(is_array($value)) {
				foreach($value as $_k=>$_v) {
				$list_str .= "<li id='image{$_k}' style='padding:1px'><input type='text' name='{$field}_url[]' value='{$_v[url]}' style='width:310px;' ondblclick='image_priview(this.value);' class='input-text'> <input type='text' name='{$field}_alt[]' value='{$_v[alt]}' style='width:160px;' class='input-text'> <a href=\"javascript:remove_div('image{$_k}')\">".L('remove_out', '', 'content')."</a></li>";
				}
			}
		} else {
			$list_str .= "<center><div class='onShow' id='nameTip'>".L('upload_pic_max', '', 'content')." <font color='red'>{$upload_number}</font> ".L('tips_pics', '', 'content')."</div></center>";
		}
		$list_str .= "<textarea style='width:98%;height:".$textheight."px;' name='".$field."'></textarea>";
		$string = '<input name="info['.$field.']" type="hidden" value="1">
		<fieldset class="blue pad-10">
        <legend>'.$field.'列表</legend>';
		$string .= $list_str;
		$string .= '<ul id="'.$field.'" class="picList"></ul>
		</fieldset>
		<div class="bk10"></div>
		';
		if(!defined('IMAGES_INIT')) {
			$str = '<script type="text/javascript" src="statics/js/swfupload/swf2ckeditor.js"></script>';
			define('IMAGES_INIT', 1);
		}
		$authkey = upload_key("$upload_number,$upload_allowext,$isselectimage");
		$string .= $str."<div class='picBut cu'><a herf='javascript:void(0);' onclick=\"javascript:flashupload('{$field}_images', '".L('attachment_upload')."','{$field}',change_images,'{$upload_number},{$upload_allowext},{$isselectimage}','content','$this->catid','{$authkey}')\"/> 选择".$field." </a></div>";
//add player
	  pc_base::load_sys_class('form', '', 0);
	  $playerlists = array('0'=>'请选择默认播放器');
	  $this->player = pc_base::load_model('player_my_model');
	  $playerlist = $this->player->select(array('disabled'=>0),'playerid,subject','50','playerid DESC');
	  foreach((array)$playerlist AS $k=>$v){
	  $playerlists[$v['playerid']] = $v['subject'];
	  }
$string .= form::select($playerlists,$_v['p']?$_v['p']:$defaultplayer,'name="'.$field.'_defaultplayer"');
		return $string;
	}