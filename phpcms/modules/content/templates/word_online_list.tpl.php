<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header','admin');?>
<div class="pad_10">
  <form name="myform" id="myform" action="" method="post" >
    <div class="table-list">
      <table width="100%" cellspacing="0" >
        <thead>
          <tr>
            <th width="16"><input type="checkbox" value="" id="check_box" onclick="selectall('ids[]');"></th>
            <!-- <th width="37"><?php echo L('listorder');?></th> -->
            <th width="40">ID</th>
            <th><?php echo L('title');?></th>
            <!-- <th width="40"><?php echo L('hits');?></th> -->
            <th width="70"><?php echo L('publish_user');?></th>
            <th width="118"><?php echo L('updatetime');?></th>
            <th width="112"><?php echo L('operations_manage');?></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($datas as $r) {?>
          <tr>
            <td align="center"><input class="inputcheckbox " name="ids[]" value="<?php echo $r['id'];?>" type="checkbox"></td>
            <td align="center"><?php echo $r['id']; ?></td>
            <td><?php echo $r['title']; ?></td>
            <td align="center"><?php echo $r['editor'];?></td>
            <td align='center'><?php echo format::date($r['updatetime'],1);?></td>
            <td align='center'>
              <a href="?m=content&c=word_online&a=edit&id=<?php echo $r['id']; ?>"><?php echo L('edit');?></a> | 
              <a href="?m=content&c=word_online&a=broadcast&id=<?php echo $r['id']?>"><?php echo "直播";?></a> | 
              <a href="?m=content&c=word_online&a=delete&dosubmit=1&item=1&id=<?php echo $r['id']?>"><?php echo L('delete');?></a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      <div class="btn">
        <label for="check_box"><?php echo L('selected_all');?>/<?php echo L('cancel');?></label>
        <!-- <input type="button" class="button" value="<?php echo L('listorder');?>" onclick="myform.action='?m=content&c=content&a=listorder&dosubmit=1&catid=<?php echo $catid;?>&steps=<?php echo $steps;?>';myform.submit();"/> -->
        <input type="button" class="button" value="<?php echo L('delete');?>" onclick="myform.action='?m=content&c=word_online&a=delete&dosubmit=1';return confirm_delete()"/>
      </div>
      <div id="pages"><?php echo $pages;?></div>
    </div>
  </form>
</div>
<script language="JavaScript">
<!--
window.top.$('#display_center_id').css('display','none');

function confirm_delete(){
  if(confirm('<?php echo L('confirm_delete', array('message' => L('selected')));?>')) $('#myform').submit();
}
//-->
</script>
</body>
</html>
