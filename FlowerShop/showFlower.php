<?php
//Author: Melissa Rhein

require_once "include/session.php";
require_once "include/db.php";
require_once "include/smarty.php";
header('Cache-Control: no-cache, no-store, max-age=0, must-revalidate');


$setQ = filter_input(INPUT_POST, 'setQ');

$clearQ = filter_input(INPUT_POST, 'clearQ');

if (is_null($setQ) && is_null($clearQ)){
  $flower_id = filter_input(INPUT_GET, 'flower_id');
  $session->flower_id = $flower_id;
}

if(isset($session->cart[$session->flower_id])){
  $quantity = $session->cart[$session->flower_id];
}else{
  $quantity = "";
}

$flower = R::load('flower', $session->flower_id);

        
if(!is_null($setQ)){
  $quantity = filter_input(INPUT_POST, 'quantity');
  $quantity = trim($quantity);
  if(!is_numeric($quantity) || $quantity < 1 || (round($quantity) != $quantity)){
    $session->message = "Invalid!";
  }else{
    $session->cart[$session->flower_id] = $quantity;
    header("location: cart.php"); 
    exit();
  }
}
if(!is_null($clearQ)){
  unset($session->cart[$session->flower_id]);
  header("location: cart.php"); 
  exit();
}


$data = [
    'flower' => $flower,
    'quantity' => $quantity,
    'message' => $session->message
];

$smarty->assign($data);
$smarty->display("showFlower.tpl");
