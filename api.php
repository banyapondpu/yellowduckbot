<?php

$strAccessToken = "vwmlcHAGyusR94MaTR314mDFciyvlMm7/SpDC0Q8c3SZCfTLN49edOPEKnRcuaCjABSZHroP19SlR9eLZWkytxiFhi7TKWM1K3toKnjqlpmHGJols2lbCbQPGdjEpzCuhS96+AjDJ2+h5Tw5z7hm+AdB04t89/1O/w1cDnyilFU=";

$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);

$strUrl = "https://api.line.me/v2/bot/message/reply";

$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
$_msg = $arrJson['events'][0]['message']['text'];


$api_key="WMuixWmGz9G8FwjQFQ0lu0dzsaXxvo23";
$url = 'https://api.mlab.com/api/1/databases/duckduck/collections/linebot?apiKey='.$api_key.'';
$json = file_get_contents('https://api.mlab.com/api/1/databases/duckduck/collections/linebot?apiKey='.$api_key.'&q={"question":"'.$_msg.'"}');
$data = json_decode($json);
$isData=sizeof($data);
if($isData >0){
  foreach($data as $rec){
   $arrPostData = array();
   $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
   $arrPostData['messages'][0]['type'] = "text";
   $arrPostData['messages'][0]['text'] = $rec->answer;
  }
}else{
  if (strpos($_msg, 'สอนเป็ด') !== false) {
    $x_tra = str_replace("สอนเป็ด","", $_msg);
    $pieces = explode("|", $x_tra);
    $_question=str_replace("[","",$pieces[0]);
    $_answer=str_replace("]","",$pieces[1]);
    //Post New Data
    $newData = json_encode(
      array(
        'question' => $_question,
        'answer'=> $_answer
      )
    );
    $opts = array(
      'http' => array(
          'method' => "POST",
          'header' => "Content-type: application/json",
          'content' => $newData
       )
    );
    $context = stream_context_create($opts);
    $returnValue = file_get_contents($url,false,$context);
    $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = 'ขอบคุณที่สอนเป็ด';
  }else{
     $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = 'ก๊าบบ!!! สามารถสอนได้โดยพิมพ์ว่า: สอนเป็ด[คำถาม|คำตอบ]';
  }
  
}
exit();


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
