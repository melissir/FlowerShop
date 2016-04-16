<?php
//Author: Melissa Rhein

require_once "include/session.php";
require_once "include/db.php";
require_once "include/smarty.php";
header('Cache-Control: no-cache, no-store, max-age=0, must-revalidate');

$modify = filter_input(INPUT_POST, 'modify');
$cancel = filter_input(INPUT_POST, 'cancel');

if (is_null($modify) && is_null($cancel)){
  $flower_id = filter_input(INPUT_GET, 'flower_id');
  $session->flower_id = $flower_id;
  $flower = R::load('flower', $session->flower_id);
  $price = $flower->price; 
  $imagefile = $flower->imagefile; 
  $instock = $flower->instock; 
  $session->name = $flower->name; 
  $description = $flower->description;
}else{
  $price = filter_input(INPUT_POST, 'price');
  $description = filter_input(INPUT_POST, 'description');
  $imagefile = filter_input(INPUT_POST, 'imagefile');
  $instock = filter_input(INPUT_POST, 'instock');
  $price = trim($price); 
  $imagefile = trim($imagefile); 
  $instock = trim($instock); 
}



if(!is_null($modify)){
  //price validation
    if(!preg_match('/[0-9]+\.[0-9]{2}$/', $price) && (round($price) != $price)){
      $session->message = "Price must be a decimal with two places or an integer";
    }else{

    //instock validation
      if(!is_numeric($instock) || $instock < 1 || (round($instock) != $instock)){
        $session->message = "# in stock must be a positive integer";
      }else{
        //modify and store flower
        $flower = R::load('flower', $session->flower_id);
        $flower->price = $price;
        $flower->description = $description;
        $flower->imagefile = $imagefile;
        $flower->instock = $instock;
        $flower = R::store($flower);

        //re-direct to home
        header("location: index.php");
      }
    }
  

     
}

if(!is_null($cancel)){
  header("location: index.php");
}


$data = [
    'name' => $session->name,
    'price' => $price,
    'description' => $description,
    'imagefile' => $imagefile,
    'instock' => $instock,
    'message' => $session->message
];

$smarty->assign($data);
$smarty->display("modifyFlower.tpl");

