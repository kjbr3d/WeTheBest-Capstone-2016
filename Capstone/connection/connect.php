<?php
require "connection.php";

$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($db->connect_error){
    die('Connection failure: ' .$db->connect_error);
}
?>
