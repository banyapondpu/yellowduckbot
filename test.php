<?php
$strAccessToken = "vwmlcHAGyusR94MaTR314mDFciyvlMm7/SpDC0Q8c3SZCfTLN49edOPEKnRcuaCjABSZHroP19SlR9eLZWkytxiFhi7TKWM1K3toKnjqlpmHGJols2lbCbQPGdjEpzCuhS96+AjDJ2+h5Tw5z7hm+AdB04t89/1O/w1cDnyilFU=";
$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
$strUrl = "https://api.line.me/v2/bot/message/reply";
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
$objConnect = mysql_connect("103.27.200.68","arkatrich_users","1w2q3r4e") or die("Error Connect to Database");
$objDB = mysql_select_db("arkatrich_db");
echo $strSQL = "SELECT * FROM duck_line WHERE question LIKE '%".$arrJson['events'][0]['message']['text']."%'";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
while($objResult = mysql_fetch_array($objQuery)){
  echo $objResult["answer"];
}
?>
