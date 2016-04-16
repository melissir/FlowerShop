<?php
require_once "include/smarty.php";

$data = [
];
$smarty->assign($data);
$smarty->display("sample.tpl");
