<?php

return array(
        'mode' => 'debug',                      // System runtime mode , debug or release
        // When autoload class will search these extname files.
        'autoload_extname' => array('.php', '.class.php', '.controller.php', '.model.php'),
        'autoload_folder' => array(),           // When import file will extra search these folders.
        'autoload_ignore' => array(
        	".svn", "template_cache", "Template", "smarty_templates_c", "script", "images", "css"
		),

        'error_report_line' => 8,
        'auto_session' => TRUE,                 // can be auto support SESSION

        'controller_folder' => APP_PATH.'controller',
        'model_folder' => APP_PATH.'Model',
        'view_folder' =>  APP_PATH.'Template',

        'default_controller' => 'main',
        'default_action' => 'index',
        'url_controller_tag' => 'c',
        'url_action_tag' => 'a',

		'global_calss' => 'global_function',
		'global_pretreatment' => 'pretreatment',

		'debug_echo_sql'=> false,
		'timezone' => "Etc/GMT-8",

		'root_URL' => "http://localhost/",

		'system_operate' => array(
			'system_operate_tag' => 'system',
			'system_info' => 'info',
		),

        'db' => array(
            'database_type' => 'mysql', // Database type
            'host' => 'localhost',
            'port' => 3306,
            'login' => 'root',
            'password' => '',
            'database' => '',
			'when_error_goon' => false,
        ),
        'cache' => array(
        	'cache_type' => 'memcache',
        	'default_life_time' => 300,
        	'using_cache' => FALSE,
        	'host' => 'localhost',
        	'port' => '11211',
        ),
        'view' => array(
        	// some thing template directory write in here.
        	'template_folder' => array(
        		APP_PATH.'Template'.DIRECTORY_SEPARATOR,
       		),

       		'cache_enable' => false,
       		'cache_lifetime' => 360,

            // eg: {#result} , will replace and display the "result" display variable.
            'variable_fore_tag' => '{#',
            'variable_aft_tag' => '}',

            'view_extname' => array('.htm', '.html'),
        ),
    );
