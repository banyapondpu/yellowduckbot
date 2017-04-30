<?php
/*$strAccessToken = "vwmlcHAGyusR94MaTR314mDFciyvlMm7/SpDC0Q8c3SZCfTLN49edOPEKnRcuaCjABSZHroP19SlR9eLZWkytxiFhi7TKWM1K3toKnjqlpmHGJols2lbCbQPGdjEpzCuhS96+AjDJ2+h5Tw5z7hm+AdB04t89/1O/w1cDnyilFU=";
$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
$strUrl = "https://api.line.me/v2/bot/message/reply";
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";*/
try 
{
    $connection = new Mongo('mongodb://duck_line:gogogo@ds127341.mlab.com:27341/duckduck');
    $database   = $connection->selectDB('duckduck');
    $collection = $database->selectCollection('linebot');
} 
catch(MongoConnectionException $e) 
{
    die("Failed to connect to database ".$e->getMessage());
}
/*
         $task               = array();
         $task['question']      = 'สวัสดี';
         $task['answer']     = 'ดีก๊าบบ';

         $collection->insert($task);
         */
$cursor = $collection->find();
while ($cursor->hasNext()):
    $task = $cursor->getNext();
echo $task['question'];
?>
