<?php
chdir(__DIR__);
require_once '../include/db.php';

echo "\n---- database = ", DBProps::which, "\n\n";

foreach (["item", "basket", "member", "flower"] as $table) {
  $sql = "drop table if exists $table";
  echo "$sql\n";
  R::exec($sql);
}

foreach (["flower", "member", "basket", "item"] as $table) {
  $filename = sprintf("%s-%s.sql", $table, DBProps::which);
  $sql = file_get_contents("tables/$filename");
  echo "$sql\n";
  R::exec($sql);
}
