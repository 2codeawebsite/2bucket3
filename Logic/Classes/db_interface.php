<?php

interface db {
	function connect();
	function run_query($query);
}


?>