<?php

/**
 * @author lolkittens
 * @copyright 2017
 */

define('BASE_PATH','http://'.preg_replace('/[^a-zA-Z0-9]/i','',$_SERVER['HTTP_HOST']).'/'.str_replace('\\','/',substr(dirname(__FILE__),strlen($_SERVER['DOCUMENT_ROOT']))).'/');

	$link = mysqli_connect('192.168.0.100','admin','admin@123','cv_manager') or die('Cannot connect to the DB');

     if (!$link) {
    	die ( 'Could not connect: ' . mysqli_error () );
    }

?>