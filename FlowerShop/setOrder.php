<?php
//Author: Melissa Rhein

require_once "include/session.php";
require_once "include/smarty.php";

$session->order = filter_input(INPUT_GET, 'listBy');
  

header("location: index.php");
exit();




