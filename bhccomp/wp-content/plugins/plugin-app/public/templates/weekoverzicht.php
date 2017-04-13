<?php
//Include database connection details
require_once('config.php');
// Authenticate page
require_once('auth.php');
?>
<html>
    <head>
        <script type="text/javascript" src="lib/simpletreemenu.js">
            /***********************************************
             * Simple Tree Menu- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
             * This notice MUST stay intact for legal use
             * Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
             ***********************************************/
        </script>
    </head>
    <body>
        <?php
        $datum = $_REQUEST["datum"];
        $myID = $_SESSION['myID'];
        $admin = $_SESSION['admin'];
        if ($admin != True) {
            $user_id = $myID;
        }

        if ($datum == '') {
            $datum = time();
        }
        $vandaag = date('Y-m-d ', $datum);
        $weeknummer = strftime("%W", $datum);
        $dagnummer = strftime("%u", $datum);
        $dagnaam = strftime("%A", $datum);
        $maandag = $datum - ($dagnummer - 1) * 60 * 60 * 24;
        $zondag = $datum + (7 - $dagnummer) * 60 * 60 * 24;
        $vorige_week = $datum - 60 * 60 * 24 * 7;
        $volgende_week = $datum + 60 * 60 * 24 * 7;

//Links

        echo "<div class='links' id='links'>";
        echo "<a href='index.php?datum=" . $vorige_week . "&user_id=" . $user_id . "'>< vorige week</a>";

        echo "<div class='datumtitel' id='datumtitel'>";
//echo "Slaaplogboek van " . $user_name . " voor week nummer <b>" . $weeknummer . "</b>";
        echo strftime('%-e %B', $maandag) . " - " . strftime('%-e %B %Y', $zondag);
        echo "</div>";
        echo "<a href='index.php?datum=" . $volgende_week . "&user_id=" . $user_id . "'>volgende week ></a></div><br>";
        echo "<br>";
        echo "<div class='links' id='links'>";
        if ($user_id == $myID) {
            echo "<a href='dag_toevoegen.php'>Vandaag</a> | ";
        }
        echo "<a href='index.php&user_id=" . $user_id . "'>Deze week</a> | ";
        echo "<a href='index.php?totaaloverzicht=1" . "&user_id=" . $user_id . "'>Alle weken</a>";
        echo "<br>";
        ?>
        <a href="javascript:ddtreemenu.flatten('detailpanel', 'expand')">Bekijk </a>/<a href="javascript:ddtreemenu.flatten('detailpanel', 'contact')">Verberg</a> details
    </div>
    </br>

<?php
// start logboek

$datum_string1 = date('Y-m-d', $maandag);
$datum_string2 = date('Y-m-d', $zondag);

$query_text = "SELECT * FROM " . $table_prefix . "slaaplogboek WHERE userID = '";
$query_text .= $user_id;
$query_text .= "' AND datum >= '";
$query_text .= $datum_string1;
$query_text .= "' AND datum <= '";
$query_text .= $datum_string2 . "'";

//$result=mysqli_query($DBH,$query_text);
//$aantal = mysqli_num_rows($result);
//echo "Je hebt deze week " . $aantal . " van de 7 dagen ingevuld. <br />";

echo "<ul id='detailpanel' style='list-style-type: none;'>";

