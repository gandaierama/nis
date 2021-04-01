<?php
$databaseHost = '127.0.0.1';
$databaseName = 'nis';
$databaseUsername = 'root';
$databasePassword = 'C1pwtJRa4oqbdO43l4UWZgMgIV9z';
$dbConn = new PDO("mysql:host={$databaseHost};dbname={$databaseName}", $databaseUsername, $databasePassword);
$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
?>