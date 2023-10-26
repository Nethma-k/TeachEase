<?php

$order_id = "1234";
$merchant_id = "1223870";
$name = $_POST["name"];
$price = $_POST["price"];
$currency = "LKR";
$merchant_secret = "MjQ5MTM0MTk5NTgzOTM2OTA5OTM3MjMxNDUxMTk0MTEzOTcwMzU5";
$hash = strtoupper(
    md5(
        $merchant_id .
        $order_id .
        number_format($price, 2, '.', '') .
        $currency .
        strtoupper(md5($merchant_secret))
    )
);

$obj = new stdClass();
$obj->order_id = $order_id;
$obj->merchant_id = $merchant_id;
$obj->name = $name;
$obj->price = $price;
$obj->currency = $currency;
$obj->hash = $hash;

echo json_encode($obj);