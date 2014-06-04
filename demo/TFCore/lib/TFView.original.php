<?php
/**
 * View Base
 *
 * @author Tony Tsang
 */
class TFView_original {

	private $template_content = '';
	private $displayVars = array();

	/**
	 * Instantiation the view object.
	 *
	 * @param string $template Template name
	 */
	public function  __construct($template) {
		$this->setTemplate($template);
	}

	/**
	 * Load the template.
	 *
	 * @param string $template Template name
	 * @return bool If can load tempalte file will return TRUE, else return FALSE
	 */
	public function setTemplate($template){
		global $TFConfig;
		$view_folder = $TFConfig['view_folder'];
		if (strripos($view_folder,"\\") != (strlen($view_folder) - 1) && strripos($view_folder,"/") != (strlen($view_folder) - 1))
		$view_folder .= DIRECTORY_SEPARATOR;

		if(is_readable($view_folder.$template) && !is_dir($view_folder.$template)){
			$this->template_content = @file_get_contents($view_folder.$template);
			return TRUE;
		}

		if (@isset($TFConfig['view']) && @isset($TFConfig['view']['view_extname']) && @is_array($TFConfig['view']['view_extname']) ) {
			foreach($TFConfig['view']['view_extname'] as $item){
				if (is_readable($view_folder.$template.$item) && !is_dir($view_folder.$template.$item) ){
					$this->template_content = @file_get_contents($view_folder.$template.$item);
					return TRUE;
				}
			}
		}

		$dirs = $this->getSubfolder($view_folder);

		foreach ($dirs as $folder_item){
			if (is_dir($folder_item) && is_readable($folder_item.$template)){
				$this->template_content = @file_get_contents($folder_item.$template);
				return TRUE;
			}
			if (@isset($TFConfig['view']) && @isset($TFConfig['view']['view_extname']) &&
			@is_array($TFConfig['view']['view_extname']) ) {
				foreach($TFConfig['view']['view_extname'] as $item){
					if (is_readable($folder_item.$template.$item) && !is_dir($folder_item.$template.$item) ){
						$this->template_content = @file_get_contents($folder_item.$template.$item);
						return TRUE;
					}
				}
			}
		}

		return FALSE;
	}
	private function getSubfolder($view_folder){
		if (!is_dir($view_folder)) return false;

		$dirs = array();

		$folder_dir = opendir($view_folder);
		while ($item = readdir($folder_dir)){
			if (is_dir($view_folder.$item)){
				$dirs[] = $view_folder.$item."\\";
			}
		}
		return $dirs;
	}

	/**
	 * Add display variable
	 *
	 * @param string $name Variable key
	 * @param string $var Display string
	 */
	public function addDisplayVar($name, $var){
		$this->displayVars[$name] = $var;
	}
	
	/**
	 * Add display variable
	 *
	 * @param array $DisplayList Variable Array
	 */
	public function addDisplayArray($DisplayList){
		foreach ($DisplayList as $key => $value){
			$this->displayVars[$key] = $value;
		}
	}
	
	/**
	 * Remove specify variable
	 *
	 * @param string $name Variable key
	 */
	public function removeDisplayVar($name){
		unset($this->displayVars[$name]);
	}

	private function getMasterpageName(){
		global $TFConfig;

		$master_fore_tag = $TFConfig['view']['master_fore_tag'];
		$master_aft_tag = $TFConfig['view']['master_aft_tag'];

		$start_pos = strpos($this->template_content,$master_fore_tag);
		if (FALSE === $start_pos){
			return FALSE;
		}
		$start_pos += strlen($master_fore_tag);

		$end_pos = strpos($this->template_content,$master_aft_tag,$start_pos);
		if (FALSE === $end_pos){
			return FALSE;
		}

		$name =substr($this->template_content,$start_pos,$end_pos-$start_pos);
		return $name;
	}
	private function loadMasterpage($Masterpage=null){
		global $TFConfig;

		if (!isset($Masterpage)){
			$Masterpage = $this->getMasterpageName();
		}

		$view_extnames = $TFConfig['view']['view_extname'];
		$view_path = $TFConfig['view_folder'];
		if (strripos($view_path,"\\") != (strlen($view_path) - 1) && strripos($view_path,"/") != (strlen($view_path) - 1))
		$view_path .= "\\";

		$Masterpage_content = "";

		if (TRUE == @is_readable($view_path.$Masterpage) && !is_dir($view_path.$Masterpage)){
			$Masterpage_content = @file_get_contents($view_path.$Masterpage);
		}
		else{
			foreach($view_extnames as $item){
				if (TRUE == @is_readable($view_path.$Masterpage.$item) && !is_dir($view_path.$Masterpage.$item)){
					$Masterpage_content = @file_get_contents($view_path.$Masterpage.$item);
					break;
				}
			}
		}

		if (empty($Masterpage_content)){
			$subfolder = $this->getSubfolder($view_path);
			foreach ($subfolder as $folder_item){
				if (@is_readable($folder_item.$Masterpage)){
					$Masterpage_content = @file_get_contents($folder_item.$Masterpage);
					break;
				}
				foreach($view_extnames as $item){
					if (TRUE == @is_readable($folder_item.$Masterpage.$item) && !is_dir($folder_item.$Masterpage.$item)){
						$Masterpage_content = @file_get_contents($folder_item.$Masterpage.$item);
						break;
					}
				}
				if (!empty($Masterpage_content)){
					break;
				}
			}
		}


		$master_tag = $TFConfig['view']['master_fore_tag'].$Masterpage.$TFConfig['view']['master_aft_tag'];

		$content = str_replace($TFConfig['view']['contentpage_tag'], $this->template_content, $Masterpage_content);
		$content = str_replace($master_tag,"",$content);
		return $content;
	}
	private function filterViewTag($content=null){
		if(!isset($content)){
			$content = $this->template_content;
		}

		return $content;
	}

	/**
	 *
	 * @return Outpur the HTML code after filter view tag.
	 */
	public function ToString(){
		global $TFConfig;

		$Masterpage = $this->getMasterpageName();

		if (!$Masterpage)
		$content = $this->template_content;
		else
		$content = $this->loadMasterpage($Masterpage);

		$variable_fore_tag = $TFConfig['view']['variable_fore_tag'];
		$variable_aft_tag = $TFConfig['view']['variable_aft_tag'];

		foreach ($this->displayVars as $name => $var){
			$content = str_replace($variable_fore_tag.$name.$variable_aft_tag, $var, $content);
		}
		$start_index = strpos($content,$variable_fore_tag);
		while ($start_index !== FALSE){
			$end_index =  strpos($content,$variable_aft_tag,$start_index);
			if ($end_index !== FALSE){
				$the_replace_tag = substr($content, $start_index, $end_index-$start_index+strlen($variable_aft_tag));
				$content = str_replace($the_replace_tag, "", $content);
			}
			
			$start_index = strpos($content,$variable_fore_tag);
		}

		return $content;
	}
	public function __toString(){
		return $this->ToString();
	}
}
