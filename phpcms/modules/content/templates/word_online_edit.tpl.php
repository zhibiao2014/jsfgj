<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header','admin');?>
<script type="text/javascript"> 
<!--
$(function(){
  $.formValidator.initConfig({formid:"myform",autotip:true,onerror:function(msg,obj){window.top.art.dialog({content:msg,lock:true,width:'200',height:'50'}, function(){this.close();$(obj).focus();})}});
  $("#title").formValidator({onshow:"<?php echo L('input_title');?>",onfocus:"<?php echo L('input_title');?>",oncorrect:"<?php echo L('input_right');?>"}).inputValidator({min:1,onerror:"<?php echo L('input_title');?>"});
    // $("#catdir").formValidator({onshow:"<?php echo L('input_dirname');?>",onfocus:"<?php echo L('input_dirname');?>"}).regexValidator({regexp:"^([a-zA-Z0-9、-]|[_]){0,30}$",onerror:"<?php echo L('enter_the_correct_catname');?>"}).inputValidator({min:1,onerror:"<?php echo L('input_dirname');?>"}).ajaxValidator({type : "get",url : "",data :"m=admin&c=category&a=public_check_catdir",datatype : "html",cached:false,getdata:{parentid:'parentid'},async:'false',success : function(data){  if( data == "1" ){return true;}else{return false;}},buttons: $("#dosubmit"),onerror : "<?php echo L('catname_have_exists');?>",onwait : "<?php echo L('connecting');?>"});
    // $("#url").formValidator({onshow:" ",onfocus:"<?php echo L('domain_name_format');?>",tipcss:{width:'300px'},empty:true}).inputValidator({onerror:"<?php echo L('domain_name_format');?>"}).regexValidator({regexp:"http:\/\/(.+)\/$",onerror:"<?php echo L('domain_end_string');?>"});
  $("#relative_people").formValidator({onshow:"多个名字用，分隔",onfocus: "多个名字用，分隔"});
  })
//-->
</script>
<form name="myform" id="myform" action="?m=content&c=word_online&a=edit" method="post">
  <input name="id" value="<?php echo $id; ?>" type="hidden" />
  <div class="pad_10">
    <table width="100%" class="table_form ">
      <tr>
        <th><?php echo L('title')?>：</th>
        <td><input type="text" name="info[title]" id="title" class="input-text" value="<?php echo $title; ?>" size="50"></td>
      </tr>
      <tr>
        <th><?php echo L('keywords')?>：</th>
        <td><input type="text" name="info[keywords]" id="keywords" class="input-text" value="<?php echo $keywords; ?>" size="50"></td>
      </tr>
      <tr>
        <th><?php // echo L('keywords')?>相关人物：</th>
        <td><input type="text" name="info[relative_people]" id="relative_people" class="input-text" value="<?php echo $relative_people; ?>" size="50"></td>
      </tr>
      <tr>
        <th><?php echo "直播缩略图片"; // L('word_online_image'); ?>：</th>
        <td><?php echo form::images('info[thumb]', 'thumb', $thumb, 'content');?></td>
      </tr>
      <tr>
        <th><?php echo L('description')?>：</th>
        <td>
          <textarea name="info[description]" style="width:600px;height:130px;"><?php echo $description;?></textarea>
        </td>
      </tr>
    </table>
  </div>
  <div class="fixed-bottom">
    <div class="fixed-but text-c">
      <div class="button"><input value="<?php echo L('save_close');?>" type="submit" name="dosubmit" class="cu" style="width:145px;"></div>
    </div>
  </div>
</form>
<script language="JavaScript">
<!--
window.top.$('#display_center_id').css('display','none');
//-->
</script>
</body>
</html>