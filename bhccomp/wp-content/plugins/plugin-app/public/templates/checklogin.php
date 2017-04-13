<?php

//Include database connection details
include('config.php');
//global $wpdb;
// Define $myusername and $mypassword 
// Username vanaf 8 september 2014 omgezet naar emailadres.
//$myusername=$_POST['myusername']; 

$myemail = $_POST['myemail'];
$mypassword = $_POST['mypassword'];



// To protect MySQL injection (more detail about MySQL injection)
//$myemail = stripslashes($myemail);
//
//$mypassword = stripslashes($mypassword);
//$myemail = $DBH->real_escape_string($myemail);
//$mypassword = $DBH->real_escape_string($mypassword);
//
//print_r($myemail);
//print_r($mypassword);

//$result = $DBH->prepare("SELECT * FROM " . $table_prefix . "users WHERE user_email = ?");


//print_r($result);
//echo '-------1-------';

//$result->bind_param("s", $myemail);
//$result->execute();

//print_r($result);
//echo '-------2-------';

$myemail = esc_sql($myemail);
$mypassword = esc_sql($mypassword);

$row = $wpdb->get_results("SELECT * FROM `wp_users` WHERE `user_email` = '" . $myemail . "'", ARRAY_A);

//print_r($row);
//echo '-------3-------';


//$meta = $result->result_metadata();
//
//print_r($meta);
//echo '-------4-------';
//
//while ($field = $meta->fetch_field()) {
//  $parameters[] = &$row[$field->name];
//}
//
//call_user_func_array(array($result, 'bind_result'), $parameters);
//
//while ($result->fetch()) {
//  foreach($row as $key => $val) {
//    $row[$key] = $val;
//  }
//  $results[] = $x;
//}
//print_r($row);
//echo '-------5-------';
//print_r($results);
//echo '-------6-------';
//var_dump($row); die();


$wp_hasher = new PasswordHash(8, TRUE);

$password_hashed = $row[0]['user_pass'];

/*
  Check if the password matches
  - Check if md5 matches
  - or Check if PasswordHash class matches
 */

$user_activation = $row['user_activation_key'];
if (strlen($user_activation) < 2) {
    if ($wp_hasher->CheckPassword($mypassword, $password_hashed) || $password_hashed == md5($mypassword)) {
        $_SESSION["logged_in"] = true;
        session_start();

        $_SESSION['myemail'] = $myemail;
        $myID = $row[0]['ID'];
        $_SESSION['myID'] = $myID;

//        print_r($_SESSION);
//        echo '-------1-------';
         //print_r($myID);
         
//          print_r($_SESSION);

        // Check if admin	
//        $result = mysqli_query($DBH, "SELECT meta_value FROM " . $table_prefix . "usermeta 
//                              WHERE user_id = '$myID' AND meta_key = '" . $table_prefix . "capabilities'");
        
        $meta_options = $wpdb->get_results("SELECT meta_value FROM " . $table_prefix . "usermeta 
                              WHERE user_id = '$myID' AND meta_key = '" . $table_prefix . "capabilities'", ARRAY_A);
        
//        print_r($meta_options);
//        echo '-------4-------';
        
//        $row = mysqli_fetch_array($result);


        if (strpos($meta_options[0]['meta_value'], 'administrator') == true) {
            $_SESSION['admin'] = true;
        }

//        print_r($_SESSION);
//        echo '-------2-------';
//        die('here2');
        
        header("location:index.php");
        //wp_redirect( site_url() . '/app-home-page' );
    } else {
        echo "<h2>Verkeerde gebruikersnaam en wachtwoord.</h2>";
    }
} else {
    echo "<h2>Uw account is nog niet geactiveerd, controleer hiervoor uw mail en eventueel uw spam folder.</h2>";
}
ob_end_flush();
?>