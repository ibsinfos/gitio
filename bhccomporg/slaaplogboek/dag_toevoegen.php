<?php
//Include database connection details
require_once('config.php');
// Authenticate page
require_once('auth.php');

/*
We need to include the config file
to make use of the database.
*/
include_once("../wp-config.php");

$myID = $_SESSION['myID'];
$user_id = $myID;

$sql="SELECT * FROM ".$table_prefix."users WHERE ID='$myID'";
$result=mysqli_query($DBH,$sql);
$row = mysqli_fetch_assoc($result);

$my_user_name = $row['display_name'];
?>

<html>
<head>
<script type='text/javascript' src='lib/xgetelementbyid.js'></script>
<script type='text/javascript' src='lib/xtableiterate.js'></script>
<script type='text/javascript' src='lib/xpreventdefault.js'></script>
<script type='text/javascript' src='lib/inkleuren.js'></script>
<link rel="stylesheet" type="text/css" href="timeline.css" />
<script type="text/javascript">
	function show_validation(naam, bool) {
		if (bool) {
			document.getElementById(naam+"_image").src='check.png';
		} else {
			document.getElementById(naam+"_image").src='cross.png';
		}
		document.getElementById(naam+"_image").width='20';
	}
</script>
</head>
<body>
<center><div class='logboekcontainer' id='logboekcontainer' style='width:800px;'>
<?php
echo "<div style='text-align:right;'>";
echo "Hallo, " . $my_user_name . "! | ";
echo "<a href='logout.php'>Log uit</a> <BR>";
echo "</div>";
?>
<div class='logboektitel' id='logboektitel'>Logboek</div>
<?php
$datum = $_REQUEST["datum"];
if ($datum == '')
    {
        $datum = time();
    }
$_SESSION['datum'] = $datum;
$_SESSION['page'] = 'dag';
$myID = $_SESSION['myID'];

// huidige waarden in het logboek
$datum_string = date('Y-m-d',$datum);
$query_text = "SELECT * FROM ".$table_prefix."slaaplogboek WHERE userID = '";
$query_text .= $myID;
$query_text .= "' AND datum = '";
$query_text .= $datum_string;
$query_text .= "'";
$result_values=mysqli_query($DBH,$query_text);
$values = True;
$row_values = mysqli_fetch_assoc($result_values);
if (count($row_values) == 1)
{
    $values = False;
}
$_SESSION['values'] = $values;

$datum_string = strftime("%a %d %B", $datum-60*60*24);
$datum_string2 = strftime("%a %d %B %G", $datum);
$vorige_dag = $datum - 60*60*24;
$volgende_dag = $datum + 60*60*24;


//Links

echo "<br><div class='linksdag' id='linksdag'>";
echo "<a href='dag_toevoegen.php?datum=" . $vorige_dag . "'>< vorige dag</a>";

echo "<div class='datumtitel' id='datumtitel'>";
echo $datum_string . " - " . $datum_string2;
echo "</div>";
echo "<a href='dag_toevoegen.php?datum=" . $volgende_dag . "'>volgende dag ></a><br>";
echo "<br>";
echo "<a href='dag_toevoegen.php'>Vandaag</a> | ";
echo "<a href='index.php'>Deze week</a> | ";
echo "<a href='index.php?totaaloverzicht=1'>Alle weken</a>";
echo "</div><br>";


echo "<div id='add-slaaplogboek'>";
echo "<form action='insert.php' method='post'>";
if ($values == True) {
	echo "<input type='hidden' name = 'id' value = '". $row_values['ID'] ."'>";
}
$sql = "SELECT naam, vraag, waarde, type, hoofdstuk FROM ".$table_prefix."slaaplogboek_velden WHERE `type` != CONVERT( _utf8 'ja' USING latin1 ) AND `type` != CONVERT( _utf8 'nee' USING latin1) ORDER BY volgorde ASC";
$result=mysqli_query($DBH,$sql);

