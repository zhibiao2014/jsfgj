<?php
defined('IN_PHPCMS') or exit('No permission resources.'); 
class index {
	function __construct() {
	}
	
	public function init() {
		include template('comment', 'show_list');
	}
}