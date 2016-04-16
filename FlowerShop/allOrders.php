<?php
//Author: Melissa Rhein

require_once "include/smarty.php";
require_once "include/db.php";
require_once "include/session.php";
require_once "include/helper.php";
header('Cache-Control: no-cache, no-store, max-age=0, must-revalidate');


//find orders
$orders = R::find('basket');

$orderArr = [];
$small_array = [];
$i = 0;

//create array for displaying items
foreach ($orders as $ordersEntry){
  $member = R::load('member', $ordersEntry->member_id);
  $small_array['order_num'] = $ordersEntry->id;
  $small_array['date'] = $ordersEntry->made_on;
  $small_array['name'] = $member->name;
  $orderArr[$i] = $small_array;
  $i++;
}


$data = [
  'orderArr' => $orderArr,
  'helper' => new Helper(),
];
$smarty->assign($data);
$smarty->display("allOrders.tpl");

