<?php
//Include database connection details
require_once('config.php');
// Authenticate page
require_once('auth.php');
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="timeline.css" />
</head>
<body>
<?php
//mysql_pconnect("$host", "$username", "$password")or die("cannot connect"); 
//mysql_select_db("$db_name")or die("cannot select DB");

/*
We need to include the config file
to make use of the database.
*/
include_once("../../../../wp-config.php");

$myID = $_SESSION['myID'];
$user_id = $myID;

$sql="SELECT * FROM ".$table_prefix."users WHERE ID='$myID'";

//print_r($_SESSION);
//print_r($table_prefix);

$result=mysqli_query($DBH,$sql);
$row = mysqli_fetch_assoc($result);

$my_user_name = $row['display_name'];
$admin  = $_SESSION['admin'];
$datum = '';
if (isset($_REQUEST["datum"]))
    {
        $datum = $_REQUEST["datum"];
    }

$_SESSION['overzicht_type'] = $overzicht_type;

echo "<center><div class='logboekcontainer' id='logboekcontainer'>";
echo "<div class='textholder' id='textholder'>";

echo "<div style='text-align:right;'>";
echo "Hallo, " . $my_user_name . "! | ";
echo "<a href='logout.php'>Log uit</a> <BR>";
echo "</div>";

echo "<div class='logboektitel' id='logboektitel'>Logboek</div>";

if ($admin == True)
{   
    include('admin_paneel.php');
}

// Vragenlijsten

echo "<ul>";
echo "<table bgcolor='#eeeeee'>";
echo "<tr><td><b>Vragenlijsten</b></td></tr>";
echo "<tr><td>";

$sql = "SELECT naam, hoofdstuk, lijstnummer FROM ".$table_prefix."slaaplogboek_vragenlijst_lijsten ORDER BY lijstnummer ASC";
$result=mysqli_query($DBH,$sql);
$echolist = array();
while ($row = mysqli_fetch_assoc($result)) {
    $hoofdstuk_lijst = $row['hoofdstuk'];
    $hoofdstuk_lijst = array_map('trim',explode(",",$hoofdstuk_lijst));
    foreach($hoofdstuk_lijst as $hoofdstuk) {
        $echolist[$hoofdstuk] = "<li><b><a href='vragenlijst_invullen.php?lijstnummer=" . $row['lijstnummer'] . "&hoofdstuk=" . $hoofdstuk . "&user_id=" . $user_id . "'>" . $row['naam'] . "</a> (hoofdstuk " . $hoofdstuk . ")</b></li>";
    }
}
ksort($echolist);
foreach($echolist as $echoline) {
    echo $echoline;
}
echo "</td></tr>";
echo "</table>";
echo "</ul>";

echo '<BR><BR>';
if (isset($_REQUEST["totaaloverzicht"]))
    {
		include('totaaloverzicht.php');
	} else {
		include('weekoverzicht.php');
	}
echo '</div></div></center>';
?>
</body>
</html>