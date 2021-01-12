<?php
// servers conf
include('../../eds-dashboard/conf_dbserver.php');
include('../../eds-dashboard/conf_httpserver.php');

// port
$port = ($conf_httpserver['httpserver_port'] == '80') ? '' : ':' . $conf_httpserver['httpserver_port'];

// module conf file
$conf = file_get_contents('eds-conf.php');

// database name
$db_name = basename(__DIR__);

// db connect
$mysqli = new mysqli('127.0.0.1', 'root', '');

// check if connection ok
if ($mysqli->connect_errno) {
	// ERROR
	echo '<pre>';
	echo "Unable to connect. Start your Database server." . PHP_EOL;
	echo "If the error persists, please leave a message  : <a href='https://github.com/easyphp/easyphp-devserver/issues' target='_blank'>here</a>";
	echo '</pre>';
	exit;
}

// warning new server
if (($mysqli->select_db($db_name) === false) AND ($conf !== '') AND (trim($conf) !== $conf_dbserver['dbserver_folder']) AND !isset($_GET['a'])) {
	echo '<pre>';
	echo 'It seems that you have already installed WordPress, but on another MySQL server. Have you recently changed your MySQL server? ?' . PHP_EOL;
	echo PHP_EOL;
	echo ' - You can make a fresh installation on this new server by clicking <a href="?a=fresh">here</a>.' . PHP_EOL;
	echo PHP_EOL;
	echo ' - Or you can migrate your previous installation with PhpAdmin using the "export" / "import" tools.';
	echo '</pre>';
	exit;
}

// new server and fresh install
if ($mysqli->select_db($db_name) === false AND isset($_GET['a']) AND $_GET['a'] == 'fresh') {

	$mysqli->close();
	
	// loading
	echo '<pre style="text-align:center;padding-top:100px;"><img src="eds-loading.gif" width="100" /><br />first start...</pre>';
	echo '<script>';
	echo 'window.location.replace("http://127.0.0.1' . $port . '/eds-modules/' . $db_name . '/eds-newdb.php")';
	echo '</script>';
	exit;
}

// check if database exists
if ($mysqli->select_db($db_name) === false) {

	$mysqli->close();
	
	// loading
	echo '<pre style="text-align:center;padding-top:100px;"><img src="eds-loading.gif" width="100" /><br />first start...</pre>';
	echo '<script>';
	echo 'window.location.replace("http://127.0.0.1' . $port . '/eds-modules/' . $db_name . '/eds-newdb.php")';
	echo '</script>';
	exit;
}
		
// update path
$mysqli->select_db($db_name);
$mysqli->query("UPDATE wp_options SET option_value = 'http://127.0.0.1" . $port . "/eds-modules/" . $db_name . "'  WHERE option_name = 'siteurl'");
$mysqli->query("UPDATE wp_options SET option_value = 'http://127.0.0.1" . $port . "/eds-modules/" . $db_name . "'  WHERE option_name = 'home'");

$mysqli->close();
?>