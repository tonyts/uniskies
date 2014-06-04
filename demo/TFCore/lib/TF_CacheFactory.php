<?php
/**
 * Description of TF_CacheFactory
 * @author Tony Tsang
 */
class TF_CacheFactory {
	private static $cache_list = array() ;
	
    /**
     * Get specify database access.
     *
     * @param array $config The cahce tag.
     * @return ITFCache
     */
    public static function GetCache($tag="default", $params=null){
        global $TFConfig;

        $cache_config = $TFConfig['cache'];
		
        $key = $tag.md5(json_encode($params));
        if (isset(self::$cache_list[$key])) {
        	return self::$cache_list[$key];
        }
        
        if ($cache_config['using_cache'] !== TRUE) {
        	if (isset(self::$cache_list["emptyCache"]))
        		return self::$cache_list["emptyCache"];
        	else {
        		$cache = new emptyCache();
        		self::$cache_list["emptyCache"] = $cache;
        		return self::$cache_list["emptyCache"];
        	}
        }
        
        switch ($cache_config['cache_type']){
            case 'memcache':
            	$cache = new cache_memcache($params);
            	self::$cache_list[$key] = $cache;
                return $cache;
            default:
        		$cache = new emptyCache();
        		self::$cache_list["emptyCache"] = $cache;
        		return self::$cache_list["emptyCache"];
        }
        
        return FALSE;
    }
    
    public static function getCacheList(){
    	return self::$cache_list;
    }
}

class emptyCache implements ITFCache {
	public function get($name, $default=FALSE){ return null; }
	public function set($name, $value, $life_time=null){}
	public function del($name){return true;}
	public function clear(){}
}


