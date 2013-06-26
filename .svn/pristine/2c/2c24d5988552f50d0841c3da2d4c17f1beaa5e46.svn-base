<?php
/**
 * This is the main controller
 *
 * @author Tony Tsang
 */
class main extends TFController {
    public function index(){
        $view = new TFView('index.html');
        return $view;
    }

    public function use_index(){
        parent::set('table', 'help_category');
        return $this->database();
    }
    
    public function database(){
        $view = new TFView('index.html');
        $view->addDisplayVar('content_item1', date('y:m:d H:i:s'));
    	
        $db = TF_DBFactory::GetDB();
        $table_name = parent::get('table', 'help_keyword');

        $items = $db->ExecuteArray("SELECT * FROM `$table_name` LIMIT 0 , 30");

        $show_list = '';
        foreach($items as $key => $value){
            $item_list = '';
            foreach($value as $k => $v){
                $item_list .= " $k => $v ,";
            }

            $show_list .="$key => $value { $item_list } <br />";
        }

        $view->addDisplayVar('content_item2', $show_list);
        $view->addDisplayVar('content_item3', date('y:m:d H:i:s'));
        
        return $view;
    }
	
    
}
?>
