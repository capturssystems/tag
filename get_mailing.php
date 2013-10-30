<?php

// Connexion to sql database
define('ENV_SQL_HOST', '10.0.207.168');
define('ENV_SQL_DATABASE_SHOP', 'bricktown_prestashop');
define('ENV_SQL_DATABASE_GAME', 'bricktown_game');
define('ENV_SQL_USER', 'bricktown');
define('ENV_SQL_PASSWORD', 'cerise');
$mysql_connection = MYSQL_connect(ENV_SQL_HOST, ENV_SQL_USER, ENV_SQL_PASSWORD);
MYSQL_select_db(ENV_SQL_DATABASE_GAME);

// List emails recorded in database
$sql_query_email = mysql_query("SELECT * FROM mailing ORDER BY date DESC");
$nb_email_found = mysql_numrows($sql_query_email);
$display_email = "";
while($data = mysql_fetch_array($sql_query_email)){
	$display_email .= "<tr>";
	$display_email .= 	"<td>".$data['id']."</td>";
	$display_email .= 	"<td>".$data['email']."</td>";
	$display_email .= 	"<td>".$data['date']."</td>";
	$display_email .= "</tr>";
}




// Close database
MYSQL_close($mysql_connection);
?>	