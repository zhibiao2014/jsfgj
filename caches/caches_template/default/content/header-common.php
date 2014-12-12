<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><div id="header">      
    <div class="row dingbu">
        <div class="logo">
            <a href="<?php echo siteurl($siteid);?>" class="site_title">津市房地产管理局</a>
        </div>
        <div class="header-middle">
            <div class="sign">
                <div class="log">
                    <a href="http://www.0736fdc.com/" target="_blank">常德市房地产信息网</a>
                </div>  
            </div>
            <div class="sokuang">
                <form action="http://www.so.com/s" target="_blank" id="so360form">
                    <input type="text" autocomplete="off" name="q" id="so360_keyword">
                    <input type="submit" id="so360_submit" value="搜 索">
                    <input type="hidden" name="ie" value="utf8">
                    <input type="hidden" name="src" value="zz">
                    <input type="hidden" name="site" value="cdsfgj.gov.cn">
                    <input type="hidden" name="rg" value="1">
                </form>
            </div>
        </div>
        <div class="chinaweb_logo">
            <a href="http://www.cdsfgj.gov.cn/" target="_blank" class="site_title" title="常德市房地产管理局">常德市房地产管理局</a>
        </div>
    </div>
    <div class="row clear menu">
        <map id="nav">
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=a549ad48e36a73669c2b3542cf1ea1ba&action=category&catid=0&num=13&siteid=%24siteid&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>'0','siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'13',));}?>
            <ul>
                <li>
                    <a href="<?php echo siteurl($siteid);?>" class="active" title="<?php echo $SEO['site_title'];?>">首页</a>
                </li>
                <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                <li class="buttons">
                    <a href="<?php echo $r['url'];?>" title="<?php echo $r['catname'];?>"><?php echo $r['catname'];?></a>
                </li>
                <?php $n++;}unset($n); ?>
            </ul>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </map>
    </div>
    <div class="row clear kuaixun">
        <span class="kx">快讯:</span>
        <ul id="scroller">
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=cec61ea90f10c90695f52c8aa2acd55c&action=position&posid=9&order=id+desc&num=10\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'position')) {$data = $content_tag->position(array('posid'=>'9','order'=>'id desc','limit'=>'10',));}?>
            <?php $n=1; if(is_array($data)) foreach($data AS $k => $v) { ?>
            <li>
                <a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>"> <?php echo $v['title'];?></a>&nbsp;|&nbsp;
            </li>
            <?php $n++;}unset($n); ?>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </ul>
    </div>        
</div>