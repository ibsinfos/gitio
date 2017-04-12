<?php
//Include database connection details
require_once('config.php');
// Authenticate page
require_once('auth.php');

$page = $_SESSION['page'];
$admin = $_SESSION['admin'];
$values = $_SESSION['values'];
$hoofdstuk = $_SESSION['hoofdstuk'];

if ($page == 'vraag')
{
    // vragen voor slaaplogboek toevoegen
	if ($admin == True)
	{
		// EMPTY FIELD CHECK
		if( (empty($_POST['naam'])) || (empty($_POST['beschrijving'])) || (empty($_POST['vraag'])) )
		{
			echo '<script>alert("Vul tenminste in: naam, beschrijving en vraag.");</script>';
			echo '<script>history.back(1);</script>';
			exit;
		}
		if( (empty($_POST['volgorde'])) )
		{
			$_POST['volgorde'] = $_SESSION['aantal_vragen'];
		}
		if( (empty($_POST['hoofdstuk'])) )
		{
			$_POST['hoofdstuk'] = '1';
		}
	
		$query_text = '';
		if ($values == True)
		{
			$query_text = "REPLACE INTO ".$table_prefix."slaaplogboek_velden (ID, volgorde, naam, beschrijving, vraag, waarde, type, hoofdstuk, gemiddelde";
			$query_text .= ") VALUES ('";
			$query_text .= $_POST['id'] . "', '";
		} else {
			// voeg eerst een kolom toe aan slaaplogboek database
			if ($_POST['type'] == 'ja' or $_POST['type'] == 'nee')
			{
				$query_text1 = "ALTER TABLE  `".$table_prefix."slaaplogboek` ADD  `".$_POST['naam']."` TINYINT(1) NOT NULL";
			} elseif ($_POST['type'] == 'cijfer')
			{
				$query_text1 = "ALTER TABLE  `".$table_prefix."slaaplogboek` ADD  `".$_POST['naam']."` INT(11) NOT NULL";
			} else {
			// default mediumtext voor tekst
				$query_text1 = "ALTER TABLE  `".$table_prefix."slaaplogboek` ADD  `".$_POST['naam']."` MEDIUMTEXT NOT NULL";
			}
			$query_text = "INSERT INTO ".$table_prefix."slaaplogboek_velden (volgorde, naam, beschrijving, vraag, waarde, type, hoofdstuk, gemiddelde) VALUES ('";
		}
		$query_text .= $_POST['volgorde'];
		$query_text .= "', '" . $_POST['naam'];
		$query_text .= "', '" . $_POST['beschrijving'];
		$query_text .= "', '" . $_POST['vraag'];
		$query_text .= "', '" . $_POST['waarde'];
		$query_text .= "', '" . $_POST['type'];
		$query_text .= "', '" . $_POST['hoofdstuk'];
		$query_text .= "', '" . $_POST['gemiddelde'];
		$query_text .= "')";
		
		// Voeg vraag toe aan velden
		if (!mysqli_query($DBH,$query_text))
		  {
		  echo $query_text;
		  die('Error: ' . mysqli_error());
		  }
		// Voeg kolom toe als die er nog niet was
		if (!mysqli_query($DBH,$query_text1) AND $values == False)
		  {
		  echo $query_text1;
		  die('Error: ' . mysqli_error());
		  }
		$link = "location:vragenoverzicht.php";
		header($link);
	}
} elseif ($page == 'vragenlijst') {
    // Vragen voor vragenlijst toevoegen (door admin)
    $lijstnummer = $_SESSION['lijstnummer'];
    $type = $_SESSION['type'];
    
	if ($admin == True)
	{
	    // EMPTY FIELD CHECK
		if( (empty($_POST['vraag'])) )
		{
			echo '<script>alert("Vul tenminste in: vraag.");</script>';
			echo '<script>history.back(1);</script>';
			exit;
		}
		if( (empty($_POST['volgorde'])) )
		{
			$_POST['volgorde'] = $_SESSION['aantal_vragen'];
		}
			
		$query_text = '';
		if ($type == 'invulvelden')
		{
		    if ($values == True)
            {
                $query_text = "REPLACE INTO ".$table_prefix."slaaplogboek_vragenlijst_vragen (ID, naam, volgorde, lijstnummer, vraag";
                $query_text .= ") VALUES ('";
                $query_text .= $_POST['vraagID'] . "', '";
            } else {
                // voeg eerst een kolom toe aan vragenlijst database
                $query_text1 = "ALTER TABLE  `".$table_prefix."slaaplogboek_vragenlijst_invulvelden` ADD `".$_POST['naam']."` text NOT NULL";
                $query_text = "INSERT INTO ".$table_prefix."slaaplogboek_vragenlijst_vragen (naam, volgorde, lijstnummer, vraag) VALUES ('";
            }
		} else {
            if ($values == True)
            {
                $query_text = "REPLACE INTO ".$table_prefix."slaaplogboek_vragenlijst_vragen (ID, naam, volgorde, lijstnummer, vraag";
                $query_text .= ") VALUES ('";
                $query_text .= $_POST['vraagID'] . "', '";
            } else {
                // voeg eerst een kolom toe aan vragenlijst database
                $query_text1 = "ALTER TABLE  `".$table_prefix."slaaplogboek_vragenlijst` ADD `".$_POST['naam']."` INT(11) NOT NULL";
                $query_text = "INSERT INTO ".$table_prefix."slaaplogboek_vragenlijst_vragen (naam, volgorde, lijstnummer, vraag) VALUES ('";
            }
        }
		$query_text .= $_POST['naam'];
		$query_text .= "', '" . $_POST['volgorde'];
		$query_text .= "', '" . $_POST['lijstnummer'];
		$query_text .= "', '" . $_POST['vraag'];
		$query_text .= "')";
		
		// Voeg vraag toe aan velden
		if (!mysqli_query($DBH,$query_text))
		  {
		  echo $query_text;
		  die('Error: ' . mysqli_error());
		  }
		// Voeg kolom toe als die er nog niet was
		if (!mysqli_query($DBH,$query_text1) AND $values == False)
		  {
		  echo $query_text1;
		  die('Error: ' . mysqli_error());
		  }
		$link = "location:vragenlijst_overzicht.php?lijstnummer=" . $lijstnummer;
		header($link);
	}
} else if($page == 'vragenlijst_invullen') {
    // Vragenlijst invullen (door gebruiker)
    $lijstnummer = $_SESSION['lijstnummer'];
    $userID = $_SESSION['myID'];
    $hkey = $_POST['hkey'];
    $type = $_SESSION['type'];
	
    // get vragen
    $sql = "SELECT naam FROM ".$table_prefix."slaaplogboek_vragenlijst_vragen WHERE lijstnummer = " . $lijstnummer . " ORDER BY volgorde ASC";
	$result=mysqli_query($DBH,$sql);
	
    if (($values == True) && ($type != 'invulvelden'))
    {
        if($type == 'invulvelden') {
            $query_text = "INSERT INTO ".$table_prefix."slaaplogboek_vragenlijst_invulvelden (userID, toegevoegd";
        } else {
            $query_text = "UPDATE ".$table_prefix."slaaplogboek_vragenlijst SET toegevoegd = NOW()";
        }
        while($row = mysqli_fetch_assoc($result))
        {
            $query_text .= ', ';
            
            $query_text .= $row['naam'];
            $query_text .= $hkey;
            $query_text .= " = '";
            
            // field value
            $value = mysqli_real_escape_string($DBH, $_POST[$row['naam']]);
            
            // if empty, set to 0
            if ($value == '') {
                $value = '0';
            }
            $query_text .= $value;
            $query_text .= "'";
        }
        if (!empty($_POST['opmerkingen']))
        {
            $query_text .= ", opmerkingen";
            $query_text .= $hkey;
            $query_text .= " = '";
            $value = mysqli_real_escape_string($DBH, $_POST['opmerkingen']);
            $query_text .= $value;
            $query_text .= "'";
        }
        
        $query_text .= " WHERE userID = '";
        $query_text .= $userID;
        $query_text .= "'";        
    } else {
        if($type == 'invulvelden') {
            $query_text = "INSERT INTO ".$table_prefix."slaaplogboek_vragenlijst_invulvelden (userID, toegevoegd";
        } else {
            $query_text = "INSERT INTO ".$table_prefix."slaaplogboek_vragenlijst (userID, toegevoegd";
        }
        while($row = mysqli_fetch_assoc($result))
        {
            $query_text .= ', ';
            $query_text .= $row['naam'];
            $query_text .= $hkey;
        }
    
        $query_text .= ") VALUES ('";
        $query_text .= $userID . "', NOW()";
    
        // get _POST values
        $result = mysqli_query($DBH,$sql);
        while($row = mysqli_fetch_assoc($result))
        {
            $query_text .= ", '";
            // field value
            $value = mysqli_real_escape_string($DBH, $_POST[$row['naam']]);
            // if empty, set to 0
            if ($value == '') {
                $value = '0';
            }
            $query_text .= $value;
            $query_text .= "'";
        }
    
        $query_text .= ")";
    }
	//echo $query_text;
	
	if (!mysqli_query($DBH,$query_text))
	{
        echo $query_text;
        die('Error: ' . mysqli_error());
	}
	$link = "location:vragenlijst_invullen.php?lijstnummer=" . $lijstnummer . "&hoofdstuk=" . $hoofdstuk . "&user_id=" . $userID;
	//echo $query_text;
	//header($link); Fix van punt #14
	header('Location:index.php');
    
} else {
	// Dag slaaplogboek
	$myID = $_SESSION['myID'];
	$datum = $_SESSION['datum'];
	$datum_string = strftime("%Y-%m-%d", $datum);
	
	$sql = "SELECT naam, vraag, waarde, type FROM ".$table_prefix."slaaplogboek_velden ORDER BY volgorde ASC";
	$result=mysqli_query($DBH,$sql);
	
	if ($values == TRUE) {
		$query_text = "REPLACE INTO ".$table_prefix."slaaplogboek (ID, userID, datum, toegevoegd";
	} else {
		$query_text = "INSERT INTO ".$table_prefix."slaaplogboek (userID, datum, toegevoegd";
	}
	
	while($row = mysqli_fetch_assoc($result))
	{
		$query_text .= ', ';
		$query_text .= $row['naam'];
	}
	
	$query_text .= ") VALUES ('";
	if ($values == TRUE) {
		// add extra field ID if entry already exists
		$query_text .= $_POST['id'] . "', '";
	}
	$query_text .= $myID . "', '" . $datum_string . "', NOW()";
	$result = mysqli_query($DBH,$sql);
	while($row = mysqli_fetch_assoc($result))
	{
		$type = $row['type'];
		$query_text .= ", '";
		// field value
		$value = mysqli_real_escape_string($DBH, $_POST[$row['naam']]);
		// if empty, set to -1
		if ($value == '' AND ($type == 'ja' OR $type == 'nee' OR $type == 'cijfer')) {
			$value = '-1';
		}
		// tijdlijn
		if ($type == 'tijdlijn')
		{
            $slaaptijd = '';
            for($h = 1; $h <=24; $h++) {
                for($k = 1; $k <=4; $k++) {
                    $tag = $row['naam'] . $h . $k;
                    if (isset($_POST[$tag])) {
                        $slaaptijd = $slaaptijd . $_POST[$tag];
                    } else {
                        //echo $tag;
                        $slaaptijd = $slaaptijd . '0';
                    }
                }
            }
            $value = mysqli_real_escape_string($DBH, $slaaptijd);
        }
		
		$query_text .= $value;
		$query_text .= "'";
	}
	
	$query_text .= ")";
	//echo $query_text;
	
	if (!mysqli_query($DBH,$query_text))
	  {
	  die('Error: ' . mysqli_error());
	  }
	$link = "location:index.php?datum=" . $datum;
	//echo $query_text;
	//print_r($_POST);
	header($link);
}

?>