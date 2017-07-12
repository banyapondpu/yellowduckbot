
<?php
/*
Form Developer
ศึกษาการใช้สมัครและสร้าง Message API ของ Line ที่เว็บไซต์
http://www.daydev.com/mean-stack/mongodb/linebot-message-api-php.html
*/
$strAccessToken = "9YEIJ8aUUe1Y7PijO2vrDGU7PTVKFETZjrQK6zaIyKPVU4JQU7IjZPPMKzMn+CyTsMxv5pR5ucB19Bws54+kTold2raXY+33YdF1YNMPnK9C1Ck22/SiCHn8cZyXPEpC/cWBgrmLS5Jt3Auf+z3bNQdB04t89/1O/w1cDnyilFU=";
$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
$strUrl = "https://api.line.me/v2/bot/message/reply";
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
$_msg = $arrJson['events'][0]['message']['text'];
/*
ส่วนนี้อยากให้ต่อ Query String ตัวแปร q
$json = file_get_contents('https://cdn.lottery.co.th/lottery-json/json.php?myid=01072560&q=112360');
ถ้ามีแล้วไปแทรกข้างล่าง
*/
$json = file_get_contents('https://cdn.lottery.co.th/lottery-json/json.php?myid=01072560');
$data = json_decode($json);
$isData=sizeof($data);

  if($isData <0){
   foreach($data as $rec){
    $arrPostData = array();
    $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
    $arrPostData['messages'][0]['type'] = "text";
    $arrPostData['messages'][0]['text'] = "รางวัลที่ 1: ".$rec->prize1;
   }
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
