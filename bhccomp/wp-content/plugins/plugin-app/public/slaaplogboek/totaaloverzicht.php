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
$datum = $_REQUEST["datum"];
$myID = $_SESSION['myID'];
$admin = $_SESSION['admin'];
if ($admin != True)
{
    $user_id = $myID;
}

if ($datum == '')
{
    $datum = time();
}
echo "<div class='datumtitel' id='datumtitel'>Alle weken</div><br /><br />";
echo "<div class='links' id='links'>";
if($user_id == $myID) {
    echo "<a href='dag_toevoegen.php'>Vandaag</a> | ";
}
echo "<a href='index.php" . "?user_id=" . $user_id . "'>Deze week</a> | <a href='index.php?totaaloverzicht=1?user_id=" . $user_id . "'>Alle weken</a><br /><br />";   
echo "</div>";
//Overzichtstabel

$sql = "SELECT naam, beschrijving, type FROM ".$table_prefix."slaaplogboek_velden WHERE `gemiddelde` = 1 AND (`type` = CONVERT( _utf8 'ja' USING latin1 ) OR `type` = CONVERT( _utf8 'nee' USING latin1)) ORDER BY volgorde ASC";
$result=mysqli_query($DBH,$sql);

//Get info from database
$query_text = "SELECT * FROM ".$table_prefix."slaaplogboek WHERE userID = '";
$query_text .= $user_id;
$query_text .= "'";
$result_values=mysqli_query($DBH,$query_text);
$row_values = mysqli_fetch_assoc($result_values);

if($row_values!=null) {
    echo '<table style="border:1px solid black">';
    echo '<tr>';
    echo '<td></td>';
    echo '<td><b>Aandachtspunten:</b></td>';
    echo '<td><b>Slaapefficiency</b></td>';
    echo '<td><b>Cijfer slaap</b></td>';
    echo '<td><b>Cijfer energie</b></td>';
    echo '</tr>';
} else {
    echo 'Je hebt nog geen dagen in het logboek ingevuld. Begin door <a href="dag_toevoegen.php">hier</a> het logboek voor vandaag in te vullen.';
}

while($row = mysqli_fetch_assoc($result))
{
    //Get info from database
    $query_text = "SELECT * FROM ".$table_prefix."slaaplogboek WHERE userID = '";
    $query_text .= $user_id;
    $query_text .= "'";
    $result_values=mysqli_query($DBH,$query_text);
    $aantal_totaal = mysqli_num_rows($result_values);
    $se_sum_goed = 0;
    $cijfer_nacht_sum_goed = 0;
    $cijfer_dag_sum_goed = 0;
    $aantal_goed = 0;
    $se_sum_slecht= 0;
    $cijfer_nacht_sum_slecht = 0;
    $cijfer_dag_sum_slecht = 0;
    $aantal_slecht = 0;
    
    while($row_values = mysqli_fetch_assoc($result_values))
    {
        // tel aantal uur in bed en slapend
        $inbed = (substr_count($row_values['Slaaptijd'], '1')+substr_count($row_values['Slaaptijd'], '2'))/4.0;
        $slapend = (substr_count($row_values['Slaaptijd'], '2'))/4;
        if($inbed == 0){
            $inbed = 1;
        }
        $se = round(($slapend/$inbed) * 100);
        $cijfer_nacht = $row_values['Cijfer_nacht'];
        $cijfer_dag = $row_values['Cijfer_dag'];
    
        // tel aantal vragen goed of fout
        if(($row_values[$row['naam']] == 1 and $row['type'] == 'ja') or ($row_values[$row['naam']] == 0 and $row['type'] == 'nee')){
            $se_sum_goed = $se_sum_goed + $se;
            $cijfer_nacht_sum_goed = $cijfer_nacht_sum_goed + $cijfer_nacht;
            $cijfer_dag_sum_goed = $cijfer_dag_sum_goed + $cijfer_dag;
            $aantal_goed = $aantal_goed + 1;
        } elseif(($row_values[$row['naam']] == 1 and $row['type'] == 'nee') or ($row_values[$row['naam']] == 0 and $row['type'] == 'ja')) {
            $se_sum_slecht= $se_sum_slecht + $se;
            $cijfer_nacht_sum_slecht = $cijfer_nacht_sum_slecht + $cijfer_nacht;
            $cijfer_dag_sum_slecht = $cijfer_dag_sum_slecht + $cijfer_dag;
            $aantal_slecht = $aantal_slecht + 1;
        }
    }
    //goed
    if($aantal_goed > 0){
        echo "<tr>";
        echo "<td><img src='check.png' width=20></td>";
        echo "<td>";
        echo $row['beschrijving'];
        echo ": ";
        echo $row['type'];
        echo "</td>";
        echo "<td>";
        echo round($se_sum_goed/$aantal_goed);
        echo "%</td>";
        echo "<td>";
        echo round($cijfer_nacht_sum_goed/$aantal_goed);
        echo "</td>";
        echo "<td>";
        echo round($cijfer_dag_sum_goed/$aantal_goed);
        echo "</td></tr>";
    }

    //fout
    if($aantal_slecht > 0){
        echo "<tr>";
        echo "<td><img src='cross.png' width=20></td>";
        echo "<td>";
        echo $row['beschrijving'];
        echo ": ";
        if ($row['type'] == 'ja') {
            echo 'nee';
        } else {
            echo 'ja';
        }
        echo "</td>";
        echo "<td>";
        echo round($se_sum_slecht/$aantal_slecht);
        echo "%</td>";
        echo "<td>";
        echo round($cijfer_nacht_sum_slecht/$aantal_slecht);
        echo "</td>";
        echo "<td>";
        echo round($cijfer_dag_sum_slecht/$aantal_slecht);
        echo "</td></tr>";
    }
}
echo "</table>";

