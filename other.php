<?php
include("include/header.php"); 

$email          = escape(clean($_GET['youd']));
$all            = 1500;
$tranref        = $_GET['trn'];





$curl = curl_init();

$customer_email = $email;
$amount = $all;  
$currency = "NGN";
$txref = $tranref; // ensure you generate unique references per transaction.
$PBFPubKey = "FLWPUBK-441eba65ae732d824a7afed7f0d01c93-X"; // get your public key from the dashboard.
$redirect_url = "https://mcu-somssa.com.ng/./pay";


curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/hosted/pay",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    'amount'=>$amount,
    'customer_email'=>$customer_email,
    'currency'=>$currency,
    'txref'=>$txref,
    'PBFPubKey'=>$PBFPubKey,
    'redirect_url'=>$redirect_url
  ]),
  CURLOPT_HTTPHEADER => [
    "content-type: application/json",
    "cache-control: no-cache"
  ],
));

$response = curl_exec($curl);
$err = curl_error($curl);

if($err){
  // there was an error contacting the rave API
  //redirect("./payerror");
  die('Curl returned error: ' . $err);
}

$transaction = json_decode($response);

if(!$transaction->data && !$transaction->data->link){
  // there was an error from the API
  print_r('API returned error: ' . $transaction->message);
}

// redirect to page so User can pay
// uncomment this line to allow the user redirect to the payment page
header('Location: ' . $transaction->data->link);
?>