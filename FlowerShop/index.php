<?php
//Author: Melissa Rhein

require_once "include/session.php";
require_once "include/smarty.php";
require_once "include/db.php";
header('Cache-Control: no-cache, no-store, max-age=0, must-revalidate');

if (is_null($session->order)) {
  $session->order = 'name';
}

$choices = array('name' => 'name',  'price' => 'price');

try{
  $flowers = R::find('flower',"order by {$session->order}");
}catch (Exception $ex) {
    $message = $ex->getMessage();
}
    
$data = [
  'page_title' => 'Home',
  'flowers' => $flowers,
  'choices' => $choices,
];


$smarty->assign($data);
$smarty->display("index.tpl");
