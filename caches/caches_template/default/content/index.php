<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=7" />
  <title><?php if(isset($SEO['title']) && !empty($SEO['title'])) { ?><?php echo $SEO['title'];?><?php } ?><?php echo $SEO['site_title'];?></title>
  <meta name="keywords" content="<?php echo $SEO['keyword'];?>"/>
  <meta name="description" content="<?php echo $SEO['description'];?>"/>
  <link href="<?php echo CSS_PATH;?>style.css" rel="stylesheet" type="text/css"/>
  <link href="<?php echo CSS_PATH;?>jquery.simplyscroll.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="<?php echo JS_PATH;?>jquery.min.js"></script>
</head>
<body>
  <div class="wrapper">
    <div id="content"> 
      <?php include template("content","header-common"); ?>
      <div class="hr_6"></div>
      <div class="row ad wzlj">
      <?php $n=1;if(is_array(subcat(9))) foreach(subcat(9) AS $v) { ?>
        <li><a href="<?php echo $v['url'];?>" title="<?php echo $v['catname'];?>"><?php echo $v['catname'];?></a></li>
      <?php $n++;}unset($n); ?>
      </div>
      <div class="hr_6"></div>
      <div class="row">
        <div class="left_660">
          <div>
            <div class="scroll_img" style="position: relative;">
              <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=8a67a72ae4a137704e8f0ce923fa2038&action=position&posid=9&thumb=1&order=id+DESC&num=4\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'position')) {$data = $content_tag->position(array('posid'=>'9','thumb'=>'1','order'=>'id DESC','limit'=>'4',));}?>
              <div class="fd" style="position: relative;">
                <ul class="photo">
                  <?php $n=1; if(is_array($data)) foreach($data AS $k => $v) { ?>
                  <li>
                    <a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" target="_blank">
                      <img src="<?php echo thumb($v[thumb], 520, 300);?>" width="520" height="300" alt="<?php echo $v['title'];?>" />
                    </a>                
                    <div class="title">
                      <p  <?php if($n==1) { ?>style="display:block;"<?php } else { ?> style="display: none;"<?php } ?>><strong><a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" class="blue" <?php echo title_style($v[style]);?>>
                        <?php if($v[article_bac] == "") { ?><?php echo str_cut($v[title],100,'');?><?php } else { ?><?php echo $v['article_bac'];?><?php } ?></a></strong><br /><?php echo str_cut(strip_tags($v[description]), 62);?></p>
                      </div>
                    </li>
                    <?php $n++;}unset($n); ?>
                  </ul>
                </div>
                <ul class="fx">
                  <?php $n=1; if(is_array($data)) foreach($data AS $k => $v) { ?>
                  <li <?php if($n==1) { ?>class="on" style="margin:0;"<?php } ?>>
                    <a href="<?php echo $v['url'];?>" style="display: block;">
                      <img src="<?php echo thumb($v[thumb], 130, 75);?>" alt="<?php echo $v['title'];?>" width="130" height="75" />
                    </a>
                  </li>
                  <?php $n++;}unset($n); ?>
                </ul>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
              </div>
            </div>
            <div class="hr_6" ></div>
            <div><img src="<?php echo IMG_PATH;?>images/blue_line01.jpg" width="660px" height="4px" alt=""/></div>
          </div>
          <div class="right_310">
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=2787103da015708b41ce400ef0bfd951&action=position&posid=2&order=id+DESC&num=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'position')) {$data = $content_tag->position(array('posid'=>'2','order'=>'id DESC','limit'=>'1',));}?>
            <div>
              <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
              <div class="hd"><a href="<?php echo $r['url'];?>" title="<?php echo $r['title'];?>" target="_blank"><?php if($r[article_bac] == "") { ?><?php echo str_cut($r[title],36,'');?><?php } else { ?><?php echo $r['article_bac'];?><?php } ?></a></div>
              <div class="bd" style="text-indent: 20px;"> 
                <?php echo str_cut(strip_tags($r[description]), 120,'')."<a href='$r[url]'  target='_blank'>[详细]</a>"; ?>
              </div>
              <?php $n++;}unset($n); ?>
            </div>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            <div class="gray_line"><img src="<?php echo IMG_PATH;?>images/gray_line.jpg" width="300px" height="1px" alt="" /></div>
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=430c5bbe2f1de7149bd692f1b2e26ec9&action=position&posid=2&order=id+DESC&num=11\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'position')) {$data = $content_tag->position(array('posid'=>'2','order'=>'id DESC','limit'=>'11',));}?>
            <div class="list">
              <ul>
                <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                <?php if($n > 1) { ?>
                <li><a href="<?php echo $r['url'];?>" title="<?php echo $r['title'];?>" target="_blank">
                  <?php if($r[article_bac] == "") { ?><?php echo str_cut($r[title],60,'');?><?php } else { ?><?php echo $r['article_bac'];?><?php } ?>
                </a></li>
                <?php } ?>
                <?php $n++;}unset($n); ?>
              </ul>
            </div>    
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
          </div>
        </div>
        <div class="hr_6"></div>
        <div class="row ad">
          <script language="javascript" src="<?php echo APP_PATH;?>index.php?m=poster&c=index&a=show_poster&id=12"></script>
        </div>
        <div class="hr_6"></div>

        <div class="row">
          <div class="cat_nav">政务公开 >>></div>
          <div class="hr_6"></div>
          <div class="fangtan">
            <div class="left_485">
              <div>
                <a href="<?php echo $CATEGORYS['19']['url'];?>" class="catname" title="<?php echo $CATEGORYS['19']['catname'];?>"><?php echo $CATEGORYS['19']['catname'];?></a>
                <a href="<?php echo $CATEGORYS['19']['url'];?>" class="more" title="<?php echo $CATEGORYS['19']['catname'];?>">
                  <img src="<?php echo IMG_PATH;?>images/more_icon.jpg" width="35px" height="9px" alt="<?php echo $CATEGORYS['19']['catname'];?>" />
                </a>
              </div>
              <div class="hr_6"></div>
              <div class="neirong">
                <div class="kangnei">
                  <div class="neirong_list">
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=daff414d073c3f3392617c5711707f68&action=lists&catid=19&order=id+DESC&num=6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'19','order'=>'id DESC','limit'=>'6',));}?>
                    <ul>
                      <?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
                      <li>
                        <a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>">
                          <?php echo $v['title'];?>
                        </a>
                      </li>
                      <?php $n++;}unset($n); ?>
                    </ul>
                    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                  </div>
                </div>
              </div>
            </div>
            <div class="right_485">
              <div>
                <a href="<?php echo $CATEGORYS['21']['url'];?>" class="catname" title="<?php echo $CATEGORYS['21']['catname'];?>"><?php echo $CATEGORYS['21']['catname'];?></a>
                <a href="<?php echo $CATEGORYS['21']['url'];?>" class="more" title="<?php echo $CATEGORYS['21']['catname'];?>">
                  <img src="<?php echo IMG_PATH;?>images/more_icon.jpg" width="35px" height="9px" alt="<?php echo $CATEGORYS['21']['catname'];?>" />
                </a>
              </div>
              <div class="hr_6"></div>
              <div class="neirong">
                <div class="kangnei">
                  <div class="neirong_list">
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=a0a3207d50a1cf59a6debdd931f236b4&action=lists&catid=21&order=id+DESC&num=6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'21','order'=>'id DESC','limit'=>'6',));}?>
                    <ul>
                      <?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
                      <li>
                        <a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>">
                          <?php echo $v['title'];?>
                        </a>
                      </li>
                      <?php $n++;}unset($n); ?>
                    </ul>
                    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="hr_6"></div>

        <div class="row ad">
          <script language="javascript" src="<?php echo APP_PATH;?>index.php?m=poster&c=index&a=show_poster&id=13"></script>
        </div>
        <div class="hr_6" ></div>

        <div class="row">
          <div class="cat_nav">公示公告 & 政策法规 >>></div>
          <div class="hr_6" ></div>
          
          <div class="fangtan">
            <div class="left_485">
              <div>
                <a href="<?php echo $CATEGORYS['14']['url'];?>" class="catname" title="<?php echo $CATEGORYS['14']['catname'];?>"><?php echo $CATEGORYS['14']['catname'];?></a>
                <a href="<?php echo $CATEGORYS['14']['url'];?>" class="more" title="<?php echo $CATEGORYS['14']['catname'];?>">
                  <img src="<?php echo IMG_PATH;?>images/more_icon.jpg" width="35px" height="9px" alt="<?php echo $CATEGORYS['14']['catname'];?>" />
                </a>
              </div>
              <div class="hr_6"></div>
              <div class="neirong">
                <div class="kangnei">
                  <div class="neirong_list">
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=59fed81d20423055ec7926521bf03385&action=lists&catid=14&order=id+DESC&num=6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'14','order'=>'id DESC','limit'=>'6',));}?>
                    <ul>
                      <?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
                      <li>
                        <a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>">
                          <?php echo $v['title'];?>
                        </a>
                      </li>
                      <?php $n++;}unset($n); ?>
                    </ul>
                    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                  </div>
                </div>
              </div>
            </div>
            <div class="right_485">
              <div>
                <a href="<?php echo $CATEGORYS['26']['url'];?>" class="catname" title="<?php echo $CATEGORYS['26']['catname'];?>"><?php echo $CATEGORYS['26']['catname'];?></a>
                <a href="<?php echo $CATEGORYS['26']['url'];?>" class="more" title="<?php echo $CATEGORYS['26']['catname'];?>">
                  <img src="<?php echo IMG_PATH;?>images/more_icon.jpg" width="35px" height="9px" alt="<?php echo $CATEGORYS['26']['catname'];?>" />
                </a>
              </div>
              <div class="hr_6"></div>
              <div class="neirong">
                <div class="kangnei">
                  <div class="neirong_list">
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=239295af6fdb277ad523f1aea38e14b8&action=lists&catid=26&order=id+DESC&num=6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'26','order'=>'id DESC','limit'=>'6',));}?>
                    <ul>
                      <?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
                      <li>
                        <a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>">
                          <?php echo $v['title'];?>
                        </a>
                      </li>
                      <?php $n++;}unset($n); ?>
                    </ul>
                    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="hr_6" ></div>
      </div>
      <!--中部 end-->
      <div class="hr_6" ></div> 

      <div id="links" class="clear">
        <p>
          <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"link\" data=\"op=link&tag_md5=099475d22e9eb216d42195e28b4f143d&action=type_list&typeid=60&siteid=1&linktype=0&order=listorder+DESC&num=100&return=links\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$link_tag = pc_base::load_app_class("link_tag", "link");if (method_exists($link_tag, 'type_list')) {$links = $link_tag->type_list(array('typeid'=>'60','siteid'=>'1','linktype'=>'0','order'=>'listorder DESC','limit'=>'100',));}?>
          <?php $n=1;if(is_array($links)) foreach($links AS $link) { ?>
          <a href="<?php echo $link['url'];?>" target="_blank"><?php echo $link['name'];?></a> |
          <?php $n++;}unset($n); ?>
          <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </p>
      </div>
      <?php include template("content","footer-common"); ?>
      <script type="text/javascript" src="<?php echo JS_PATH;?>jquery.sgallery.js"></script>
      <script type="text/javascript" src="<?php echo JS_PATH;?>search_common.js"></script>
      <script type="text/javascript" src="<?php echo JS_PATH;?>jquery.simplyscroll.min.js"></script>
      <script type="text/javascript" src="<?php echo JS_PATH;?>jquery.slides.js"></script>
      <script type="text/javascript">
        function ChannelSlide(Name,Class){
          $('.scroll_img ul.photo li').sGallery({
            titleObj: Name + ' div.title p',
            thumbObj: Name + ' .fx li',
            thumbNowClass: Class });
        }

        $(function(){
          $('#slides').slides({
            preload: true,
            generateNextPrev: true
          });
          new ChannelSlide(".scroll_img","on",311,260);

          $("#scroller").simplyScroll();
          $("#city_tuijie_tu").simplyScroll({customClass : ""});
      /*$(".picbig").each(function(i){
        var cur = $(this).find('.img-wrap').eq(0);
        var w = cur.width();
        var h = cur.height();
        $(this).find('.img-wrap img').LoadImage(true, w, h,'<?php echo IMG_PATH;?>msg_img/loading.gif');
      });*/
      });
      </script>
    </div>
  </boby>
  </html>