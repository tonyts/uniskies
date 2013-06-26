<?php

/**
 * Description of TF_DBFactory
 *
 * @author Tony Tsang
 */
class TF_DBFactory {
	private static $DB_list = array() ;
	
    /**
     * Get specify database access.
     *
     * @param array $config The database config, if null will use TFConfig config.
     * @return IDBAccess
     */
    public static function GetDB($config = null){
        global $TFConfig;

        $db_config = $TFConfig['db'];
        if (isset($config) && is_array($config)){
            $db_config = __mergerConfig($db_config,$config);
        }
		
        $key = md5(json_encode($db_config));
        if (isset(self::$DB_list[$key])) {
        	return self::$DB_list[$key];
        }
        
        switch ($db_config['database_type']){
            case 'mysql':
            	$db = new db_mysql($db_config);
            	self::$DB_list[$key] = $db;
                return $db; 
        }        
        
        return FALSE;
    }
    
    public static function getDBList(){
    	return self::$DB_list;
    }
}
