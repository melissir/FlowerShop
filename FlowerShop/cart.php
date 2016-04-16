<?php
//Author: Melissa Rhein

require_once "include/smarty.php";
require_once "include/db.php";
require_once "include/session.php";

if (!isset($session->cart)) {
  $session->cart = [];
}

$cart_data = [];
$total_price = 0;
$small_array=[];
$i = 1;

/*
 process $session->cart, storing information into $cart_data
 */
foreach ($session->cart as $cart_key => $cart_value){
  $flower = R::load('flower', $cart_key);
  $small_array['name'] = $flower->name;
  $small_array['price'] = $flower->price;
  $small_array['quantity'] = $cart_value;
  $small_array['flower_id'] = $cart_key;
  $cart_data[$i] = $small_array;
  $i++;
  $total_price += ($flower->price * $cart_value);
}

//turn cart into basket and items when order placed and clear cart
$placeOrder = filter_input(INPUT_POST, 'placeOrder');
if (!is_null($placeOrder)){
  //create basket
  $basket = R::dispense('basket');
  $basket->member_id = $session->member->id;
  $date = date('Y-m-d H:i:s');
  $basket->made_on = $date;
  $basket = R::store($basket);
  
  //create items for each row
  foreach ($session->cart as $cart_key => $cart_value){
    $flower = R::load('flower', $cart_key);
    $item = R::dispense('item');
    $item->flower_id = $cart_key;
    $item->basket_id = $basket;
    $item->quantity = $cart_value;
    $item->price = $flower->price;
    $item = R::store($item);
  }
  
  //clear cart
  unset($session->cart);
  
  header("location: myOrder.php"); 
  exit();
}


$data = [
  'cart_data' => $cart_data,
  'total_price' => $total_price,
];
$smarty->assign($data);
$smarty->display("cart.tpl");
