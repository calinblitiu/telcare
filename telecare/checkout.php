<?php
/**
 * Created by PhpStorm.
 * User: rubby
 * Date: 8/22/2017
 * Time: 5:36 PM
 */
require "vendor/autoload.php";
use \Stripe\Stripe;
$stripe_token = $_POST['stripeToken'];
$amount = $_POST['amount'];
$stripe_charge="";
Stripe::setApiKey("sk_test_B9TdZJeFIk4d01GXdy0vVM9q");
try{
    $stripe_charge = \Stripe\Charge::create(array(
        "amount" => $amount,
        "currency" => "usd",
        "card" => $stripe_token,
        "description" => "test"
    ));
}catch (Exception $e)
{
    $return_data['success'] = 0;
    $return_data['error'] = "Payment happens error";
    echo json_encode($return_data);
    exit();
}
$return_data['success'] = 1;
$return_data['error'] = "payement successed";
echo json_encode($return_data);
exit();


