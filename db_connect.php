<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'demo');

/* Attempt to connect to MySQL database */
$conn_sql = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME) or die("Connection failed: " . $conn_sql->connect_error);