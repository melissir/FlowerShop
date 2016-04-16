<?php
//Author: Melissa Rhein

require_once "include/smarty.php";
require_once "include/db.php";
require_once "include/session.php";
require_once "include/helper.php";
header('Cache-Control: no-cache, no-store, max-age=0, must-revalidate');


//find orders
$orders = R::find('basket', "where member_id=?", [$session->member->id]);


$data = [
  'orders' => $orders,
  'helper' => new Helper()
];
$smarty->assign($data);
$smarty->display("myOrder.tpl");

