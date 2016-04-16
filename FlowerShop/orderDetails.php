<?php
//Author: Melissa Rhein

require_once "include/smarty.php";
require_once "include/db.php";
require_once "include/session.php";
header('Cache-Control: no-cache, no-store, max-age=0, must-revalidate');

$processOrder = filter_input(INPUT_POST, 'processOrder');
$canProcess = 1;

if (is_null($processOrder)){
  $order_number = filter_input(INPUT_GET, 'order_number');
  $session->order_number = $order_number;
}

//find items
$items = R::find('item', "where basket_id=?", [$session->order_number]);

//find member
$basket = R::load('basket', $session->order_number);
$member = R::load('member', $basket->member_id);

$orderDetailArr = [];
$small_array = [];
$total_price = 0;
$i = 0;

//create array for displaying items
foreach ($items as $itemEntry){
  $flower = R::load('flower', $itemEntry->flower_id);
  $small_array['flower_id'] = $flower->id;
  $small_array['name'] = $flower->name;
  $small_array['price'] = $itemEntry->price;
  $small_array['quantity'] = $itemEntry->quantity;
  $small_array['lineTotal'] = $itemEntry->price * $itemEntry->quantity;
  $small_array['inStock'] = $flower->instock;
  $orderDetailArr[$i] = $small_array;
  $i++;
  $total_price += $small_array['lineTotal'];
  if($small_array['inStock'] < $small_array['quantity']){
    $canProcess = 0;
  }
}

//processing order

if(is_null($processOrder)){
  $session->firstPress = 0;
}

if (!is_null($processOrder)){
  if(!$session->firstPress){
    $session->message = "Press again to confirm delete";
    $session->firstPress = !$session->firstPress;
  }
  else{
    $session->message = "";
    $session->firstPress = !$session->firstPress;
    header("location: processOrder.php");
    exit();
  }
}

$data = [
  'order_number' => $session->order_number,
  'orderDetailArr' => $orderDetailArr,
  'total_price' => $total_price,
  'member' => $member,
  'message' => $session->message,
  'canProcess' => $canProcess
];
$smarty->assign($data);
$smarty->display("orderDetails.tpl");

