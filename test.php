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
echo $strSQL = "SELECT question,answer FROM duck_line WHERE question LIKE '%". $arrJson['events'][0]['message']['text'] ."%'";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
while($objResult = mysql_fetch_array($objQuery))
{
  
}

if($arrJson['events'][0]['message']['text'] == "สวัสดี"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "เฮ้ย! ว่าไงนายชื่อ ".$arrJson['events'][0]['source']['userId']." ใช่ม้าาา";
}else{
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ก๊าบบ (สอนเป็ดที)";
}


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$strUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close ($ch);
?>
