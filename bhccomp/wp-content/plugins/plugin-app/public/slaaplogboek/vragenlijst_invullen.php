<?php
//Include database connection details
require_once('config.php');
// Authenticate page
require_once('auth.php');

/*
We need to include the config file
to make use of the database.
*/
include_once("../../../../wp-config.php");

$myID = $_SESSION['myID'];
$admin = $_SESSION['admin'];
if ($admin != True)
{
    $user_id = $myID;
}

if ($admin == True)
{
    if (isset($_REQUEST['user_id']))
    {
        $user_id = $_REQUEST['user_id'];
        $_SESSION['user_id'] = $user_id;
    
        $sql="SELECT display_name FROM ".$table_prefix."users WHERE ID = '$user_id'";
        $result=mysqli_query($DBH,$sql);
        $row = mysqli_fetch_assoc($result);
        $user_name = $row['display_name'];

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
}
$_SESSION['page'] = 'vragenlijst_invullen';

// get username
$sql="SELECT * FROM ".$table_prefix."users WHERE ID='$myID'";
$result=mysqli_query($DBH,$sql);
$row = mysqli_fetch_assoc($result);
$my_user_name = $row['display_name'];

//get lijstnummer
$lijstnummer = $_REQUEST['lijstnummer'];
$hoofdstuk = intval($_REQUEST['hoofdstuk']);
$_SESSION['hoofdstuk'] = $hoofdstuk;

if($lijstnummer == null) {
    $lijstnummer = 1;
}

$_SESSION['lijstnummer'] = $lijstnummer;

?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="timeline.css" />

</head>
<body>
<center><div class='logboekcontainer' id='logboekcontainer'>

<?php
echo "<div style='text-align:right;'>";
echo "Hallo, " . $my_user_name . "! | ";
echo "<a href='logout.php'>Log uit</a> <BR>";
echo "</div>";

?>

<div class='logboektitel' id='logboektitel'>Logboek</div>

<?php

$sql = "SELECT naam, type, hoofdstuk FROM ".$table_prefix."slaaplogboek_vragenlijst_lijsten WHERE lijstnummer = " . $lijstnummer;

$result = mysqli_query($DBH,$sql);



$lijstnaam = mysqli_result($result, 0, type);

$type = mysqli_result($result, 0, 'type');
$hoofdstuk_lijst = mysqli_result($result, 0, 'hoofdstuk');
$hoofdstuk_lijst = array_map('trim',explode(",",$hoofdstuk_lijst));
$hkey = array_search($hoofdstuk, $hoofdstuk_lijst);

$_SESSION['type'] = $type;

if($hoofdstuk == null or $hkey == null) {
    $hoofdstuk = $hoofdstuk_lijst[0];
    $hkey = 0;
}
if($hkey == 0){
    $hkey = '';
}
echo "<br><a href='javascript:history.go(-1)'>< Ga terug</a>";
echo "<h2>Vragenlijst '";
echo $lijstnaam;
echo "', hoofdstuk " . $hoofdstuk . "</h2>";

$sql = "SELECT naam, vraag FROM ".$table_prefix."slaaplogboek_vragenlijst_vragen WHERE lijstnummer = " . $lijstnummer . " ORDER BY volgorde ASC";
$result=mysqli_query($DBH,$sql);

echo "<form action='insert.php' method='post'>";
echo "<table cellspacing='0' cellpadding='0'>";
echo "<tr>";


// get values
$values = True;
if ($type == 'invulvelden')
{
    $query_text = "SELECT * FROM ".$table_prefix."slaaplogboek_vragenlijst_invulvelden WHERE userID = '";
    $invulvelden = array();
} else {
    $query_text = "SELECT * FROM ".$table_prefix."slaaplogboek_vragenlijst WHERE userID = '";
}
$query_text .= $user_id;
$query_text .= "'";

if($type=='eensoneens') {
    echo "<td><b>Vraag</b></td>";
    echo "<td colspan=3 style='word-wrap:break-word; max-width:50px; font-size: 10px;'><b>Helemaal oneens</b></td>";
    echo "<td colspan=3 style='word-wrap:break-word; max-width:50px; height: 50px; font-size: 10px;'><b>Helemaal eens</b></td>";
    echo "</tr>";
    $result_values = mysqli_query($DBH,$query_text);
    $row_values = mysqli_fetch_assoc($result_values);
} else if ($type=='janee') {
    echo "<td><b>Vraag</b></td>";
    echo "<td><b>Ja</b></td>";
    echo "<td><b>Nee</b></td>";
    echo "<td><b>N.v.t.</b></td>";
    echo "</tr>";
    $result_values = mysqli_query($DBH,$query_text);
    $row_values = mysqli_fetch_assoc($result_values);
}

if (count($row_values) == 1)
{
    $values = False;
}
$_SESSION['values'] = $values;

$i=0;
while($row = mysqli_fetch_assoc($result))
{
    if(($type =='eensoneens') or ($type =='janee'))
    {
        $i++;
        if($i % 2 == 0) {
            echo "<tr style='background-color:#Fda;'><td>";
        } else {
            echo "<tr><td>";
        }
        echo $row['vraag'];
        echo "</td>";
    }    
    $naam = $row['naam'] . $hkey;
    //echo $row_values[$naam];
    if($type=='eensoneens') {
        echo "<td><input type='radio' name='" . $row['naam'] . "' value=1" . ($row_values[$naam] == 1 ? ' checked' : '') . "></td>";
        echo "<td><input type='radio' name='" . $row['naam'] . "' value=2" . ($row_values[$naam] == 2 ? ' checked' : '') . "></td>";
        echo "<td><input type='radio' name='" . $row['naam'] . "' value=3" . ($row_values[$naam] == 3 ? ' checked' : '') . "></td>";
        echo "<td><input type='radio' name='" . $row['naam'] . "' value=4" . ($row_values[$naam] == 4 ? ' checked' : '') . "></td>";
        echo "<td><input type='radio' name='" . $row['naam'] . "' value=5" . ($row_values[$naam] == 5 ? ' checked' : '') . "></td>";
        echo "<td width=10>&nbsp;</td>";
        echo "</tr>";
    } else if($type == 'janee') {
        echo "<td><input type='radio' name='" . $row['naam'] . "' value=1" . ($row_values[$naam] == 1 ? ' checked' : '') . "></td>";
        echo "<td><input type='radio' name='" . $row['naam'] . "' value=2" . ($row_values[$naam] == 2 ? ' checked' : '') . "></td>";
        echo "<td><input type='radio' name='" . $row['naam'] . "' value=3" . ($row_values[$naam] == 3 ? ' checked' : '') . "></td>";
        echo "</tr>";
    } else if($type == 'invulvelden') {
        $invulvelden[] = $row['naam'];
        $invulvelden_vraag[] = $row['vraag'];
    }
}
echo "</table>";

if($type == 'invulvelden') {
    $values = False;
    $result_values = mysqli_query($DBH,$query_text);
    while($row_values = mysqli_fetch_assoc($result_values)) {
        $arrayCount = count($invulvelden);
        $_SESSION['values'] = $values;
        echo "<br>";
        for ($x = 0; $x < $arrayCount; $x++)
        {
            echo "<b>";
            echo $invulvelden_vraag[$x];
            echo "</b>";
            echo $row_values[$invulvelden[$x]];
            echo "<br>";
        }
    }
}

echo "<input type='hidden' name='hkey' value='" . $hkey . "'>";
echo "<br>";

if($type == 'invulvelden') {
    $arrayCount = count($invulvelden);
    for ($x = 0; $x < $arrayCount; $x++)
    {
        echo "<b>";
        echo $invulvelden_vraag[$x];
        echo "</b><br>";
        if($invulvelden[$x] == 'datum') {
            echo "<input type='date' name='";
            echo $invulvelden[$x];
            echo "'>";
        } else {
            echo "<textarea name='";
            echo $invulvelden[$x];
            echo "'></textarea>";
        }
        echo "<br>";
    }
}

// Opmerkingen veld
if($type=='janee'){
    echo "<br>Vul hier eventuele andere vooruitgang in:<br>";
    echo "<textarea name='opmerkingen'>";
    if($values){
        echo $row_values['opmerkingen' . $hkey];
    }
    echo "</textarea>";
}
echo "<br>";
if($myID == $user_id) {
    echo "<input type='submit'  value='Opslaan' />";
    echo "</form>";
}
?>
</body>
</html>