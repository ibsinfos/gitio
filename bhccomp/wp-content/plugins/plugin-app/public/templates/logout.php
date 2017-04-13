<?php 
require_once( 'config.php');
session_start();
session_destroy();
$_SESSION["logged_in"] = false;
header("Location:" . site_url());
?>
<!--<html>
<head>
<link rel="stylesheet" type="text/css" href="timeline.css" />
<meta HTTP-EQUIV="REFRESH" content="0; url=index.php">
</head>
<body>
<?php
//echo "Uitgelogd. Je wordt doorverbonden naar de <a href='index.php'>inlogpagina</a>...";
?>
</body>
</html>-->