for ($dagnr = 1; $dagnr <= 7; $dagnr++) {

    // print de titel van de nacht (b.v. 'zondag op maandag')

    $nacht = $datum + ($dagnr - $dagnummer - 1) * 60 * 60 * 24;
    $ochtend = $datum + ($dagnr - $dagnummer) * 60 * 60 * 24;
    echo '<hr>';
    echo '<b>';
    if ($user_id == $myID) {
        echo "<li>";
        echo "<a href='dag_toevoegen.php?datum=" . $ochtend . "'>";
    }
    echo "<div class='dagtitel' id='dagtitel'>" . strftime('%a', $nacht) . " - " . strftime('%a', $ochtend) . "</div>";
    if ($user_id == $myID) {
        echo "</a>";
    }
    echo "</b>";
    echo "<br />";

    $datum_string = date('Y-m-d', $ochtend);

    // print de velden in het logboek
    $query_text = "SELECT * FROM " . $table_prefix . "slaaplogboek WHERE userID = '";
    $query_text .= $user_id;
    $query_text .= "' AND datum = '";
    $query_text .= $datum_string;
    $query_text .= "'";

//    $result = mysqli_query($DBH, $query_text);
    $row_values = $wpdb->get_results($query_text);
//    $row_values = mysqli_fetch_assoc($result);
    if (count($row_values) == 1) {
        if ($user_id == $myID) {
            echo "Vul <a href='dag_toevoegen.php?datum=" . $ochtend . "'>hier</a> je gegevens in. <br />";
        } else {
            echo "<i>Geen gegevens ingevuld. </i><br />";
        }
    } else {
        //echo "Laatst aangepast: " . $row_values['toegevoegd'] . ". ";
        if ($user_id == $myID) {
            //echo "<a href='dag_toevoegen.php?datum=" . $ochtend . "'>Bewerk</a>";
        }
        echo "<br>";

        $sql = "SELECT naam, beschrijving, type FROM " . $table_prefix . "slaaplogboek_velden WHERE `type` != CONVERT( _utf8 'ja' USING latin1 ) AND `type` != CONVERT( _utf8 'nee' USING latin1) ORDER BY volgorde ASC";
//        $result = mysqli_query($DBH, $sql);
        
        $result = $wpdb->get_results($sql);
//        foreach ($result as $row) {
//            print_r($row->naam);
//        }
        
        // show timeline
        //while ($row = mysqli_fetch_assoc($result)) {
        foreach ($result as $row) {
//            if ($row['type'] == 'tijdlijn') {
            if ($row->type == 'tijdlijn') {
                ?>
                    <div>
                        <img src="sunmoon.png" width=391>
                    </div>
                    <div class="tijdlijnview" id="tijdlijnview">
                        <table id='table1' cellspacing='0' cellpadding='0'>
                            <tr>
                    <?php
                    $checked = 0;
                    $i = 0;
                    $inbed = 0;
                    $slapend = 0;
                    for ($h = 1; $h <= 24; $h++) {
                        for ($k = 1; $k <= 4; $k++) {
                            $tag = $h . $k;
                            $checked = substr($row_values[$row->naam], $i, 1);
                            $i++;

                            echo "      <td>";
                            echo "\n";
                            echo '          <span class="wakker-in-bed-checkbox">';
                            echo "\n";
                            if ($checked == '1') {
                                $inbed++;
                                echo '          <span class="viewbox" style="background-color:#ff0000"><span class="tick"></span></span>';
                            } elseif ($checked == '2') {
                                $inbed++;
                                $slapend++;
                                echo '          <span class="viewbox" style="background-color:#00ff00"><span class="tick"></span></span>';
                            } else {
                                echo '          <span class="viewbox"><span class="tick"></span></span>';
                            }
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
                        <img src="labels2.png" width=391>
                    </div>
                                <?php
                                if ($inbed == 0) {
                                    $inbed = 0;
                                } //var_dump($inbed/4);die();
                                // Samenvatting
                                echo "<span class='uur' id='uur'>" . $inbed / 4 . "</span> uur in bed, ";
                                echo "<span class='slapenduur' id='slapenduur'>" . $slapend / 4 . "</span> uur slapend";
                                if ($admin == True) {
                                    echo ", ";
                                    echo "<span class='wakkeruur' id='wakkeruur'>" . ($inbed / 4 - $slapend / 4) . "</span> uur wakker in bed<br>";
                                }
                                echo "</li>";

                                // overzicht data tijdlijn

                                if ($user_id == $myID) {
                                    echo "<a href='dag_toevoegen.php?datum=" . $ochtend . "'>Bewerk</a> | ";
                                }
                                echo '<li style="display:inline"><b><a href="#" onClick="return false;">Meer...</a></b>';
                                echo '<ul>';
                                echo '<li>Aantal uren in bed: ' . $inbed / 4 . '</li>';
                                //echo '<br />';
                                echo '<li>Aantal uren slapend: ' . $slapend / 4 . '</li>';
                                //echo '<br />';
                                if($inbed == 0){ $inbed = 1;}
                                $se = round(($slapend / $inbed) * 100);
                                echo '<li>Slaap efficiency: ' . $se . '%' . '</li>';
                                //echo '<br />';
//                            } else if ($row['type'] == 'cijfer') {
                            } else if ($row->type == 'cijfer') {
                                // cijfers
                                $cijfer_value = $row_values[$row->naam];
                                echo '<li>';
                                echo $row->beschrijving;
                                echo ': ';
                                if ($cijfer_value > 0) {
                                    echo $cijfer_value;
                                } else {
                                    echo '-';
                                }
                                echo '</li>';
                            } else {
                                // overige data (geen ja of nee vragen)
                                echo '<li>';
                                echo $row->beschrijving;
                                echo ': ';
                                echo $row_values[$row->naam];
                                echo '</li>';
                                //echo '<br />';
                            }
                        }

                        $sql = "SELECT naam, beschrijving, type FROM " . $table_prefix . "slaaplogboek_velden WHERE `type` = CONVERT( _utf8 'ja' USING latin1 ) OR `type` = CONVERT( _utf8 'nee' USING latin1) ORDER BY volgorde ASC";
                        //$result = mysqli_query($DBH, $sql);
                        $result = $wpdb->get_results($sql);
//                        while ($row = mysqli_fetch_assoc($result)) {
                        foreach($result as $row){
                            echo '<li>';
                            echo $row->beschrijving;
                            echo ': ';
                            $type = $row->type;
                            if ($row_values[$row->naam] == 1) {
                                echo "Ja";
                                if ($type == 'ja') {
                                    echo "<img src='check.png' width=20>";
                                } else {
                                    echo "<img src='cross.png' width=20>";
                                }
                            } elseif ($row_values[$row->naam] == 0) {
                                echo "Nee";
                                if ($type == 'nee') {
                                    echo "<img src='check.png' width=20>";
                                } else {
                                    echo "<img src='cross.png' width=20>";
                                }
                            } else {
                                echo "<i>Niet ingevuld</i>";
                            }
                            echo '</li>';
                            //echo '<br />';
                        }
                        echo '</ul></li>';
                    }
                }
                echo '</ul>';
                echo "<br />";
                echo "<center><a href='index.php?datum=" . $vorige_week . "&user_id=" . $user_id . "'>< vorige week </a> &nbsp;&nbsp; | &nbsp; &nbsp; <a href='index.php?datum=" . $volgende_week . "&user_id=" . $user_id . "'>volgende week ></a></center>";
                ?>
    <script type="text/javascript">

    //ddtreemenu.createTree(treeid, enablepersist, opt_persist_in_days (default is 1))

        ddtreemenu.createTree("detailpanel", false)
        ddtreemenu.flatten('detailpanel', 'contact')
    </script>
</body>
</html>