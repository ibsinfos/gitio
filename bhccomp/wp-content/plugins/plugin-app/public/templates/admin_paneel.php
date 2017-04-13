<?php
//Include database connection details
require_once('config.php');
// Authenticate page
require_once('auth.php');
?>

<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="lib/jquery.filtertable.js"></script>
<script type="text/javascript" src="<?php echo plugin_dir_url(__FILE__) ?>../templates/lib/simpletreemenu.js"></script>
<script>$(document).ready(function() { $('table').filterTable(); });</script>
<link rel="stylesheet" type="text/css" href="<?php echo plugin_dir_url(__FILE__) ?>../css/timeline.css" />

</head>
<body>

<?php
if (isset($_REQUEST['user_id']))
{
	$user_id = $_REQUEST['user_id'];
	$_SESSION['user_id'] = $user_id;
	
//	$sql="SELECT display_name FROM ".$table_prefix."users WHERE ID = '$user_id'";
        $row = $wpdb->get_results("SELECT display_name FROM ".$table_prefix."users WHERE ID = '$user_id'", ARRAY_A);
        //print_r($row[0]['display_name']);
//	$result=mysqli_query($DBH,$sql);
//	$row = mysqli_fetch_assoc($result);
        
	$user_name = $row[0]['display_name'];

	if(strlen($user_name) == 0)
		{
			$user_id = $myID;
			$user_name = $my_user_name;
		}
	
	$_SESSION['user_name'] = $user_name;
} else {
    $user_id = $myID;
	$user_name = $my_user_name;
}
?>

<ul id="adminpanel">
<table bgcolor='#eeeeee'>

<tr><td><b>Administratie paneel</b></td></tr>
<tr><td>Ingelogd als: <?php echo $user_name; ?></td></tr>
<tr><td>
<b><a href='vragenoverzicht.php'>Bewerk vragen logboek</a></b><br/>
<b><a href='vragenlijst_overzicht.php'>Bewerk vragenlijsten</a></b><br/>
<b><a href="#" onClick="return false;">Bekijk slaaplogboeken</a></b><br/>

<?php

//$sql="SELECT ID, display_name FROM ".$table_prefix."users ORDER BY user_login";
//print_r($sql);
$result = $wpdb->get_results("SELECT ID, display_name FROM ".$table_prefix."users ORDER BY user_login", ARRAY_A);
//$result=mysqli_query($DBH,$sql);

//print_r($result[0][]);

?>
<ul>
<?php

echo '<input type="text" id="zoeken" placeholder="Zoek client">';
//while($row = mysqli_fetch_assoc($result))
//{
//	echo "<li><a href='index.php?datum=". $datum ."&user_id=" . $row['ID'] ."'>" . $row['display_name'] . "</a></li>";
//	#echo "<tr><td><a href='index.php?datum=". $datum ."&user_id=" . $row['ID'] ."'>" . $row['display_name'] . "</a></td></tr>";
//}

foreach ($result as $row) {
//    print_r($row['ID']);
//    die('asdasd');
	echo "<li><a href='index.php?datum=". $datum ."&user_id=" . $row['ID'] ."'>" . $row['display_name'] . "</a></li>";

}
?>

</ul>

</td>
</tr>

</table>
</ul>

<script type="text/javascript">

//ddtreemenu.createTree(treeid, enablepersist, opt_persist_in_days (default is 1))

ddtreemenu.createTree("adminpanel", false)
ddtreemenu.flatten('adminpanel', 'contact')
</script>

</body>
</html>