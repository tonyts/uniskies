<?php
/**
 * Description of TFServer
 * @author Tony Tsang
 */
class TFServer implements ITFView {
	private $var_list = array();
	
	public function addDisplayVar($name, $var){
		$this->var_list[$name] = $var;
	}
	public function addDisplayArray($DisplayList){
		foreach ($DisplayList as $key => $item){
			$this->addDisplayVar($key,$item);
		}
	}
	public function removeDisplayVar($name){
		unset($this->var_list[$name]);
	}
	public function desplayView(){
		ob_clean();
		echo json_encode($this->var_list);
	}
}