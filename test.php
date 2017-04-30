<?php
$host = "ec2-107-22-173-230.compute-1.amazonaws.com";
$dbname = "dn9b58cmobith";
$user = "ibsdwuiafhlutf";
$password = "hYAx_eEg7cFqclK0RXacAzV2FG";
$port = "5432";

$dsn = "pgsql:host=$host;dbname=$dbname;user=$user;port=$port;password=$password";

$db = new PDO($dsn);

if($db){
  echo "Connected <br />".$db;
}else {
  echo "Not connected";
}
?>
