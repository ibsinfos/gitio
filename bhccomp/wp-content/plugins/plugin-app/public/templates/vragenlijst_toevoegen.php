<?php
//Include database connection details
require_once('config.php');
// Authenticate page
require_once('auth.php');

$admin = $_SESSION['admin'];
$vraagID = $_REQUEST["vraagID"];
$lijstnummer = $_SESSION['lijstnummer'];
$type = $_SESSION['type'];
$delete = $_REQUEST["delete"];
$all = $_REQUEST["all"];
if ($delete == 'true')
{
    $sql = "SELECT naam FROM ".$table_prefix."slaaplogboek_vragenlijst_vragen WHERE `".$table_prefix."slaaplogboek_vragenlijst_vragen`.`ID` = '". $vraagID . "'";
    $naam=mysqli_result(mysqli_query($DBH,$sql), 0);
    $query_text = "DELETE FROM ".$table_prefix."slaaplogboek_vragenlijst_vragen WHERE `".$table_prefix."slaaplogboek_vragenlijst_vragen`.`ID` = '". $vraagID . "'";
    if (!mysqli_query($DBH,$query_text))
      {
      echo $query_text;
      die('Error: ' . mysqli_error());
      }
    if ($all == 'true')
    {
        if ($type == 'invulvelden')
        {
            $query_text = "ALTER TABLE `".$table_prefix."slaaplogboek_vragenlijst_invulvelden` DROP `". $naam ."`";
            if (!mysqli_query($DBH,$query_text))
              {
              echo $query_text;
              die('Error: ' . mysqli_error());
              }
        } else {
            $query_text = "ALTER TABLE `".$table_prefix."slaaplogboek_vragenlijst` DROP `". $naam ."`";
            if (!mysqli_query($DBH,$query_text))
              {
              echo $query_text;
              die('Error: ' . mysqli_error());
              }
        }
    }
    $link = "location:vragenlijst_overzicht.php?lijstnummer = " . $lijstnummer;
    header($link);
}
if ($admin == False) {
    	header("location:index.php");
    }
?>
<html>
<head>
<script type='text/javascript' src='lib/xgetelementbyid.js'></script>
<script type='text/javascript' src='lib/xtableiterate.js'></script>
<script type='text/javascript' src='lib/xpreventdefault.js'></script>
<script type='text/javascript' src='lib/inkleuren.js'></script>
<link rel="stylesheet" type="text/css" href="timeline.css" />
</head>
<body>
<?php
if ($admin == True)
    {
		$_SESSION['page'] = 'vragenlijst';
		if ($vraagID == '')
		{
    		$values = False;
    		$query_text = "SELECT volgorde FROM ".$table_prefix."slaaplogboek_vragenlijst_vragen WHERE lijstnummer = " . $lijstnummer . " ORDER BY volgorde DESC";
    		if(mysqli_num_rows(mysqli_query($DBH,$query_text)) != 0)
    		{
			    $volgorde = mysqli_result(mysqli_query($DBH,$query_text),0);
			}
		} else {
			$values = True;
			$query_text = "SELECT * FROM ".$table_prefix."slaaplogboek_vragenlijst_vragen WHERE ID = '";
			$query_text .= $vraagID;
			$query_text .= "'";
			$result_values = mysqli_query($DBH,$query_text);
			$row_values = mysqli_fetch_assoc($result_values);
			if (count($row_values) == 1)
			{
				$values = False;
			}
		}
		$_SESSION['values'] = $values;
		echo "<div id='add-slaaplogboek'>";
		echo "<a href='vragenlijst_overzicht.php?lijstnummer=". $lijstnummer ."'>Ga terug naar het overzicht</a>.";
		echo "\n <form action='insert.php' method='post'>";
		echo "<table><tr>";
		echo "<td><b>Naam</b></td>";
		echo '<td><input type="text" name = "naam"';
		if ($values == True) {
			echo '" value = "'. $row_values['naam'];
		}
		echo '"/></td></tr>';
		echo "<td><b>Vraag</b></td>";
		echo '<td><input type="text" name = "vraag"';
		if ($values == True) {
			echo '" value = "'. $row_values['vraag'];
		}
		echo '"/></td></tr>';
		echo "<tr><td><b>Volgorde</b></td>";
		echo '<td><input type="text" name = "volgorde"';
		if ($values == True) {
			echo '" value = "'. $row_values['volgorde'];
		} else {
		    echo '" value = "'. ($volgorde+1);
		}
		echo '"/></td></tr>';
		echo "</table>";
		if($values) {
		    echo "<input type='hidden' name= 'vraagID' value=" . $vraagID . ">";
		}
		echo "<input type='hidden' name= 'lijstnummer' value=" . $lijstnummer . ">";
		echo "<input type='submit'  value='Opslaan' />";
	}
	
?>

</form>
</div>
</body>
</html>