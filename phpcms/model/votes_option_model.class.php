<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_sys_class('model', '', 0);
class votes_option_model extends model {
	public function __construct() {
		$this->db_config = pc_base::load_config('database');
		$this->db_setting = 'rank';
		$this->table_name = 'votes_option';
		parent::__construct();
	}

  public function rank_thumbnail_set( $ranks ) {
    foreach ($ranks as $key => $rank) {
      if ( empty($rank['reducepath']) ) {
        $option = $this->get_one('oreducepath IS NOT NULL and sv_id = ' . $rank['id']);
        if (!empty($option)) {
          $ranks[$key]['reducepath'] = $option['oreducepath'];
        }
      }
    }
    return $ranks;
  }

}
?>