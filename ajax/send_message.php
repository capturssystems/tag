<?php

// Connexion to sql database
define('ENV_SQL_HOST', '10.0.207.168');
define('ENV_SQL_DATABASE', 'tag');
define('ENV_SQL_USER', 'tag');
define('ENV_SQL_PASSWORD', 'revolution');
$mysql_connection = MYSQL_connect(ENV_SQL_HOST, ENV_SQL_USER, ENV_SQL_PASSWORD);
MYSQL_select_db(ENV_SQL_DATABASE);


// Get ajax input from html form request
if(isset($_GET['message'])){$message_input = $_GET['message'];}
else{$message_input="";}

// Insertion of message in database
if($message_input != ""){$result = mysql_query("INSERT INTO messages (content) values ('$message_input')");}

// Close database
MYSQL_close($mysql_connection);

$table_result = array();
$table_result['result'] = "ok";
echo json_encode($table_result);
?>	