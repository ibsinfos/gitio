<?php
/*
We need to include the config file
to make use of the database.
*/

//global $wpdb;
//print_r($wpdb);

//die(get_site_url());
include("../../../../../wp-config.php");

//$DBH = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

/*
We need to include the PasswordHass class
to make use of the methods and to check
if the passwords are matching. 
*/
include_once("../../../../../wp-includes/class-phpass.php");
setlocale(LC_TIME, 'nl_NL');

// Include custom function to all pages - - - function will replace deprecated mysql_result() 

function mysqli_result($result, $row, $field = 0) {
    // Adjust the result pointer to that specific row
    $result->data_seek($row);
    // Fetch result array
    $data = $result->fetch_array();
 
    return $data[$field];
}

