<?php
define('CLIENT_MULTI_RESULTS', 131072);

/**
 * MySQL Data access
 *
 * @author Tony Tsang
 */
class db_mysql implements IDBAccess {
    private $db_connect_id;
	private $query_list = array();

    protected $dbConfig = null;
    protected $dbConfig_md5 = null;

    public function __construct($dbConfig = null){
        $this->dbConfig = $dbConfig;
		$this->dbConfig_md5 = md5(json_encode($dbConfig));

        $this->db_connect_id = @mysql_connect($dbConfig['host'].':'.$dbConfig['port'], $dbConfig['login'], $dbConfig['password'], 1, CLIENT_MULTI_RESULTS);
        if ($this->db_connect_id) {
            $dbselect = @mysql_select_db($dbConfig['database'],$this->db_connect_id);
            if (!$dbselect) {
                @mysql_close($this->db_connect_id);
                TF_debug("cannot use database {$dbConfig['database']}");
            }
            $this->ExecuteQuery("SET NAMES UTF8");
        } else {
        	if (!$dbConfig['when_error_goon']){
        		die("Cannot connect to the MySQL Database.");
        	}
        }
    }

    public function  __destruct() {
        if ($this->db_connect_id) {
            $result = @mysql_close($this->db_connect_id);
        }
    }

    /**
     * Reconnect to database
     */
    public function Reconnect(){
        if ($TFConfig['mode'] == "debug" && $TFConfig['debug_echo_sql']){
	    	$this->query_list[] = array( "sql" => "Reconnect MySQL", "stack" => array(), "error"=> "" ) ;
        }
        if ($this->db_connect_id) {
            $result = @mysql_close($this->db_connect_id);
        }
        $this->db_connect_id = @mysql_connect($this->dbConfig['host'].':'.$this->dbConfig['port'], $this->dbConfig['login'], $this->dbConfig['password'], 1, CLIENT_MULTI_RESULTS);
        if ($this->db_connect_id) {
            $dbselect = @mysql_select_db($this->dbConfig['database'],$this->db_connect_id);
            if (!$dbselect) {
                @mysql_close($this->db_connect_id);
                TF_debug("cannot use database {$this->dbConfig['database']}");
            }
            $this->ExecuteQuery("SET NAMES UTF8");
        } else {
        	if (!$dbConfig['when_error_goon']){
        		die("Cannot connect to the MySQL Database.");
        	}
        }
    }

    /**
     * Execution a MySQL query, return the resource tag.
     *
     * @param string $exec The MySQL query
     */
    public function ExecuteQuery($exec){
    	global $TFConfig;

        if (!$this->db_connect_id || gettype($this->db_connect_id) == "unknown type") {
    		$this->Reconnect();
    	}

        if ($this->db_connect_id) {
        	$this->FreeResult();
        	$query_result = @mysql_query($exec, $this->db_connect_id);
        	if ($TFConfig['mode'] == "debug" && $TFConfig['debug_echo_sql']){
	        	$stack = @debug_backtrace();
	        	$this->query_list[] = array( "sql" => $exec, "stack" => $stack, "error"=> $this->GetLastError() ) ;
        	}
        	if ($query_result === FALSE && $this->dbConfig['when_error_goon'] === FALSE ){
        		TF_debug("$exec <br />Error: ". $this->GetLastError());
        	}

            return $query_result;
        }else{
            return FALSE;
        }
    }

    /**
     * Execution a MySQL query, return the result array.
     *
     * @param string $exec The MySQL query
     */
    public function ExecuteArray($exec){
       	$cache_result = TF_CacheFactory::GetCache("db_mysql_cache")->get("ExecuteArray".$this->dbConfig_md5.$exec);
    	if ($cache_result !== FALSE && isset($cache_result) && !empty($cache_result)){
    		return $cache_result;
    	}

        if ($this->db_connect_id) {
            $query_result = $this->ExecuteQuery($exec);
            if (!$query_result) return FALSE;
            $rows = array();
            while($rows[] = mysql_fetch_array($query_result,MYSQL_ASSOC)){}
            mysql_free_result($query_result);
            array_pop($rows);

            if ($query_result !== FALSE){
        		TF_CacheFactory::GetCache("db_mysql_cache")->set("ExecuteArray".$this->dbConfig_md5.$exec, $rows);
        	}

            return $rows;
        }else{
            return FALSE;
        }
    }

    /**
     * Execution a MySQL query, return the rows number.
     *
     * @param string $exec The MySQL query
     */
    public function ExecuteRowsNumber($exec){
        $cache_result = TF_CacheFactory::GetCache("db_mysql_cache")->get("ExecuteRowsNumber".$this->dbConfig_md5.$exec);
    	if ($cache_result !== FALSE && isset($cache_result) && !empty($cache_result)){
    		return $cache_result;
    	}

        if ($this->db_connect_id) {
            $query_result = $this->ExecuteQuery($exec);
            if (!$query_result) return FALSE;
            $number = @mysql_affected_rows($this->db_connect_id);

            if ($query_result !== FALSE){
        		TF_CacheFactory::GetCache("db_mysql_cache")->set("ExecuteRowsNumber".$this->dbConfig_md5.$exec, $number);
        	}
        	return $number;
        }else{
            return FALSE;
        }
    }

    public function FreeResult(){
        if ($this->db_connect_id) {
            $result = @mysql_free_result($this->db_connect_id);
            return $result;
        }else{
            return FALSE;
        }
    }

    /**
     * Get the last insert id
     */
    public function LastInsertID(){
        if ($this->db_connect_id) {
            $result = @mysql_insert_id($this->db_connect_id);
            return $result;
        }else{
            return FALSE;
        }
    }

    public function FilterValue($value){
        if(is_null($value))return 'NULL';
        if(is_bool($value))return $value ? 1 : 0;

        return "'".stripslashes($value)."'";

        if(@get_magic_quotes_gpc())$value = stripslashes($value);
        return "'".mysql_real_escape_string($value, $this->db_connect_id)."'";
    }

    public function GetFields($exce){
        if ($this->db_connect_id) {
            $query_result = $this->ExecuteQuery($exec);
            if (!$query_result) return FALSE;

            $fields = array();
            while ($property = @mysql_fetch_field($query_result))
            {
                $fields[] = $property->name;
            }
        }
    }

    /**
     * That will showup the last database error
     */
	public function GetLastError(){
		return mysql_error($this->db_connect_id);
	}

	public function GetQueryHistory(){
		return $this->query_list;
	}
}
