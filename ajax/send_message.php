<?php

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


// Get ajax input from html form request
if(isset($_GET['message'])){$message_input = $_GET['message'];}else{$message_input="";}
if(isset($_GET['latitude'])){$latitude = $_GET['latitude'];}else{$message_input="";}
if(isset($_GET['longitude'])){$longitude = $_GET['longitude'];}else{$message_input="";}

// Insertion of message in database
if($message_input != ""){$result = mysql_query("INSERT INTO messages (author,content,latitude,longitude,ip) values ('anonymous','$message_input','$latitude','$longitude','$ip')");}

// Close database
MYSQL_close($mysql_connection);

$table_result = array();
$table_result['result'] = "ok";
echo json_encode($table_result);
?>	