// Detail overzicht

// Eerste datum die is ingevuld
$query_text = "SELECT datum FROM ".$table_prefix."slaaplogboek WHERE userID = '";
$query_text .= $user_id . "' ORDER BY datum ASC";
$result=mysqli_query($DBH,$query_text);
$row = mysqli_fetch_array($result);
$datum_start = strtotime($row['datum']);
$weeknummer_start = strftime("%W",$datum_start);
$jaar_start = strftime("%G", $datum_start);

// Laatste datum die is ingevuld
$query_text = "SELECT datum FROM ".$table_prefix."slaaplogboek WHERE userID = '";
$query_text .= $user_id . "' ORDER BY datum DESC";
$result=mysqli_query($DBH,$query_text);
$row = mysqli_fetch_array($result);
$datum_eind = strtotime($row['datum']);
$weeknummer_eind = strftime("%W",$datum_eind);
$jaar_eind = strftime("%G", $datum_eind);

// Fix bug if stuff is entered in the previous year
if ($jaar_eind > $jaar_start) {
	$weeknummer_start = $weeknummer_start - 52;
	$weeknummer_eind = 1+$weeknummer_eind + (($jaar_eind - $jaar_start) - 1) * 52;
}
if($datum_start!=null) {

    $curmo = strftime('%m', $datum_start);
    echo "<br><br><span id='motitel' class='motitel'>";
    echo ucwords(strftime('%h %Y', $datum_start));
    echo "</span>";
    for ($weeknr = 1; $weeknr <= (1+$weeknummer_eind-$weeknummer_start); $weeknr++)
    {
        $datum = $datum_start + ($weeknr-1)*7*60*60*24;
        $dagnummer = strftime("%u",$datum);
        $maandag = $datum - ($dagnummer-1) *60*60*24;
        $zondag = $datum + (7-$dagnummer) *60*60*24;
        $datum_string1 = date('Y-m-d',$maandag);
        $datum_string2 = date('Y-m-d',$zondag);
        $query_text = "SELECT * FROM ".$table_prefix."slaaplogboek WHERE userID = '";
        $query_text .= $user_id;
        $query_text .= "' AND datum >= '";
        $query_text .= $datum_string1;
        $query_text .= "' AND datum <= '";
        //$query_text .= $datum_string2 . "'";
		$query_text .= $datum_string2 . "' GROUP BY datum";
        $result_values=mysqli_query($DBH,$query_text);
        $aantal = mysqli_num_rows($result_values);

        if ($curmo != strftime('%m', $datum)) {
        $curmo = strftime('%m', $datum);
        echo "<br><br><span id='motitel' class='motitel'>";
        echo ucwords(strftime('%h %Y', $maandag));
        echo "</span>";
        }
        echo "<br><hr><b>Week " . $weeknr;
        echo ", <a href='index.php?datum=" . $datum . "&user_id=" . $user_id . "'>" . strftime('%-e %b', $maandag) . " - " . strftime('%-e %b %Y', $zondag) . ".</b>";
        echo "</a>";
        if($aantal != 0) {
            echo "<br>Aantal dagen ingevuld: " . $aantal . "<br />";

            // haal de velden op
            $sql = "SELECT naam, beschrijving, type FROM ".$table_prefix."slaaplogboek_velden WHERE `gemiddelde` = 1 AND `type` != CONVERT( _utf8 'ja' USING latin1 ) AND `type` != CONVERT( _utf8 'nee' USING latin1) ORDER BY volgorde ASC";
            $result=mysqli_query($DBH,$sql);
            while($row = mysqli_fetch_assoc($result))
            {
                if ($row['type'] == 'tijdlijn') {
                    $inbed_sum = 0;
                    $slapend_sum = 0;
                    $inbed = 0;
                    $slapend = 0;
                    $checked = 0;
                    while($row_values = mysqli_fetch_assoc($result_values))
                    {
                        $inbed = substr_count($row_values[$row['naam']], '1')+substr_count($row_values[$row['naam']], '2');
                        $slapend = substr_count($row_values[$row['naam']], '2');
                        //$i = 0;
                        //for($h = 1; $h <=24; $h++) {
                        //	for($k = 1; $k <=4; $k++) {
                        //		$checked = substr($row_values[$row['naam']],$i,1);
                        //		$i++;
                        //		if ($checked == '1') {
                        //			$inbed++;
                        //		} elseif ($checked == '2') {
                        //			$inbed++;
                        //			$slapend++;
                        //		}
                        //	}
                        //}
                        $inbed = $inbed/4.0;
                        $slapend = $slapend/4.0;
                        $inbed_sum = $inbed_sum + $inbed;
                        $slapend_sum = $slapend_sum + $slapend;
                    }
                    echo "Gemiddeld <span class='uur' id='uur'>";
                    echo round($inbed_sum/$aantal,2);
                    echo "</span> uur in bed, ";
                    echo "<span class='slapenduur' id='slapenduur'>";
                    echo round($slapend_sum/$aantal,2);
                    echo "</span> uur slapend";
					
                    //echo "<span class='wakkeruur' id='wakkeruur'>";
                    //echo round($inbed_sum/$aantal) - round($slapend_sum/$aantal);
                    //echo "</span> uur wakker in bed";
                    if ($inbed_sum == 0) {
                            $inbed_sum = 1;
                        }
                    $se = round(($slapend_sum/$inbed_sum) * 100,0);
                    echo '<br />Slaap efficiency: ' . $se . '%';
                }
                elseif ($row['type'] == 'cijfer') {
                    $cijfer_sum = 0;
                    $result_values=mysqli_query($DBH,$query_text);
                    $tot = 0;
                    while($row_values = mysqli_fetch_assoc($result_values))
                    {
                        $cijfer = $row_values[$row['naam']];
                        if ($cijfer != '-1'){
                            $cijfer_sum = $cijfer_sum + $cijfer;
                            $tot = $tot + 1;
                        }
                    }
                    echo "<br />Gemiddelde " . $row['beschrijving'] . " : ";
                    if ($tot > 0) {
                        echo round($cijfer_sum/$tot, 1);
                    } else {
                        echo '-';
                        }
                }
            }
        }
    }
}
?>