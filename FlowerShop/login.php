<?php
//Author: Melissa Rhein

require_once "include/smarty.php";
require_once "include/session.php";
header('Cache-Control: no-cache, no-store, max-age=0, must-revalidate');

if (isset($session->member)) {  // if valid
  header("location: .");      // redirect to home
  exit();
}

$data = [
];
$smarty->assign( $data );
$smarty->display("login.tpl");



