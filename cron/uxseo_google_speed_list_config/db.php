<?php
/**
 * The development database settings. These get merged with the global settings.
 */


if($_SERVER["HTTP_HOST"] == "localhost") {
	$host_name = 'localhost';
	$user_name = 'root';
	$password  = 'root';
}
	else {
		$host_name = '133.130.90.76';
		$user_name = 'xxx';
		$password  = 'OxlvPGj5ma9Fjcpt8_w9zhau494p5iG0f';
	}
$db_config_array = array(
	'default' => array(
		'type'         => 'mysql',           //
		'profiling'    => 'true',            // 
		'table_prefix' => '',                // 
		'charset'      => 'utf8',            // 
		'connection'   => array(             // 
			'database'     =>'google_speed_cron',     // 
			'hostname'     => $host_name,      // 
			'username'     => $user_name,      // 
			'password'     => $password,       //
		),
	'charset' => 'utf8mb4',    // charaset をutf8mb4に指定して追加
	),
);
