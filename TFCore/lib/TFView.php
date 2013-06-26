<?php
/**
 * Description of TFView
 * @author Tony Tsang
 */
class TFView implements ITFView {

	protected $smarty;
	protected $template_name;
	
	/**
	 * Instantiation the view object.
	 *
	 * @param string $template Template name
	 */
	public function  __construct($template) {
		global $TFConfig;
		
		$this->template_name = $template;
		$this->smarty = new Smarty();
		
		$this->smarty->left_delimiter = $TFConfig['view']['variable_fore_tag'];
		$this->smarty->right_delimiter = $TFConfig['view']['variable_aft_tag'];
		
		$_template_dir_list = array();
		$_temp_template_dir = $TFConfig['view']['template_folder'];
		foreach ($_temp_template_dir as $_item)
		{
			foreach (__getFolders($_item) as $_item_dir)
			{
				$_template_dir_list[] = $_item_dir;
			}
		}
		
		$this->smarty->template_dir = $TFConfig['view']['template_folder'];
		
		$this->smarty->compile_dir = APP_PATH . 'smarty_templates_c' . DS;
		$this->smarty->cache_dir = APP_PATH . 'template_cache' . DS;
		
		$this->smarty->caching = $TFConfig['view']['cache_enable'];
		$this->smarty->cache_lifetime = $TFConfig['view']['cache_lifetime'];
		$this->smarty->allow_php_tag = TRUE;
	}

	/**
	 * Add display variable
	 *
	 * @param string $name Variable key
	 * @param string $var Display string
	 */
	public function addDisplayVar($name, $var){
		$this->smarty->assign($name, $var);
	}
	
	/**
	 * Add display variable
	 *
	 * @param array $DisplayList Variable Array
	 */
	public function addDisplayArray($DisplayList){
		foreach ($DisplayList as $key => $value){
			$this->smarty->assign($key, $value);
		}
	}
	
	/**
	 * Remove specify variable
	 *
	 * @param string $name Variable key
	 */
	public function removeDisplayVar($name){
		$this->smarty->clearAssign($name);
	}
	
	/**
	 * desplay view
	 */
	public function desplayView(){
		$this->smarty->display($this->template_name);
	}
	
	/**
	 * reset template
	 * @param string $templateName
	 */
	public function resetViewTemplate($templateName){
		$this->template_name = $templateName;
	}
	
	/**
	 *
	 * @return Outpur the HTML code after filter view tag.
	 */
	public function ToString(){
		return "";
	}
	public function __toString(){
		return $this->ToString();
	}
}