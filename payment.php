<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:test_84b6568c3ccbde4727358de110e",
                  "X-Auth-Token:test_965aef1fa08bfb577dfdfca4b74"));
$payload = Array(
    'purpose' => 'FIFA 16',
    'amount' => '2500',
    'phone' => '9999999999',
    'buyer_name' => 'AKBWEB',
    'redirect_url' => 'https://child-trust.herokuapp.com/redirect.php',
    'send_email' => true,
    'webhook' => '',
    'send_sms' => true,
    'email' => 'aakankshadeshpande527@gmail.com',
    'allow_repeated_payments' => false
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 

$json_decode = json_decode($response ,true);
$lon_url = $json_decode['payment_request'] ['longurl'];
header('Location:'.$long_url);

?>