<?php
//Include database connection details
require_once('config.php');
// Authenticate page
require_once('auth.php');

$admin = $_SESSION['admin'];
$naam = $_REQUEST["naam"];
$delete = $_REQUEST["delete"];
$all = $_REQUEST["all"];
if ($delete == 'true')
	{
		$query_text = "DELETE FROM ".$table_prefix."slaaplogboek_velden WHERE `".$table_prefix."slaaplogboek_velden`.`naam` = '". $naam . "'";
		if (!mysqli_query($DBH,$query_text))
		  {
		  echo $query_text;
		  die('Error: ' . mysqli_error());
		  }
		if ($all == 'true')
		{
			$query_text = "ALTER TABLE `".$table_prefix."slaaplogboek` DROP `". $naam ."`";
			if (!mysqli_query($DBH,$query_text))
			  {
			  echo $query_text;
			  die('Error: ' . mysqli_error());
			  }
		}
		header("location:vragenoverzicht.php");
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
		$_SESSION['page'] = 'vraag';
		if ($naam == '')
		{
    		$values = False;
		} else {
			$values = True;
			$query_text = "SELECT * FROM ".$table_prefix."slaaplogboek_velden WHERE naam = '";
			$query_text .= $naam;
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
		echo "<a href='vragenoverzicht.php'>Ga terug naar het overzicht</a>.";
		echo "\n <form action='insert.php' method='post'>";
		echo "<table><tr>";		
		echo "<td><b>Naam</b></td>";
		if ($values == True) {
			echo '<input type="hidden" name="id" value="' . $row_values['ID'] . '">';
		}
		echo '<td><input type="text" name = "naam"';
		if ($values == True) {
			echo '" value = "'. $row_values['naam'];
		}
		echo '"/></td></tr>';
		echo "<tr><td><b>Beschrijving</b></td>";
		echo '<td><input type="text" name = "beschrijving"';
		if ($values == True) {
			echo '" value = "'. $row_values['beschrijving'];
		}
		echo '"/></td></tr>';
		echo "<tr><td><b>Vraag</b></td>";
		echo '<td><input type="text" name = "vraag"';
		if ($values == True) {
			echo '" value = "'. $row_values['vraag'];
		}
		echo '"/></td></tr>';
		echo "<tr><td><b>Waarde</b></td>";
		echo '<td><input type="text" name = "waarde"';
		if ($values == True) {
			echo '" value = "'. $row_values['waarde'];
		}
		echo '"/></td></tr>';
		echo "<tr><td><b>Type</b></td>";
		echo "<td>";
		$types = array(
			'ja' => 'Ja',
			'nee' => 'Nee',
			'tekst' => 'Tekst',
			'cijfer' => 'Cijfer',
			'tijdlijn' => 'Tijdlijn'
		);
		?>
		<select name="type">
		<?php foreach( $types as $var => $type ): ?>
		<option value="<?php echo $var ?>"<?php if( $var == $row_values['type'] ): ?> selected="selected"<?php endif; ?>><?php echo $type ?></option>
		<?php endforeach; ?>
		</select>
		<?php
		echo "<tr><td><b>Volgorde</b></td>";
		echo '<td><input type="text" name = "volgorde"';
		if ($values == True) {
			echo '" value = "'. $row_values['volgorde'];
		}
		echo '"/></td></tr>';
		echo "<tr><td><b>Hoofdstuk</b></td>";
		echo '<td><input type="text" name = "hoofdstuk"';
		if ($values == True) {
			echo '" value = "'. $row_values['hoofdstuk'];
		}
        echo '"/></td></tr>';
        echo "<tr><td><b>Gemiddelde</b></td>";
        echo "<td>";
		$gems = array(
			'1' => 'Ja',
			'0' => 'Nee'
		);
		?>
		<select name="gemiddelde">
		<?php foreach( $gems as $var => $gem ): ?>
		<option value="<?php echo $var ?>"<?php if( $var == $row_values['gemiddelde'] ): ?> selected="selected"<?php endif; ?>><?php echo $gem ?></option>
		<?php endforeach; ?>
		</select>
		<?php
		echo "</table>";
		echo "<input type='submit'  value='Opslaan' />";
	}
	
?>

</form>
</div>
</body>
</html>