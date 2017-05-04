<?php

$strAccessToken = "vwmlcHAGyusR94MaTR314mDFciyvlMm7/SpDC0Q8c3SZCfTLN49edOPEKnRcuaCjABSZHroP19SlR9eLZWkytxiFhi7TKWM1K3toKnjqlpmHGJols2lbCbQPGdjEpzCuhS96+AjDJ2+h5Tw5z7hm+AdB04t89/1O/w1cDnyilFU=";

$strUrl = "https://api.line.me/v2/bot/message/push";

$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";

$arrPostData = array();
$arrPostData['to'] = "USER_ID";
$arrPostData['messages'][0]['type'] = "text";
$arrPostData['messages'][0]['text'] = "เหงาอ่ะตัว คุยกับเค้าหน่อย ได้ม๊าาาาาา...... อร๊างงงงห์";


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
