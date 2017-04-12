<?php

//Include database connection details
include('config.php');

// Define $myusername and $mypassword 

// Username vanaf 8 september 2014 omgezet naar emailadres.
//$myusername=$_POST['myusername']; 

$myemail=$_POST['myemail'];
$mypassword=$_POST['mypassword']; 

// To protect MySQL injection (more detail about MySQL injection)
$myemail = stripslashes($myemail);
//$myemail = "tacobos@gmail.com";
$mypassword = stripslashes($mypassword);
$myemail = $DBH->real_escape_string($myemail);
$mypassword = $DBH->real_escape_string($mypassword);

$result = $DBH->prepare("SELECT * FROM ".$table_prefix."users WHERE user_email = ?");
$result->bind_param("s", $myemail);
$result->execute();

$meta = $result->result_metadata();

while ($field = $meta->fetch_field()) {
  $parameters[] = &$row[$field->name];
}

call_user_func_array(array($result, 'bind_result'), $parameters);

while ($result->fetch()) {
  foreach($row as $key => $val) {
    $row[$key] = $val;
  }
  $results[] = $x;
}

//var_dump($row); die();


$wp_hasher = new PasswordHash(8, TRUE); 

$password_hashed = $row['user_pass'];
 
 /*
 Check if the password matches
- Check if md5 matches
- or Check if PasswordHash class matches
*/

$user_activation = $row['user_activation_key'];
if(strlen($user_activation) < 2)
{
if($wp_hasher->CheckPassword($mypassword, $password_hashed)
       || $password_hashed == md5($mypassword)) {
	$_SESSION["logged_in"] = true;
	session_start();
	
	// Register $myusername, $mypassword and redirect to file "login_success.php"
	$_SESSION['myemail'] = $myemail;
	$myID = $row['ID'];
	$_SESSION['myID'] = $myID;
	//$capabilities = "".$table_prefix."capabilities";
	
	// Check if admin	
	$result=mysqli_query($DBH, "SELECT meta_value FROM ".$table_prefix."usermeta 
                              WHERE user_id = '$myID' AND meta_key = '".$table_prefix."capabilities'");
	$row = mysqli_fetch_array($result);

	
	if (strpos($row['meta_value'], 'administrator') == true) {
		$_SESSION['admin'] = true;
	}
	header("location:index.php");
} else {
	echo "<h2>Verkeerde gebruikersnaam en wachtwoord.</h2>";	
}
}
else { 
	echo "<h2>Uw account is nog niet geactiveerd, controleer hiervoor uw mail en eventueel uw spam folder.</h2>";
}
ob_end_flush();
?>