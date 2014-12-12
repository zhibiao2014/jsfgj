<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header');
?>
<?php if($_GET['a']!='edit'){ ?>
<script type="text/javascript">
<!--
	$(function(){
		$.formValidator.initConfig({formid:"myform",autotip:true,onerror:function(msg,obj){window.top.art.dialog({content:msg,lock:true,width:'200',height:'50'}, function(){this.close();$(obj).focus();})}});
		
		$("#subject").formValidator({onshow:"<?php echo L('input').'播放器名称'?>",onfocus:"<?php echo L('input').'播放器名称'?>"}).inputValidator({min:1,onerror:"<?php echo L('input').'播放器名称'?>"}).ajaxValidator({type : "get",url : "",data :"m=admin&c=player_add_my&a=public_name<?php echo $_GET['a']=='edit'?'&playerid='.$playerid.'&subject="+$(\'#subject\').val()+"':'';?>",datatype : "html",async:'false',success : function(data){	if( data == "1" ){return true;}else{return false;}},buttons: $("#dosubmit"),onerror : "播放器名称已经存在", onwait : "<?php echo L('connecting')?>"});
		
	})
//-->
</script>
<?php } ?>

<div class="pad_10">
<form action="?m=admin&c=player_add_my&a=<?php echo $_GET['a'],$_GET['a']=='edit'?'&playerid='.$playerid.'':'';?>" method="post" name="myform" id="myform" >
<table width="100%" cellpadding="2" cellspacing="1" class="table_form">
	<tr> 
      <th width="60">名称 :</th>
      <td><input type="text" name="info[subject]" id="subject" size="25" value="<?php echo $info['subject'];?>"></td>
    </tr>
	<tr> 
      <th>播放器代码 :</th>
      <td><TEXTAREA NAME="info[code]" ROWS="15" COLS="50" id="code"><?php echo $info['code'];?></TEXTAREA><br>视频文件路径使用 {$filepath} 代替!<br>网站根目录路径使用 {$siteurl} 代替!</td>
    </tr>  

	  <input type="submit" name="dosubmit" id="dosubmit" class="dialog" value=" <?php echo L('submit')?> ">

</table> 
 	</form>
</div>
</body>
</html> 