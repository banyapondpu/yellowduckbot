<?php
$access_token = "EAAI3Y9A0cSIBANiqrqxLkSyxQgp7ZAvep13JEZC8eQNH9euvePhZB7Xsk6er7sMSQ9DIWGO8H05YewNS2AfyQmhUVhxa5LFIXDJoEDUxM9LCj27OiIN7EsBmvRxKw3tENT0bXa6On2d2CZBty7YWxX9TESa41HyCVy87tpeAfwZDZD";
$verify_token = "yellow_duck";
$hub_verify_token = null;
if(isset($_REQUEST['hub_challenge'])) {
 $challenge = $_REQUEST['hub_challenge'];
 $hub_verify_token = $_REQUEST['hub_verify_token'];
}
if ($hub_verify_token === $verify_token) {
 echo $challenge;
}
?>
