<?php
defined('IN_PHPCMS') or exit('No permission resources.');
//模型缓存路径
define('CACHE_MODEL_PATH',CACHE_PATH.'caches_model'.DIRECTORY_SEPARATOR.'caches_data'.DIRECTORY_SEPARATOR);
class city {
    private $db;
    function __construct() {
        $this->db = pc_base::load_model('linkage_model');
    }

    // 城市列表也
    public function index() {
        // $citys = $this->linkage_db->listinfo( array() , '', 1, 10000);
        $keyid = intval($_GET['keyid']);
        $datas = getcache($keyid,'linkage');
        $infos = array();
        if (is_array($datas['data'])) {
            foreach ( $datas['data'] as $key_1 => $data) {
                if ( $data['child'] == 1 ) {
                    $childids = explode( ',' , $data['arrchildid'] );
                    array_shift($childids);
                    foreach ($childids as $key => $value) {
                        $data['childs'][] = $datas['data'][$value];
                    }
                    $infos[$key_1] = $data;
                }
            }
        }

        $model = pc_base::load_model('get_model');
        $sql = "select modelid from phpcms_model";
        $model->sql_query( $sql );
        $data = $model->fetch_next();
        $modelid = $data['modelid'];
        $siteid = get_siteid();
        $SEO = seo($siteid);
        $SEO['keyword'] = '中国城市新闻 ' . $SEO['keyword'];
        $SEO['description'] = isset($description) ? $description : $SEO['description'];
        $SEO['title'] = "中国城市新闻 - ";

        include template('content','city');
    }

    public function lists() {
        $keyid = intval($_GET['keyid']);
        $modelid = intval($_GET['modelid']);
        $page = max( intval($_GET['page']) ,1 );
        if(!$modelid || !$keyid) showmessage(L('information_does_not_exist'),'blank');
        $city = $this->db->get_one( 'linkageid = ' . $keyid );

        $model = pc_base::load_model('get_model');
        $sql = "select modelid , tablename from phpcms_model";
        $model->sql_query( $sql );
        $models = array();
        while ( ($data = $model->fetch_next()) != false ) {
            $models[$data['tablename']] = $data['modelid'];
        }
        $content = pc_base::load_model('content_model');
        $content->set_model( $modelid );
        $infos = $content->listinfo( 'status = 99 and city=' . $keyid , 'id desc' , $page , 20 , '' ,  5 );
        $pages = $content->pages;
        $siteid = get_siteid();
        $SEO = seo($siteid);
        $SEO['keyword'] = $city['name'] . ' 中国城市新闻 ' . $SEO['keyword'];
        $SEO['description'] = ( isset($city['description']) && !empty($city['description']) ) ? $city['description'] : $SEO['description'];
        $SEO['title'] = $city['name'] . '-' . '中国城市新闻';
        include template('content','city_list');
    }
}
?>

