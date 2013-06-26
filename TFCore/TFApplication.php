<?php

/**
 * Here is the application main
 *
 * @author Tony Tsang
 */
class TFApplication {

    /**
     * Application main.
     *
     * @param array $userConfig User config.
     */
    public static function Main($userConfig = null) {
        global $TFConfig;


        if (!defined('TF_PATH'))
            define('TF_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
        if (!defined('APP_PATH'))
            define('APP_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR);

        require_once TF_PATH . "lib". DIRECTORY_SEPARATOR ."ITFCache.php";
        require_once TF_PATH . "lib". DIRECTORY_SEPARATOR ."TF_CacheFactory.php";
        require_once TF_PATH . "TFCoreFunctions.php";

        $TFConfig = __mergerConfig(require(TF_PATH . DIRECTORY_SEPARATOR. "TFConfig.php"), $userConfig);

        if (isset($_GET[$TFConfig['system_operate']['system_operate_tag']])){
        	if ($_GET[$TFConfig['system_operate']['system_operate_tag']] == $TFConfig['system_operate']['system_info'] ){
        		phpinfo(INFO_ALL);
        	}
        	exit();
        }
        if (isset($TFConfig["timezone"])){
        	date_default_timezone_set($TFConfig["timezone"]);
        }

        if ($TFConfig['mode'] == "release"){
        	error_reporting(E_ERROR);
        }else{
        	error_reporting(1);
        }

        if ($TFConfig['auto_session'])
            session_start();

        TF_DoAction();

        if ($TFConfig['mode'] == "debug" && $TFConfig['debug_echo_sql']){
        	echo "<br /><br />";
        	echo "<div id='Debug'>";

        	foreach (TF_DBFactory::getDBList() as $database) {
        		foreach ($database->GetQueryHistory() as $item){
        			echo "<b>".$item['sql']."</b><br />";
        			echo "<i>".$item['error']."</i><br />";
        			foreach ($item["stack"] as $value){
        				echo "<p style='margin-left: 30px;'>".$value["file"]." [".$value["line"]."]</p>";
        			}
        			echo "<hr/>";
        		}
        	}

        	echo "</div>";
        }
    }

}

?>
