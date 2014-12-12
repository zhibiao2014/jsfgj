<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header','admin');?>
<script type="text/javascript"> 
<!--
$(function(){
  $.formValidator.initConfig({formid:"myform",autotip:true,onerror:function(msg,obj){window.top.art.dialog({content:msg,lock:true,width:'200',height:'50'}, function(){this.close();$(obj).focus();})}});
  $("#title").formValidator({onshow:"<?php echo L('input_title');?>",onfocus:"<?php echo L('input_title');?>",oncorrect:"<?php echo L('input_right');?>"}).inputValidator({min:1,onerror:"<?php echo L('input_title');?>"});
})
//-->
</script>
<style type="text/css">
.pad_10 .title {
  font-size: 20px;
  height: 33px;
  line-height: 33px;
}
.pad_10 p{
  font-size: 12px;
  line-height: 22px;
}
.pad_10 .keywords {
  text-align: center;
}
.pad_10 .desc {
  text-indent: 24px;
}
.pad_10 p.keywords span{
  padding: 0 10px;
}
#preview {
  position: relative;
  color: #444;
  padding: 30px;
}
#preview p {
  padding: 15px;
  background: #F5F5F5;
  border: #CCC 1px dashed;
  font-size: 14px;
  line-height: 20px;
  margin-bottom: 16px;
  overflow: auto;
}
#preview p h4 {
  font-size: 18px;
  margin-bottom: 10px;
}
blockquote {
  position: relative;
  color: #444;
  font-style: italic;
  margin: 0 30px 0 60px;
  quotes: none;
  display: block;
}
blockquote:before {
  position: absolute;
  top: 30px;
  left: -75px;
  content: "“";
  color: #DDD;
  font-family: serif;
  font-size: 96px;
}
</style>
<div class="subnav">
  <div class="content-menu ib-a blue line-x">
    <a href="?m=content&c=word_online&a=init"><em>直播管理</em></a> | <a href="?m=content&c=word_online&a=add"><em>添加直播</em></a> | <a href="javascript:" class="on"><em>直播发布</em></a>
  </div>
</div>
<div class="pad_10">
  <div>
    <h1 class="title" align="center"><?php echo $title; ?></h1>
    <p class="keywords"><span><?php echo L('keywords'). "：".$keywords; ?></span><span><?php echo "编辑"."：".$editor; ?></span></p>
    <p class="desc"><?php echo $description;?></p>
  </div>
  <table width="100%" class="table_form">
    <tr>
      <th>人物</th>
      <td>
        <input type="text" name="people" value="" id="people_input" class="input_text" />
        <select id="people_select">
         <?php foreach ($relative_people as $key => $value) {
          echo "<option value='{$value}'>{$value}</option>";
        } ?>
      </select>
    </td>
  </tr>
  <tr>
    <th>内容</th>
    <td><textarea name="info[content]" style="width:600px;height:80px;" id="broadcast_content"></textarea></td>
  </tr>
  <tr>
    <th><input name="dosubmit" type="button" value="发布" class="broadcast"></th>
    <td>&nbsp;</td>
  </tr>
</table>
<div id="preview"></div>
</div>
<script type="text/javascript">
$(function(){
  $('#people_select').change(function(){
   $("#people_input").val($(this).val());
 }).change();
  $(".broadcast").click(function(){
    var people = $("#people_input").val();
    var content = $("#broadcast_content").val();
    if (people && content) {
      $.ajax({
        url: "?m=content&c=word_online&a=ajax_broadcast&pc_hash=<?php echo $_SESSION['pc_hash']; ?>",
        type: 'post',
        data: {people: people, content: content, cid: <?php echo $id; ?>, time: <?php echo time(); ?>},
        success: function(msg){
          // alert(msg);
          if (msg == 1) {
            var p_dom = "<h4>"+ $("#people_input").val() +"</h4>"+ $("#broadcast_content").val() +"<span style='display: block; text-align: right; padding: 10px;'>"+ "<?php echo date("Y-m-d H:i:s",time()); ?>" +"</span>";
            $("#preview").prepend($("<p>").append(p_dom));
            $("#people_input").val("");
            $("#broadcast_content").val("");
          } else {
            alert("发布失败");
          };
        }
      })
    } else {
      alert("人物和内容必填");
    }
  })
});
</script>
</body>
</html>