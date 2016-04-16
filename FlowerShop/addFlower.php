<?php
//Author: Melissa Rhein

require_once "include/session.php";
require_once "include/db.php";
require_once "include/smarty.php";
header('Cache-Control: no-cache, no-store, max-age=0, must-revalidate');

$name = filter_input(INPUT_POST, 'name');
$price = filter_input(INPUT_POST, 'price');
$description = filter_input(INPUT_POST, 'description');
$imagefile = filter_input(INPUT_POST, 'imagefile');
$instock = filter_input(INPUT_POST, 'instock');
$add = filter_input(INPUT_POST, 'add');
$cancel = filter_input(INPUT_POST, 'cancel');

$name = trim($name); 
$price = trim($price); 
$imagefile = trim($imagefile); 
$instock = trim($instock); 

if(!is_null($add)){
  //name validation
  $currNames = R::find('flower', "where name = ?", [$name]);
  if (count($currNames) != 0) {
    $session->message = "There is already a flower with that name";
  }else{
    if(!preg_match('/[a-zA-Z\s]$/', $name) || strlen($name) < 6){
      $session->message = "Name must be 6 characters long and include only letters";
    }else{
  
    //price validation
      if(!preg_match('/[0-9]+\.[0-9]{2}$/', $price) && (round($price) != $price)){
        $session->message = "Price must be a decimal with two places or an integer";
      }else{
        
      //instock validation
        if(!is_numeric($instock) || $instock < 1 || (round($instock) != $instock)){
          $session->message = "# in stock must be a positive integer";
        }else{
          //create and store new flower
          $flower = R::dispense('flower');
          $flower->name = $name;
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
  }
     
}

if(!is_null($cancel)){
  header("location: index.php");
}


$data = [
    'name' => $name,
    'price' => $price,
    'description' => $description,
    'imagefile' => $imagefile,
    'instock' => $instock,
    'message' => $session->message
];

$smarty->assign($data);
$smarty->display("addFlower.tpl");

