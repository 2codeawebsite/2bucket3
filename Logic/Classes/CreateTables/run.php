<?php
$link = mysqli_connect("localhost", "bucket", "1234", "bucket_db");

/* check connection */
if (mysqli_connect_errno()) {
   printf("Connect failed: %s\n", mysqli_connect_error());
   exit();
}


$file = 'SQL_VER3.sql';

$fh = fopen($file, 'r');
$theData = fread($fh, filesize($file));
fclose($fh);

/* Delete the comments in the SQL script */
$lines = explode("\n",$theData);
$commands = '';
foreach($lines as $line){
    $line = trim($line);
    if( $line && !startsWith($line,'--') ){
        $commands .= $line . "\n";
    }
}

// echo '<pre>';
// echo $commands;
// die();

function startsWith($haystack, $needle){
    $length = strlen($needle);
    return (substr($haystack, 0, $length) === $needle);
}

/* Execute multi query */
if (mysqli_multi_query($link, $commands)) {
   do {
       /* Store first result set */
       if ($result = mysqli_store_result($link)) {
           //do nothing since there's nothing to handle
           mysqli_free_result($result);
       }
       /* Print divider */
       if (mysqli_more_results($link)) {}
   } while (mysqli_next_result($link));
   echo '<h3>The SQL script has been imported successfully into the database.</h3>';
} else {
   	echo '<h3>The SQL script has NOT been imported successfully into the database.</h3>';
}

echo '<pre>';
echo $theData;

/* close connection */
mysqli_close($link);
?>