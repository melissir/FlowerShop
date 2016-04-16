<?php
//Author: Melissa Rhein

require_once "include/session.php";
require_once "include/db.php";

$member = filter_input(INPUT_POST, 'member');
$password = filter_input(INPUT_POST, 'password');

$member = trim($member);  // must be trimmed before using
$member = R::findOne("member", "name=?", [$member]);

if (!isset($member)) {
  $session->member = $member;  // flash
  $session->message = "Authentication Failed (member)";  // flash
  header( "location: login.php" );
}
elseif (hash('sha256', $password) === $member->password) { // OK
  $session->member = (object) [
      'id' => $member->id,
      'name' => $member->name,
      'is_admin' => $member->is_admin,
  ];
  header( "location: ." );
}
else {
  $session->member = $member;
  $session->message = "Authentication Failed (password)";
  header( "location: login.php" );
}
