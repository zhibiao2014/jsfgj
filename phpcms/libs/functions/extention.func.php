<?php
/**
 *  extention.func.php 用户自定义函数库
 *
 * @copyright			(C) 2005-2010 PHPCMS
 * @license				http://www.phpcms.cn/license/
 * @lastmodify			2010-10-27
 */


function is_bot(){
  $ua = strtolower($_SERVER['HTTP_USER_AGENT']);
  $botchar = "/(bot|crawl|spider|slurp|yahoo|sohu-search|lycos|robozilla)/i";
  if(preg_match($botchar, $ua)) {
    return true;
  }else{
    return false;
  }
}

/**
  * 榜单首页URL生成函数
  * @return string
  */

function rank_url() {
  return siteurl(get_siteid()) . '/rank.html';
}

/**
  * 榜单列表页URL生成函数
  * @return string
  */

function rank_list_url($catid, $page=1) {
  return  siteurl(get_siteid()) . sprintf( '/rank_lists_%d_%d.html', $catid, $page );
}

/**
  * 榜单内容页URL生成函数
  * @return string
  */
function rank_show_url($catid, $id) {
  return  siteurl(get_siteid()) . sprintf( '/rank_%d_%d.html', $catid, $id ); 
}

function key_switch( $array, $id = 'id' ) {
  if ( is_array($array) && !empty($array) ) {
    $temp = array();
    foreach ($array as $key => $value) {
      $temp[$value[$id]] = $value;
    }
    return $temp;
  } else {
    return $array;
  }
}

?>