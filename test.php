<?php

require_once '\Logic\Classes\db_queries.php';

$instance = new Queries();
$result = $instance->loginAuth('davidlag', '1234');
if($result) {
	echo 'OK';
} else {
	echo 'NOT OK';
}

?>