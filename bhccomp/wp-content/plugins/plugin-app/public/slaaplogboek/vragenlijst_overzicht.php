<?php
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
<?php
$admin = $_SESSION['admin'];
$lijstnummer = $_REQUEST["lijstnummer"];
$_SESSION["lijstnummer"] = $lijstnummer;

if ($admin == True)
    {
        if($lijstnummer != null)
        {
            $sql = "SELECT naam FROM ".$table_prefix."slaaplogboek_vragenlijst_lijsten WHERE lijstnummer = " . $lijstnummer;
            $lijstnaam=mysqli_result(mysqli_query($DBH,$sql), 0);
            
            $sql = "SELECT type FROM ".$table_prefix."slaaplogboek_vragenlijst_lijsten WHERE lijstnummer = " . $lijstnummer;
            $type=mysqli_result(mysqli_query($DBH,$sql), 0);

            $_SESSION["type"] = $type;
            
            $sql = "SELECT * FROM ".$table_prefix."slaaplogboek_vragenlijst_vragen WHERE lijstnummer = " . $lijstnummer . " ORDER BY volgorde ASC";
            $result=mysqli_query($DBH,$sql);
            $_SESSION['aantal_vragen'] = mysqli_num_rows($result);
            
            echo '<a href="vragenlijst_overzicht.php">Terug naar vragenlijst overzicht</a>.';
            
            echo '<br><h2>';
            echo $lijstnaam;
            echo '<br></h2>';
            
            echo "<table><tr>";
            echo "<td><b>Naam</b></td>";
            echo "<td><b>Vraag</b></td>";
            echo "<td><b>Volgorde</b></td>";
            echo "</tr>";
            
            while($row = mysqli_fetch_assoc($result))
                {
                    echo "<tr>";
                    echo "<td><a href='vragenlijst_toevoegen.php?vraagID=" . $row['ID'] . "'>" . $row['naam'] . "</a></td>";
                    echo "<td>" . $row['vraag'] . "</td>";
                    echo "<td>" . $row['volgorde'] . "</td>";
                    $dellink = "'vragenlijst_toevoegen.php?vraagID=" . $row['ID'] . "&delete=true&all=false'";
                    $deltext = "'Weet je zeker dat je lijst " . $row['lijstnummer'] ." wilt verwijderen?'";
                    $dellink2 = "'vragenlijst_toevoegen.php?vraagID=" . $row['ID'] . "&delete=true&all=true'";
                    $deltext2 = "'Wil je ook alle oude antwoorden van gebruikers wissen?'";
                    $link = '"javascript:confirmDelete('. $dellink . ', ' . $deltext . ', ' . $dellink2 . ', ' . $deltext2 . ')"';
                    echo "<td><a href=". $link ."><img src='minus.png' width=20></a></td>";
                    echo "</tr>";
                }
            echo "<tr><td><a href='vragenlijst_toevoegen.php?lijstnummer=" . $lijstnummer . "'><img src='plus.png' width = 20 align='right'></a></td><td colspan='6'>Voeg nieuwe vraag toe...</td>";
            echo "</table>";
        } else {
            $sql = "SELECT * FROM ".$table_prefix."slaaplogboek_vragenlijst_lijsten ORDER BY lijstnummer ASC";
            $result=mysqli_query($DBH,$sql);
            
            echo '<a href="index.php">Terug naar weekoverzicht</a>.';
            echo "<table><tr>";		
            echo "<td><b>Naam</b></td>";
            echo "<td><b>Hoofdstuk</b></td>";
            echo "<td><b>Type</b></td>";
            echo "</tr>";
        
            while($row = mysqli_fetch_assoc($result))
                {
                    echo "<tr>";
                    echo "<td><a href='vragenlijst_overzicht.php?lijstnummer=" . $row['lijstnummer'] . "'>" . $row['naam'] . "</a></td>";
                    echo "<td>" . $row['hoofdstuk'] . "</td>";
                    echo "<td>" . $row['type'] . "</td>";
                    //$dellink = "'vragenlijst_toevoegen.php?lijstnummer=" . $row['lijstnummer'] . "&delete=true&all=false'";
                    //$deltext = "'Weet je zeker dat je lijst " . $row['lijstnummer'] ." wilt verwijderen?'";
                    //$dellink2 = "'vragenlijst_toevoegen.php?lijstnummer=" . $row['lijstnummer'] . "&delete=true&all=true'";
                    //$deltext2 = "'Wil je ook alle oude antwoorden van gebruikers wissen?'";
                    //$link = '"javascript:confirmDelete('. $dellink . ', ' . $deltext . ', ' . $dellink2 . ', ' . $deltext2 . ')"';
                    //echo "<td><a href=". $link ."><img src='minus.png' width=20></a></td>";
                    echo "</tr>";
                }
            //echo "<tr><td><a href='vragenlijst_toevoegen.php'><img src='plus.png' width = 20 align='right'></a></td><td colspan='6'>Voeg nieuwe vraag toe...</td>";
            echo "</table>";
        }
    } else {
    	header("location:index.php");
    }
?>
</body>
</html>