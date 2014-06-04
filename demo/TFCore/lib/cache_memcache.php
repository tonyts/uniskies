<?php
/**
 * Description of cache_memcache
 * @author Tony Tsang
 */
class cache_memcache implements ITFCache {
	public $mmc = null;
	public function __construct($params){
		global $TFConfig;
		
		extract($params);
		if (!isset($host) || empty($host)){
			$host = $TFConfig['cache']['host'];
		}
		if (!isset($post) || empty($post)){
			$post = $TFConfig['cache']['port'];
		}		
		
		if(!function_exists('memcache_connect')) TF_debug("The server not install Memcache yet.");
		$this->mmc = memcache_connect($host, $post);
		if($this->mmc===FALSE) TF_debug("Connot connect to Memcache from [$host:$post] .");
	}
	public function get($name, $default=FALSE){
			$var = memcache_get($this->mmc, $name);
			if ($var === FALSE){
				return $default;
			}
			return $var;
	}
	public function set($name, $value, $life_time=null){
		global $TFConfig;
		if (!isset($life_time)) {
			$life_time = $TFConfig['cache']['default_life_time];
		}
		
		return memcache_set($this->mmc, $name, $value, 0, $life_time);
	}
	public function del($name){return memcache_delete($this->mmc, $name);}
	public function clear() { return memcache_flush($this->mmc); }
}