<?php
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
