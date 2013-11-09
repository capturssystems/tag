<?php
header('Access-Control-Allow-Origin: *');

// Connexion to sql database
define('ENV_SQL_HOST', '10.0.207.168');
define('ENV_SQL_DATABASE', 'tag');
define('ENV_SQL_USER', 'tag');
define('ENV_SQL_PASSWORD', 'revolution');
$mysql_connection = MYSQL_connect(ENV_SQL_HOST, ENV_SQL_USER, ENV_SQL_PASSWORD);
MYSQL_select_db(ENV_SQL_DATABASE);

// Get Client IP
if (!empty($_SERVER['HTTP_CLIENT_IP'])){$ip=$_SERVER['HTTP_CLIENT_IP'];}
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];}
else{$ip=$_SERVER['REMOTE_ADDR'];}

// Init result
$table_result = array();

// Read of message in database
$result = mysql_query("SELECT id,content,latitude,longitude,accuracy,date FROM messages");

// Organize data
while($obj = mysql_fetch_object($result)){  
	$table_result['data'][] = $obj; 
}

// Close database
MYSQL_close($mysql_connection);

$table_result['result'] = "ok";
echo json_encode($table_result);
?>	