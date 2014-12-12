<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_sys_class('model', '', 0);
class word_online_model extends model {
  public function __construct() {
    $this->db_config = pc_base::load_config('database');
    $this->db_setting = 'default';
    $this->table_name = 'word_online';
    parent::__construct();
  }

  /**
   * 添加内容
   * @param array $datas
   */
  public function add_content($data) {
    $data['inputtime'] = $data['updatetime'] = time();
    $this->insert($data, true);
  }

  /**
   * 更新内容
   * @param array $datas 
   * @param array/string $where
   */
  public function update_content($data,$where) {
    $data['updatetime'] = time();
    $this->update($data,$where);
  }
}
?>