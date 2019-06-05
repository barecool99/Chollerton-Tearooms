
<!-- This is the connection file that connects to the database, 
if it does not connect it shows an error with the help of IF statements -->
<?php
$dbConn = new mysqli('localhost', 'unn_w18041057', 'Saugat101', 'unn_w18041057');

if ($dbConn->connect_error) {
    echo "<p>Connection failed: ".$dbConn->connect_error."</p>\n";
    exit;
}
?>