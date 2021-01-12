<?php
// httpserver conf
include('../../eds-dashboard/conf_dbserver.php');
include('../../eds-dashboard/conf_httpserver.php');

// port
$port = ($conf_httpserver['httpserver_port'] == '80') ? '' : ':' . $conf_httpserver['httpserver_port'];

// database name
$db_name = basename(__DIR__);

// db connect
$mysqli = new mysqli('127.0.0.1', 'root', '');

// no database > create database
if ($mysqli->query('CREATE DATABASE ' . $db_name) === false) {
	
	// Error message
	echo '<pre>';
	echo "Error creating database: " . $mysqli->error . PHP_EOL;
	echo "If the error persists, please leave a message  : <a href='https://github.com/easyphp/easyphp-devserver/issues' target='_blank'>here</a>";
	echo '</pre>';	

}	

$mysqli->select_db($db_name);

// import tables
$sql = file_get_contents('eds-' . $db_name . '.sql');

if ($mysqli->multi_query($sql)) {
	
	do {
		//
	} while ($mysqli->more_results() && $mysqli->next_result());		
	
	
} else {
	
	// Error message
	echo '<pre>';
	echo "Error creating tables" . PHP_EOL;
	echo "If the error persists, please leave a message  : <a href='https://github.com/easyphp/easyphp-devserver/issues' target='_blank'>here</a>";
	echo '</pre>';	
	exit;
}	

// update conf file
file_put_contents('eds-conf.php', $conf_dbserver['dbserver_folder']);	

$mysqli->close();

if (isset($_GET['r']) AND $_GET['r'] == 'admin') {
	header('Location: http://127.0.0.1' . $port . '/eds-modules/' . $db_name . '/wp-login.php');
} else {
	header('Location: http://127.0.0.1' . $port . '/eds-modules/' . $db_name);
}

die();
?>