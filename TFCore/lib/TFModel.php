<?php
/**
 * The data model base
 *
 * @author Tony Tsang
 */
class TFModel {
	/**
	 * Databse access
	 * @var IDBAccess
	 */
	protected $db;
	private $table_name;
	private $need_table_tag = TRUE;

	protected function get_tableName(){
		if ($this->need_table_tag)
			return "`$this->table_name`";
		else
			return $this->table_name;
	}

	public function __construct($tableName, $tag=TRUE) {
		global $TFConfig;
		$this->table_name = $TFConfig['db']['prefix'].$tableName;
		//echo $TFConfig['db']['prefix']; exit;
		$this->need_table_tag = $tag;

		$this->db = TF_DBFactory::GetDB();
	}

	public function getTableFields(){
		$sql = "SELECT * FROM ".$this->get_tableName()." LIMIT 0 , 1 ";
		return $this->db->GetFields($sql);
	}

	/**
	 * Delete data base on conditions.
	 *
	 * @param array $conditions
	 */
	public function remove($conditions) {
		$where = '';
		if (isset($conditions) && is_array($conditions)){
			foreach($conditions as $key => $item){
				$where .= ' AND ';
				$where .= " $key = ". $this->db->FilterValue($item) ." ";
			}
			$where = " WHERE 1 $where ";
		}

		if (!empty($conditions) && is_string($conditions)){
			if (strpos($conditions, 'WHERE') !== false ) {
				$where .= $conditions;
			}else{
				$where .= "WHERE $conditions";
			}
		}
		$sql = " DELETE FROM ".$this->get_tableName()." $where ";
		
		$this->db->ExecuteQuery($sql);
	}

	/**
	 * Insert data to database.
	 *
	 * @param array $row
	 * @return int the insert ID
	 */
	public function create($row){
		$fields = array();
		$values = array();

		foreach ($row as $key => $item){
			$fields[] = $key;
			$values[] = $this->db->FilterValue($item);
		}

		$field_str = join('`,`',$fields);
		$value_str = join(',',$values);

		$sql = "INSERT INTO ".$this->get_tableName()." (`$field_str`) VALUES ($value_str) ";
		$this->db->ExecuteQuery($sql);

		return $this->db->LastInsertID();
	}

	/**
	 * Update data.
	 *
	 * @param array $conditions
	 * @param array $row
	 */
	public function update($conditions, $row){
		$where = '';
		if (isset($conditions) && is_array($conditions)){
			$where .= "WHERE 1";
			foreach($conditions as $key => $item){
				$where .= ' AND ';
				$where .= " `$key` = ". $this->db->FilterValue($item) ." ";
			}
		}
		if (!empty($conditions) && is_string($conditions)){
			if (strpos($conditions, 'WHERE') !== false ) {
				$where .= $conditions;
			}else{
				$where .= "WHERE $conditions";
			}
		}

		if (isset($conditions) && isset($row) && is_array($row)){
			$set = '';
			foreach($row as $key => $item){
				if ($set != '')
				$set .= ' , ';
				$set .= " `$key` = ". $this->db->FilterValue($item) ." ";
			}

			$sql = "UPDATE ".$this->get_tableName()." SET $set $where ";
			$this->db->ExecuteQuery($sql);
		}
		if (isset($conditions) && isset($row) && is_string($row)){
			$sql = "UPDATE ".$this->get_tableName()." SET $row $where ";
			$this->db->ExecuteQuery($sql);
		}
	}

	public function InsertOrUpdate($conditions, $row){
		if (isset($conditions) && is_array($conditions) && isset($row) && is_array($row)){
			$where = '';
			foreach($conditions as $key => $item){
				$where .= ' AND ';
				$where .= " `$key` = ". $this->db->FilterValue($item) ." ";
			}

			$sql = "SELECT COUNT(*) AS the_count FROM `$this->table_name` WHERE 1 $where";
			$result = $this->db->ExecuteArray($sql);



			if (count($result) > 0 && $result[0]['the_count'] ){
				$this->update($conditions, $row);
			} else {
				$this->create($row);
			}
		}
	}

	/**
	 * Build a query SQL .
	 *
	 * @param String, Array $where
	 */
	private function compose_where_sql($where){
		$sql = "SELECT * FROM ".$this->get_tableName()." ";

		if (is_string($where)){
			if (strpos($where, 'WHERE') !== false ) {
				$sql .= $where;
			} else {
				$sql .= " WHERE ".$where;
			}
		}
		else if(is_array($where)){
			$where_str = " WHERE 1 ";
			foreach ($where as $key => $value){
				$where_str .= " AND ".$key."=".$this->db->FilterValue($value);
			}
			$sql .= " WHERE ".$where_str;
		}

		return $sql;
	}

	/**
	 * Get data list.
	 *
	 * @param string,array $where The Where string or array
	 * @param string $field The Fields string
	 * @return array
	 */
	public function list_data($where=null, $field=null, $offset=null, $number=null, $order_by=null, $order="DESC" ){
		if(empty($field))$field = "*";
		$sql = "SELECT ".$field." FROM ".$this->get_tableName()." ";

		if (!empty($where) && is_string($where)){
			if (strpos($where, 'WHERE') !== false ) {
				$sql .= $where;
			}else{
				$sql .= "WHERE $where";
			}
		}
		if (!empty($where) && is_array($where)){
			$the_where_str = " WHERE 1 ";
			foreach ($where as $key => $item){
				$value = $this->db->FilterValue($item);
				if (!empty($value) && !empty($key))
					$the_where_str .= " AND ".$key."=". $this->db->FilterValue($item);
			}
			$sql .= $the_where_str;
		}
		if (!empty($order_by) && is_string($order_by)){
			$sql .= " ORDER BY ".$this->get_tableName().".`$order_by` $order";
		}
		if (is_int($offset) && is_int($number)){
			$sql .= " LIMIT $offset , $number";
		}
		//echo $sql;
		return $this->db->ExecuteArray($sql."; ");
	}

	/**
	 * Get a data.
	 *
	 * @param string,array $where The Where string or array
	 */
	public function get_data($where){
		$sql = "SELECT * FROM ".$this->get_tableName()." ";

		if (!empty($where) && is_string($where)){
			if (strpos($where, 'WHERE') !== false ) {
				$sql .= $where;
			}else{
				$sql .= "WHERE $where";
			}
		}
		if (!empty($where) && is_array($where)){
			$the_where_str = " WHERE 1 ";
			foreach ($where as $key => $item){
				$the_where_str .= " AND ".$key."=".$this->db->FilterValue($item);
			}
			$sql .= $the_where_str;
		}

		$sql .= " LIMIT 0,1 ";

		$result = $this->db->ExecuteArray($sql);
		if (count($result)>0){
			return $result[0];
		}else {
			return null;
		}
	}

	public function count($where, $count_by = "*"){
		$sql = "SELECT COUNT($count_by) AS `count` FROM ".$this->get_tableName()." ";
		if (!empty($where)){
			if (is_string($where)){
				if (strpos($where, 'WHERE') !== false ) {
					$sql .= $where;
				} else {
					$sql .= " WHERE ".$where;
				}
			}
			else if(is_array($where)){
				$where_str = " WHERE 1 ";
				foreach ($where as $key => $value){
					$where_str .= " AND ".$key."=".$this->db->FilterValue($value);
				}
				$sql .= $where_str;
			}
		}

		$result = $this->db->ExecuteArray($sql);
		if (count($result) > 0){
			return $result[0]['count'];
		}else{
			return 0;
		}
	}
	public function error(){

	}
}

