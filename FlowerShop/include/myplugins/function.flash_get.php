<?php

/*
retrieve and clear the value of a session key.
only works if the value is scalar
*/

function smarty_function_flash_get($params, &$smarty) {
   require_once __DIR__ . "/../session.php";
   $session = new Session();
   $key = $params['key'];
   $value = $session->$key;
   unset($session->$key);
   return $value;
}
