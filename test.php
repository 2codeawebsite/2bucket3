<?php

require_once '\Logic\Classes\db_queries.php';

$qry = new Queries();
$result = $qry->getAllOnUsers(2);
var_dump($result);

?>