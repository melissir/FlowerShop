<?php
//Author: Melissa Rhein

require_once "include/smarty.php";
require_once "include/db.php";
require_once "include/session.php";

//find items
$items = R::find('item', "where basket_id=?", [$session->order_number]);

foreach ($items as $itemEntry){
  //subtract quantity from stock
  $flower = R::load('flower', $itemEntry->flower_id);
  $newStock = $flower->instock - $itemEntry->quantity;
  $flower->instock = $newStock;
  R::store($flower);
  
  //delete item
  R::trash($itemEntry);
}

//delete basket
$basket = R::load('basket', $session->order_number);
R::trash($basket);

$session->message = "Order #".$session->order_number." successfully processed";

header("location: allOrders.php");
exit();