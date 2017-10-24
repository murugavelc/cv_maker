<?php

/**
 * @author lolkittens
 * @copyright 2017
 */

define('BASE_PATH','http://'.preg_replace('/[^a-zA-Z0-9]/i','',$_SERVER['HTTP_HOST']).'/'.str_replace('\\','/',substr(dirname(__FILE__),strlen($_SERVER['DOCUMENT_ROOT']))).'/');

	$link = mysql_connect('localhost','root','') or die('Cannot connect to the DB');
	mysql_select_db('cv_manager',$link) or die('Cannot select the DB');
 

?>