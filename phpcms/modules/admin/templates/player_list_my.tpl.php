<?php
defined('IN_ADMIN') or exit('No permission resources.');
$show_dialog = 1;
include $this->admin_tpl('header','admin');
?>
<div class="pad-lr-10">

<form name="myform" id="myform" action="?m=admin&c=player_add_my&a=delete" method="post" onsubmit="checkuid();return false;">
<div class="table-list">
 <table width="100%" cellspacing="0">
        <thead>
            <tr>
            <th width="35" align="center"><input type="checkbox" value="" id="check_box" onclick="selectall('playerid[]');"></th>
			<th width="30%">ID</th>
             <th width="30%">名称</th>
            <th >状态</th> 
             <th width="120"><?php echo L('operations_manage')?></th>
            </tr>
        </thead>
    <tbody>
 <?php
if(is_array($infos)){
	foreach($infos as $info){
?>
    <tr>

    <td align="center">
	<input type="checkbox" name="playerid[]" value="<?php echo $info['playerid']?>">
	</td> 

	 <td align="center"><?php echo $info['playerid']?></td>

        <td width="30%" align="center"><?php echo $info['subject']?> </td>
        <td align="center"><?php echo $info['disabled']?'禁用中':'启用中';?></td>
         <td align="center">
		 <?php
$str = '编辑播放器';	
$linkstr = 'javascript:window.top.art.dialog({id:\'edit\',iframe:\'?m=admin&c=player_add_my&a=edit&playerid='.$info['playerid'].'\', title:\''.$str.'\', width:\'450\', height:\'300\'}, function(){var d = window.top.art.dialog({id:\'edit\'}).data.iframe;var form = d.document.getElementById(\'dosubmit\');form.click();return false;}, function(){window.top.art.dialog({id:\'edit\'}).close()});void(0);';?><a href="<?php echo $linkstr;?>">编辑</a>
		 <a href="javascript:confirmurl('?m=admin&c=player_add_my&a=delete&playerid=<?php echo $info['playerid']?>', '<?php echo L('confirm', array('message' => L('selected')))?>')"><?php echo L('delete')?></a>  <a href="javascript:confirmurl('?m=admin&c=player_add_my&a=changestatus&playerid=<?php echo $info['playerid']?>&status=<?php echo $info['disabled'];?>', '确定改变播放器使用状态?')"><?php echo $info['disabled']?'启用':'禁用';?></a>
		 </td>
    </tr>
<?php
	}
}
?></tbody>
 </table>
 <div class="btn">
 <a href="#" onClick="javascript:$('input[type=checkbox]').attr('checked', true)"><?php echo L('selected_all')?></a>/<a href="#" onClick="javascript:$('input[type=checkbox]').attr('checked', false)"><?php echo L('cancel')?></a>

<input type="submit" name="submit" class="button" value="<?php echo L('remove_all_selected')?>"  onClick="return confirm('<?php echo L('confirm', array('message' => L('selected')))?>')" /> 

</div> 
<div id="pages"><?php echo $pages?></div>

</div>

</form></div>
</body>
</html>
<script type="text/javascript">
function checkuid() {
	var ids='';
	$("input[name='playerid[]']:checked").each(function(i, n){
		ids += $(n).val() + ',';
	});
	if(ids=='') {
		window.top.art.dialog({content:"请先选中需要操作的项目!",lock:true,width:'200',height:'50',time:1.5},function(){});
		return false;
	} else {
		myform.submit();
	}
}
</script>