while($row = mysqli_fetch_assoc($result))
    {
        echo '<p>	&nbsp; </p>';
        echo '<span>' . $row["vraag"] . '</span>';
        echo '<br />';
        
        if($row['type'] == 'tijdlijn') {
?>
<div>
<a href="#" onclick="javascript:greenOn()"><img src='greenpencil.png' width='50' border='0'></a>
In bed, slapend
<a href="#" onclick="javascript:redOn()"><img src='orangepencil.png' width='50' border='0'></a>
In bed, wakker
<a href="#" onclick="javascript:eraserOn()"><img src='eraser.png' width='50' border='0'></a>
Uit bed
</div>
<div class = "sunmoon">
<img src="sunmoon.png" width=782>
</div>
<P><div class="wakker-in-bed" id="wakker-in-bed">
<table id='table1' cellspacing='0' cellpadding='0'>
  <tr>
    <?php
    $checked = 0;
    $i = 0;
    for($h = 1; $h <=24; $h++) {
        for($k = 1; $k <=4; $k++) {
            $tag = $row['naam'] . $h . $k;
            if ($values == True) {
                $checked = substr($row_values[$row['naam']],$i,1);
            }
            $i++;
            
            echo "      <td>";
            echo "\n";
            echo '          <span class="wakker-in-bed-checkbox">';
            echo "\n";
            echo "          <input name='" . $tag . "' type='checkbox' class='checkbox' value='1'";
            if ($checked == '1') {
                echo ' checked ';
            }
            echo ">";
            echo "\n";
            echo '          <span class="box"><span class="tick"></span></span>';
            echo "\n";
            echo '          </span>';
            echo "\n";
            echo '      </td>';
            echo "\n";
        }
    }
    ?>
  </tr>
</table>
</div>

<div class="slapend" id="slapend">
<table id='table2' cellspacing='0' cellpadding='0'>
  <tr>
    <?php
    $checked = 0;
    $i = 0;
    for($h = 1; $h <=24; $h++) {
        for($k = 1; $k <=4; $k++) {
            $tag = $row['naam'] . $h . $k;
            if ($values == True) {
                $checked = substr($row_values[$row['naam']],$i,1);
            }
            $i++;
            echo "      <td>";
            echo "\n";
            echo '          <span class="slapend-checkbox">';
            echo "\n";
            echo "          <input name='" . $tag . "' type='checkbox' class='checkbox' value='2'";
            if ($checked == '2') {
                echo ' checked ';
            }
            echo ">";
            echo "\n";
            echo '          <span class="box"><span class="tick"></span></span>';
            echo "\n";
            echo '          </span>';
            echo "\n";
            echo '      </td>';
            echo "\n";
        }
    }
    ?>
  </tr>
</table>
</div>

<div class = "labels">
<img src="labels.png" width=781>
</div>

<?php
        }
        
        if($row['type'] == 'cijfer') {
        	if ($values == False) {
        	    $cijfer_value = -1; // If it's a new entry, set the cijfer to -1.
			} else {
				$cijfer_value = $row_values[$row['naam']];
			}
        	$cijfers = array(
        	'-1' => '-',
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
			'6' => '6',
			'7' => '7',
			'8' => '8',
			'9' => '9',
			'10' => '10'
			);
			?>
			<select name="<?php echo $row['naam']?>">
			<?php foreach( $cijfers as $var => $cijfer ): ?>
			<option value="<?php echo $var ?>"<?php if( $var == $cijfer_value ): ?> selected="selected"<?php endif; ?>><?php echo $cijfer ?></option>
			<?php endforeach; ?>
			</select>
        	<?php
            }
        
        if($row['type'] == 'tekst') {
            echo '<label for="' . $row['naam'] . '">' . $row['waarde'] . '</label>';
            if($row['hoofdstuk']>1) {
            echo '<br><i>(vul in vanaf hoofstuk ' . $row['hoofdstuk'] . ')</i>';
            }
            echo '<br>';
            echo '<textarea name="'. $row['naam'] . '" />';
            if ($values == True) {
                echo $row_values[$row['naam']];
            }
            echo '</textarea>';
            }
    }
?>
    
<p>	&nbsp; </p>
<span><b>Heb je gisteren...</b></span>

<?php

$sql = "SELECT naam, vraag, type, hoofdstuk FROM ".$table_prefix."slaaplogboek_velden WHERE `type` = CONVERT( _utf8 'ja' USING latin1 ) OR `type` = CONVERT( _utf8 'nee' USING latin1) ORDER BY volgorde ASC";
$result=mysqli_query($DBH,$sql);

while($row = mysqli_fetch_assoc($result))
    {
    	$type = $row['type'];
        echo '<p>	&nbsp;';
        echo '<span>' . $row['vraag'] . '</span>';
        echo "<img id = '" . $row['naam'] . "_image' src='pixel.gif' width=16>";
        if($row['hoofdstuk']>1) {
            echo '<br><i>(vul in vanaf hoofstuk ' . $row['hoofdstuk'] . ')</i>';
        }
        echo '<br />';
        $ja = False;
        $nee = False;
        if ($values == True) {
                $val = $row_values[$row['naam']];
                if ($val == 1){
                    $ja = True;
                }
                if ($val == 0){
                    $nee = True;
                }
            }
        echo '<input type="radio" name="'. $row['naam'] . '" name="'. $row['naam'] . '" id="'. $row['naam'] . '" value="1"';
        /*if ($ja == True){
            echo ' checked';
        }*/
        if ($type == 'ja') {
        	$bool=True;
        } else {
        	$bool = False;
        }

        $link = "javascript: show_validation('". $row['naam'] ."', '" . $bool ."')";
        echo ' onclick = "' . $link . '"';
        echo '/> Ja<br />';
        echo '<input type="radio" name="'. $row['naam'] . '" name="'. $row['naam'] . '" id="'. $row['naam'] . '" value="0"';
        /*if ($nee == True){
            echo ' checked';
        }*/
        if ($type == 'nee') {
        	$bool = True;
		} else {
        	$bool = False;
        }
        $link = "javascript: show_validation('". $row['naam'] ."', '" . $bool ."')";
        echo ' onclick = "' . $link . '"';
        echo '/> Nee';
    }
?>
<br>
<input type='submit'  value='Opslaan' />

</form>
</div>
</div>
</center>

</body>
</html>