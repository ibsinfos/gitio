<?php
session_start();
//Include database connection details
require_once('config.php');
// Authenticate page
require_once('auth.php');
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="timeline.css" />
<script type="text/javascript">
	function confirmDelete(delUrl,msg,delUrl2,msg2) {
		if (confirm(msg)) {
			if (confirm(msg2)) {
			document.location = delUrl2;
			} else {
			document.location = delUrl;
			}
		}
	}
</script>
</head>
<body>
<a href="index.php">Terug naar weekoverzicht</a>.
<?php
$admin = $_SESSION['admin'];
if ($admin == True)
    {
    	$sql = "SELECT * FROM ".$table_prefix."slaaplogboek_velden ORDER BY volgorde ASC";
		$result=mysqli_query($DBH,$sql);
		$_SESSION['aantal_vragen'] = mysqli_num_rows($result);

		echo "<table><tr>";		
		echo "<td><b>Naam</b></td>";
		echo "<td><b>Beschrijving</b></td>";
		echo "<td><b>Vraag</b></td>";
		echo "<td><b>Waarde</b></td>";
		echo "<td><b>Type</b></td>";
		echo "<td><b>Volgorde</b></td>";
		echo "<td><b>Hoofdstuk</b></td>";
		echo "<td><b>Gemiddelde</b></td>";
		echo "</tr>";
		
		while($row = mysqli_fetch_assoc($result))
    		{
        		echo "<tr>";
        		echo "<td><a href='vraag_toevoegen.php?naam=" . $row['naam'] . "'>" . $row['naam'] . "</a></td>";
        		echo "<td>" . $row['beschrijving'] . "</td>";
        		echo "<td>" . $row['vraag'] . "</td>";
        		echo "<td>" . $row['waarde'] . "</td>";
        		echo "<td>" . $row['type'] . "</td>";
        		echo "<td>" . $row['volgorde'] . "</td>";
        		echo "<td>" . $row['hoofdstuk'] . "</td>";
        		$gem = ($row['gemiddelde']) ? 'Ja' : 'Nee';
        		echo "<td>" . $gem . "</td>";
        		$dellink = "'vraag_toevoegen.php?naam=" . $row['naam'] . "&delete=true&all=false'";
        		$deltext = "'Weet je zeker dat je " . $row['naam'] ." wilt verwijderen?'";
        		$dellink2 = "'vraag_toevoegen.php?naam=" . $row['naam'] . "&delete=true&all=true'";
        		$deltext2 = "'Wil je ook alle oude slaaplogboek antwoorden van gebruikers wissen?'";
        		$link = '"javascript:confirmDelete('. $dellink . ', ' . $deltext . ', ' . $dellink2 . ', ' . $deltext2 . ')"';
        		echo "<td><a href=". $link ."><img src='minus.png' width=20></a></td>";
        		echo "</tr>";
    		}
		echo "<tr><td><a href='vraag_toevoegen.php'><img src='plus.png' width = 20 align='right'></a></td><td colspan='6'>Voeg nieuwe vraag toe...</td>";
    	echo "</table>";
    } else {
    	header("location:index.php");
    }
?>
</body>
</html>