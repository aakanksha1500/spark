<?php

$Name=$_POST['Name'];
$Email=$_POST['Email'];
$Amount=$_POST['Amount'];
$Phone=$_POST['phone'];
$purpose='Donation';

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:test_84b6568c3ccbde4727358de110e",
                  "X-Auth-Token:test_965aef1fa08bfb577dfdfca4b74"));
$payload = Array(
    'purpose' => 'Donation',
    'amount' => $Amount,
    'phone' => $Phone,
    'buyer_name' => $Name,
    'redirect_url' => 'https://child-trust.herokuapp.com/redirect.php',
    'send_email' => true,
    'webhook' => 'https://child-trust.herokuapp.com/webhook.php',
    'send_sms' => true,
    'email' => $Email,
    'allow_repeated_payments' => false
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 

$json_decode = json_decode($response ,true);
$long_url = $json_decode['payment_request'] ['longurl'];
header("location:$long_url");

?>