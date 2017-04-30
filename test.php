<?php
$host = "ec2-107-22-173-230.compute-1.amazonaws.com";
$dbname = "dn9b58cmobith";
$user = "ibsdwuiafhlutf";
$password = "hYAx_eEg7cFqclK0RXacAzV2FG";
$port = "5432";

# This function reads your DATABASE_URL configuration automatically set by Heroku
# the return value is a string that will work with pg_connect
function pg_connection_string() {
  return "dbname=".$dbname." host=".$host." port=5432 user=".$user." password=".$password." sslmode=require";
}
 
# Establish db connection
$db = pg_connect(pg_connection_string());
if (!$db) {
    echo "Database connection error."
    exit;
}else{
   echo "Connected";
}
 
$result = pg_query($db, "CREATE TABLE duck ( id SERIAL, question VARCHAR(255), answer VARCHAR(255));");
$result = pg_query($db, "INSERT INTO duck (question, answer) VALUES ('หวัดดี', 'ดีก๊าบบ');");
?>
