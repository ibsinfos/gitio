<?php
/*
* Template Name: Free Visa Assessment
*
*
*http://twistfox.dev/free-assessment/
*/
    get_header();


    if ($_REQUEST['destinationcountry'] == "") {
      //wp_redirect( 'http://global-migrate.ae/?page_id=811' ); exit;
        wp_redirect( site_url() ); exit;
    }


?>
<style type="text/css">
    .sentmassage {
    color: red;
    font-size: 18px;
    left: 62%;
    position: absolute;
    top: 330px;
    z-index: 2147483647;
}

@media only screen and (max-width: 520px) and (min-width: 305px)
{
    .form-group
    {
      margin-bottom: 4px;
    }
  
}

@media only screen and (max-width: 2500px) and (min-width: 1025px){
    .form-group {
    float: left;
    margin-left: 30px;
    width: 40%;
    margin-bottom: 15px;
}
}
form label {
    font-weight: normal;
    width: 100%;
}


</style>
 <?php
 
                if(isset($_GET['massage'])){

                echo "<span class='sentmassage'>Your Message Has Been Sent.</span>";
                }
                else{

                }
              
            ?>


<div class="container">
        <form id="freeassessment" method="post" action="<?php bloginfo('stylesheet_directory'); ?>/form-con-db.php" enctype="multipart/form-data" onsubmit="return checkForm(this);">
        <input type="hidden" name="" value="<?php echo $_REQUEST['destinationcountry'];?>">
        <input type="hidden" name="" value="<?php echo $_REQUEST['residingcountry'];?>">
        <h3>Personal Information</h3>
        <fieldset>
          <legend>Personal Information</legend>
          
           <div class="form-group">
               <label for="whyvisa">What kind of visa do you require ? *</label>
               
               <select name="whyvisa" id="personaldetails-whyvisa" class="form-control required" aria-required="true">
                   <option selected="selected" label="Please make a selection" value="">Please make a selection</option>                       
                   <option value="Work-and-live" label="Work and live">Work and live</option>
                   <option value="Live-with-family" label="Live with family">Live with family</option>
                   <option value="Study" label="Study">Study</option>
                   <option value="Business-or-investment" label="Business or investment">Business or investment</option>
                   <option value="Visit" label="Visit">Visit</option>
               </select>
           </div>
           <div class="form-group">
              <label for="inputName2">Type of visa you require* </label>
              
              <?php
                if ($_REQUEST['destinationcountry'] == "Canada") {
              ?>
              <select name="visatype" id="visatype" class="form-control  required" aria-required="true">
                   <option selected="selected" label="Please make a selection" value="">Please make a selection</option>
              
                   <option value="42">Canada Family Class Visa</option>
                   <option value="43">Canada Spouse Visa</option>
                   <option value="45">Canada Study Visa</option>
                   <option value="46">Canada Tourist Visa</option>
                   <option value="41">Canada UnMarried Visa</option>
                   <option value="35">Canada Work Permit</option>
                   <option value="124">Career Solutions Services - Canada</option>
                   <option value="39">Express Entry Class</option>
                   <option value="44">Federal Skilled Trade</option>
                   <option value="36">Federal Skilled Worker Visa</option>
                   <option value="40">Nova Scotia Skilled Migration</option>
                   <option value="37">Quebec Skilled Worker Visa</option>
                   <option value="38">Working Holiday Visa</option>                                      
              </select>
               <?php
                }elseif ($_REQUEST['destinationcountry'] == "usa") {
              ?>
              <select name="visatype" id="visatype" class="form-control  required" aria-required="true">
                   <option selected="selected" label="Please make a selection" value="">Please make a selection</option>
              
                   <option value="42">Canada Family Class Visa</option>
                   <option value="43">Canada Spouse Visa</option>
                   <option value="45">Canada Study Visa</option>
                   <option value="46">Canada Tourist Visa</option>
                   <option value="41">Canada UnMarried Visa</option>
                   <option value="35">Canada Work Permit</option>
                   <option value="124">Career Solutions Services - Canada</option>
                   <option value="39">Express Entry Class</option>
                   <option value="44">Federal Skilled Trade</option>
                   <option value="36">Federal Skilled Worker Visa</option>
                   <option value="40">Nova Scotia Skilled Migration</option>
                   <option value="37">Quebec Skilled Worker Visa</option>
                   <option value="38">Working Holiday Visa</option>                                      
              </select>
              <?php
                }elseif ($_REQUEST['destinationcountry'] == "newzealand") {
              ?>
              <select name="visatype" id="visatype" class="form-control  required" aria-required="true">
                   <option selected="selected" label="Please make a selection" value="">Please make a selection</option>
              
                   <option value="42">Canada Family Class Visa</option>
                   <option value="43">Canada Spouse Visa</option>
                   <option value="45">Canada Study Visa</option>
                   <option value="46">Canada Tourist Visa</option>
                   <option value="41">Canada UnMarried Visa</option>
                   <option value="35">Canada Work Permit</option>
                   <option value="124">Career Solutions Services - Canada</option>
                   <option value="39">Express Entry Class</option>
                   <option value="44">Federal Skilled Trade</option>
                   <option value="36">Federal Skilled Worker Visa</option>
                   <option value="40">Nova Scotia Skilled Migration</option>
                   <option value="37">Quebec Skilled Worker Visa</option>
                   <option value="38">Working Holiday Visa</option>                                      
              </select>
              <?php
                }elseif ($_REQUEST['destinationcountry'] == "United Kingdom") {
              ?>
              <select id="personaldetails-visatype" name="visatype" class="form-control  required" aria-required="true">
                <option selected="selected" label="Please make a selection" value="">Please make a selection</option>
               
                <option class="text" value="82">Ancestry Visa</option>
                <option class="text" value="120">BR1 - Bulgarian and Romanian Nationals</option>
                <option class="text" value="121">BR2 - Bulgarian and Romanian Nationals</option>
                <option class="text" value="242">Certificate of Sponsorship</option>
                <option class="text" value="241">Child Registeration</option>
                <option class="text" value="239">Consultation</option>
                <option class="text" value="94">Creative &amp; Sporting Workers</option>
                <option class="text" value="83">Defacto Visa</option>
                <option class="text" value="119">Dependant Visa</option>
                <option class="text" value="102">ECAA Visa</option>
                <option class="text" value="106">EEA Resident Permit</option>
                <option class="text" value="105">Entry Clearance</option>
                <option class="text" value="81">Fiance Visa</option>
                <option class="text" value="103">HSMP</option>
                <option class="text" value="111">HSMP - ILR</option>
                <option class="text" value="100">Indefinite Leave to Remain</option>
                <option class="text" value="107">Long Term Residency Visa</option>
                <option class="text" value="115">Marriage - ILR</option>
                <option class="text" value="80">Marriage Visa</option>
                <option class="text" value="101">Naturalisation</option>
                <option class="text" value="92">PBS Sponsorship License</option>
                <option class="text" value="96">Prospective Entrepreneur Visa</option>
                <option class="text" value="116">Tier 1 - Dependant Visa</option>
                <option class="text" value="85">Tier 1 - Entrepreneur Visa</option>
                <option class="text" value="86">Tier 1 - Exceptional Talent Visa</option>
                <option class="text" value="87">Tier 1 - General</option>
                <option class="text" value="226">Tier 1 - Graduate Entrepreneur Visa</option>
                <option class="text" value="112">Tier 1 - ILR</option>
                <option class="text" value="88">Tier 1 - Investor</option>
                <option class="text" value="84">Tier 1 - Post Study Work Visa</option>
                <option class="text" value="90">Tier 2 - Change of Employment</option>
                <option class="text" value="117">Tier 2 - Dependant Visa</option>
                <option class="text" value="89">Tier 2 - General Work Permit</option>
                <option class="text" value="113">Tier 2 - ILR</option>
                <option class="text" value="91">Tier 2 - Intra Company Transfer</option>
                <option class="text" value="227">Tier 2 - Minister of Religion </option>
                <option class="text" value="118">Tier 4 - Dependant Visa</option>
                <option class="text" value="93">Tier 4 - Student Visa</option>
                <option class="text" value="97">Tourist Visa</option>
                <option class="text" value="110">UK Au Pair Visa</option>
                <option class="text" value="99">UK NTL or TOC</option>
                <option class="text" value="108">UK Right of Abode</option>
                <option class="text" value="109">UK Visa Extension</option>
                <option class="text" value="104">UK Working Holiday Maker</option>
                <option class="text" value="114">Work Permit - ILR</option>
                <option class="text" value="95">Youth Mobility Scheme (YMS)</option>
              </select>
              <?php
                }elseif ($_REQUEST['destinationcountry'] == "Denmark") {
              ?>
              <select id="personaldetails-visatype" name="visatype" class="form-control  required" aria-required="true">
                  <option selected="selected" label="Please make a selection" value="">Please make a selection</option>
                 
                  <option class="text" value="233">Career Solutions Services Denmark</option>
                  <option class="text" value="231">Consultation</option>
                  <option class="text" value="1">Denmark - Greencard</option>
                  <option class="text" value="3">Denmark Student Visa</option>
                  <option class="text" value="2">Denmark Working Visa</option>
                  <option class="text" value="127">Norway Job Seeker</option>                                        
              </select>
              <?php
                }elseif ($_REQUEST['destinationcountry'] == "Australia") {
              ?>
              <select id="personaldetails-visatype" name="visatype" class="form-control  required" aria-required="true">
                <option selected="selected" label="Please make a selection" value="">Please make a selection</option>
               
                <option class="text" value="63">189 - Skilled Independent Visa</option>
                <option class="text" value="66">190 - Skilled Nominated State Sponsored Visa</option>
                <option class="text" value="76">457 - Employer Sponsored Visa</option>
                <option class="text" value="68">476 - Skilled Recognized Graduate</option>
                <option class="text" value="65">489 - Nominated or Sponsored Visa</option>
                <option class="text" value="72">Aged Parent Visa</option>
                <option class="text" value="79">Australia Study Visa</option>
                <option class="text" value="126">Business Visa (subclass 160)</option>
                <option class="text" value="125">Career Solutions Services - Australia</option>
                <option class="text" value="70">Child Visa</option>
                <option class="text" value="228">Citizenship by Descent </option>
                <option class="text" value="240">Consultation</option>
                <option class="text" value="73">Contributory Aged Parent Visa</option>
                <option class="text" value="75">Employer Sponsorship</option>
                <option class="text" value="71">Parent Visa</option>
                <option class="text" value="67">Prospective Marriage Visa</option>
                <option class="text" value="77">Sponsored Family Visitor</option>
                <option class="text" value="69">Spouse Visa</option>
                <option class="text" value="74">Tourist Visa ETA</option>
                <option class="text" value="243">UnMarried Partner Visa</option>
                <option class="text" value="78">Working Holiday Visa</option>
              </select>
              <?php 
                }
              ?>

           </div>
           <div class="form-group">
               <label for="inputName">What is your title?</label>
           
               <select id="title" name="title" class="form-control required" aria-required="true">
                   <option selected="selected" label="Please make a selection" value="">Please make a selection</option>                                            
                   <option value="Doctor">Doctor</option>
                   <option value="Mr">Mr</option>
                   <option value="Mrs">Mrs</option>
                   <option value="Miss">Miss</option>
                   <option value="Ms">Ms</option>
               </select>
           </div>
           <div class="form-group">
               <label for="inputName">First Name *</label>
               <input type="text" class="form-control required" name="firstname" value="" id="firstname" aria-required="true"> </span>
           </div>
           <div class="form-group">
               <label for="inputName">Family Name *</label>
               <input type="text" class="form-control required" name="lastname" value="" id="lastname" aria-required="true">
           </div>
           <div class="form-group">
               <label for="inputEmail">Email*</label>
               <input type="email" class="form-control required" value="" required="1" name="email" type="email" id="txtEmail1" aria-required="true">
           </div>
           <div class="form-group">
               <label for="inputEmail">Confirm email address </label>
               <input type="email" class="form-control required" value="" name="confEmail" type="email" id="confEmail" aria-required="true">
           </div>
           <div class="form-group">
               <label for="inputAge">Date of Birth </label>
               <select class="required" name="date_day" aria-required="true">
                                  
                 <option selected="selected" label="Day" value="">Day</option>
                
                 <option label="01" value="01">01</option>
                 <option label="02" value="02">02</option>
                 <option label="03" value="03">03</option>
                 <option label="04" value="04">04</option>
                 <option label="05" value="05">05</option>
                 <option label="06" value="06">06</option>
                 <option label="07" value="07">07</option>
                 <option label="08" value="08">08</option>
                 <option label="09" value="09">09</option>
                 <option label="10" value="10">10</option>
                 <option label="11" value="11">11</option>
                 <option label="12" value="12">12</option>
                 <option label="13" value="13">13</option>
                 <option label="14" value="14">14</option>
                 <option label="15" value="15">15</option>
                 <option label="16" value="16">16</option>
                 <option label="17" value="17">17</option>
                 <option label="18" value="18">18</option>
                 <option label="19" value="19">19</option>
                 <option label="20" value="20">20</option>
                 <option label="21" value="21">21</option>
                 <option label="22" value="22">22</option>
                 <option label="23" value="23">23</option>
                 <option label="24" value="24">24</option>
                 <option label="25" value="25">25</option>
                 <option label="26" value="26">26</option>
                 <option label="27" value="27">27</option>
                 <option label="28" value="28">28</option>
                 <option label="29" value="29">29</option>
                 <option label="30" value="30">30</option>
                 <option label="31" value="31">31</option>
               </select>  
               <select class="required" name="date_month" aria-required="true">
                 <option selected="selected" label="Month" value="">Month</option>
                
                 <option value="01">January</option>
                 <option value="02">February</option>
                 <option value="03">March</option>
                 <option value="04">April</option>
                 <option value="05">May</option>
                 <option value="06">June</option>
                 <option value="07">July</option>
                 <option value="08">August</option>
                 <option value="09">September</option>
                 <option value="10">October</option>
                 <option value="11">November</option>
                 <option value="12">December</option>
               </select>
                               
               <select value="" class="required" name="date_year" aria-required="true">
                 <option selected="selected" label="Year" value="">Year</option>
                
                 <option label="2015" value="2015">2015</option>
                 <option label="2014" value="2014">2014</option>
                 <option label="2013" value="2013">2013</option>
                 <option label="2012" value="2012">2012</option>
                 <option label="2011" value="2011">2011</option>
                 <option label="2010" value="2010">2010</option>
                 <option label="2009" value="2009">2009</option>
                 <option label="2008" value="2008">2008</option>
                 <option label="2007" value="2007">2007</option>
                 <option label="2006" value="2006">2006</option>
                 <option label="2005" value="2005">2005</option>
                 <option label="2004" value="2004">2004</option>
                 <option label="2003" value="2003">2003</option>
                 <option label="2002" value="2002">2002</option>
                 <option label="2001" value="2001">2001</option>
                 <option label="2000" value="2000">2000</option>
                 <option label="1999" value="1999">1999</option>
                 <option label="1998" value="1998">1998</option>
                 <option label="1997" value="1997">1997</option>
                 <option label="1996" value="1996">1996</option>
                 <option label="1995" value="1995">1995</option>
                 <option label="1994" value="1994">1994</option>
                 <option label="1993" value="1993">1993</option>
                 <option label="1992" value="1992">1992</option>
                 <option label="1991" value="1991">1991</option>
                 <option label="1990" value="1990">1990</option>
                 <option label="1989" value="1989">1989</option>
                 <option label="1988" value="1988">1988</option>
                 <option label="1987" value="1987">1987</option>
                 <option label="1986" value="1986">1986</option>
                 <option label="1985" value="1985">1985</option>
                 <option label="1984" value="1984">1984</option>
                 <option label="1983" value="1983">1983</option>
                 <option label="1982" value="1982">1982</option>
                 <option label="1981" value="1981">1981</option>
                 <option label="1980" value="1980">1980</option>
                 <option label="1979" value="1979">1979</option>
                 <option label="1978" value="1978">1978</option>
                 <option label="1977" value="1977">1977</option>
                 <option label="1976" value="1976">1976</option>
                 <option label="1975" value="1975">1975</option>
                 <option label="1974" value="1974">1974</option>
                 <option label="1973" value="1973">1973</option>
                 <option label="1972" value="1972">1972</option>
                 <option label="1971" value="1971">1971</option>
                 <option label="1970" value="1970">1970</option>
                 <option label="1969" value="1969">1969</option>
                 <option label="1968" value="1968">1968</option>
                 <option label="1967" value="1967">1967</option>
                 <option label="1966" value="1966">1966</option>
                 <option label="1965" value="1965">1965</option>
                 <option label="1964" value="1964">1964</option>
                 <option label="1963" value="1963">1963</option>
                 <option label="1962" value="1962">1962</option>
                 <option label="1961" value="1961">1961</option>
                 <option label="1960" value="1960">1960</option>
                 <option label="1959" value="1959">1959</option>
                 <option label="1958" value="1958">1958</option>
                 <option label="1957" value="1957">1957</option>
                 <option label="1956" value="1956">1956</option>
                 <option label="1955" value="1955">1955</option>
                 <option label="1954" value="1954">1954</option>
                 <option label="1953" value="1953">1953</option>
                 <option label="1952" value="1952">1952</option>
                 <option label="1951" value="1951">1951</option>
                 <option label="1950" value="1950">1950</option>
                 <option label="1949" value="1949">1949</option>
                 <option label="1948" value="1948">1948</option>
                 <option label="1947" value="1947">1947</option>
                 <option label="1946" value="1946">1946</option>
                 <option label="1945" value="1945">1945</option>
                 <option label="1944" value="1944">1944</option>
                 <option label="1943" value="1943">1943</option>
                 <option label="1942" value="1942">1942</option>
                 <option label="1941" value="1941">1941</option>
                 <option label="1940" value="1940">1940</option>
                 <option label="1939" value="1939">1939</option>
                 <option label="1938" value="1938">1938</option>
                 <option label="1937" value="1937">1937</option>
                 <option label="1936" value="1936">1936</option>
                 <option label="1935" value="1935">1935</option>
                 <option label="1934" value="1934">1934</option>
                 <option label="1933" value="1933">1933</option>
                 <option label="1932" value="1932">1932</option>
                 <option label="1931" value="1931">1931</option>
                 <option label="1930" value="1930">1930</option>
                 <option label="1929" value="1929">1929</option>
                 <option label="1928" value="1928">1928</option>
                 <option label="1927" value="1927">1927</option>
                 <option label="1926" value="1926">1926</option>
                 <option label="1925" value="1925">1925</option>
                 <option label="1924" value="1924">1924</option>
                 <option label="1923" value="1923">1923</option>
                 <option label="1922" value="1922">1922</option>
                 <option label="1921" value="1921">1921</option>
                 <option label="1920" value="1920">1920</option>
                 <option label="1919" value="1919">1919</option>
                 <option label="1918" value="1918">1918</option>
                 <option label="1917" value="1917">1917</option>
                 <option label="1916" value="1916">1916</option>
                 <option label="1915" value="1915">1915</option>
                 <option label="1914" value="1914">1914</option>
                 <option label="1913" value="1913">1913</option>
                 <option label="1912" value="1912">1912</option>
                 <option label="1911" value="1911">1911</option>
                 <option label="1910" value="1910">1910</option>
                 <option label="1909" value="1909">1909</option>
                 <option label="1908" value="1908">1908</option>
                 <option label="1907" value="1907">1907</option>
                 <option label="1906" value="1906">1906</option>
                 <option label="1905" value="1905">1905</option>
                 <option label="1904" value="1904">1904</option>
                 <option label="1903" value="1903">1903</option>
                 <option label="1902" value="1902">1902</option>
                 <option label="1901" value="1901">1901</option>
                 <option label="1900" value="1900">1900</option>
               </select> 
                                     
           </div>
           <div class="form-group">
               <label for="contact number">Contact Number*</label>
               <input type="text" class="form-control number required" name="telenumber" placeholder="Contact Number" value="" aria-required="true">
           </div>
           <div class="form-group">
               <label for="comments">Address*</label>
               <input type="text" class="form-control required" name="address" value="" aria-required="true">
           </div>
           <div class="form-group">
               <label for="inputpostal">Postal code *</label>
               <input type="text" class="form-control required" placeholder="Postal code" name="postalcode" value="" aria-required="true">
           </div>
        </fieldset>
     
        <h3>Where do you work</h3>
        <fieldset>
            <legend>Where do you work</legend>
            
            <div class="form-group">
                <label for="radio2">When are you planning to go</label>
            
                <div class="radio">
                    <label><input type="radio" class="required" name="planning" id="plan1" value="ASAP" aria-required="true"> ASAP </label>
                </div>
                <div class="radio">
                    <label><input type="radio" class="required" value="3-6 months" id="plan2" name="planning" aria-required="true"> 3-6 months </label>
                </div>
                <div class="radio">
                    <label><input type="radio" class="required" value="6-9 months" id="plan3" name="planning" aria-required="true"> 6-9 months </label>
                </div>
            </div>
            <div class="form-group">
            
                <label for="inputNationality">What is the country of your nationality?*</label>
                <select id="Nationality" class="form-control required" placeholder="Nationality" name="residingcountry" aria-required="true">
                    <?php
                    if ($_REQUEST['residingcountry']!="") {
                    ?>
                    <option value="<?php echo $_REQUEST['residingcountry'];?>" selected="selected"><?php echo $_REQUEST['residingcountry'];?></option>
                    <?php
                    }else {
                    ?>
                    <option selected="selected" label="Please make a selection" value="">Please make a selection</option>
                    <?php
                    }
                    ?>
                    
                    <option value="3">Afghanistan</option>
                    <option value="4">Albania</option>
                    <option value="5">Algeria</option>
                    <option value="6">American Samoa</option>
                    <option value="7">Andorra</option>
                    <option value="8">Angola</option>
                    <option value="9">Anguilla</option>
                    <option value="10">Antarctica</option>
                    <option value="11">Antigua and/or Barbuda</option>
                    <option value="12">Argentina</option>
                    <option value="13">Armenia</option>
                    <option value="14">Aruba</option>
                    <option value="15">Australia</option>
                    <option value="16">Austria</option>
                    <option value="17">Azerbaijan</option>
                    <option value="18">Bahamas</option>
                    <option value="19">Bahrain</option>
                    <option value="20">Bangladesh</option>
                    <option value="21">Barbados</option>
                    <option value="22">Belarus</option>
                    <option value="23">Belgium</option>
                    <option value="24">Belize</option>
                    <option value="25">Benin</option>
                    <option value="26">Bermuda</option>
                    <option value="27">Bhutan</option>
                    <option value="28">Bolivia</option>
                    <option value="29">Bosnia and Herzegovina</option>
                    <option value="30">Botswana</option>
                    <option value="31">Bouvet Island</option>
                    <option value="32">Brazil</option>
                    <option value="33">British lndian Ocean Territory</option>
                    <option value="34">Brunei Darussalam</option>
                    <option value="35">Bulgaria</option>
                    <option value="36">Burkina Faso</option>
                    <option value="37">Burundi</option>
                    <option value="38">Cambodia</option>
                    <option value="39">Cameroon</option>
                    <option value="2">Canada</option>
                    <option value="40">Cape Verde</option>
                    <option value="41">Cayman Islands</option>
                    <option value="42">Central African Republic</option>
                    <option value="43">Chad</option>
                    <option value="44">Chile</option>
                    <option value="45">China</option>
                    <option value="46">Christmas Island</option>
                    <option value="47">Cocos (Keeling) Islands</option>
                    <option value="48">Colombia</option>
                    <option value="49">Comoros</option>
                    <option value="50">Congo</option>
                    <option value="51">Cook Islands</option>
                    <option value="52">Costa Rica</option>
                    <option value="53">Croatia (Hrvatska)</option>
                    <option value="54">Cuba</option>
                    <option value="55">Cyprus</option>
                    <option value="56">Czech Republic</option>
                    <option value="57">Denmark</option>
                    <option value="58">Djibouti</option>
                    <option value="59">Dominica</option>
                    <option value="60">Dominican Republic</option>
                    <option value="61">East Timor</option>
                    <option value="62">Ecudaor</option>
                    <option value="63">Egypt</option>
                    <option value="64">El Salvador</option>
                    <option value="65">Equatorial Guinea</option>
                    <option value="66">Eritrea</option>
                    <option value="67">Estonia</option>
                    <option value="68">Ethiopia</option>
                    <option value="69">Falkland Islands (Malvinas)</option>
                    <option value="70">Faroe Islands</option>
                    <option value="71">Fiji</option>
                    <option value="72">Finland</option>
                    <option value="73">France</option>
                    <option value="74">France, Metropolitan</option>
                    <option value="75">French Guiana</option>
                    <option value="76">French Polynesia</option>
                    <option value="77">French Southern Territories</option>
                    <option value="78">Gabon</option>
                    <option value="79">Gambia</option>
                    <option value="80">Georgia</option>
                    <option value="81">Germany</option>
                    <option value="82">Ghana</option>
                    <option value="83">Gibraltar</option>
                    <option value="84">Greece</option>
                    <option value="85">Greenland</option>
                    <option value="86">Grenada</option>
                    <option value="87">Guadeloupe</option>
                    <option value="88">Guam</option>
                    <option value="89">Guatemala</option>
                    <option value="90">Guinea</option><option value="91">Guinea-Bissau</option><option value="92">Guyana</option><option value="93">Haiti</option><option value="94">Heard and Mc Donald Islands</option><option value="95">Honduras</option><option value="96">Hong Kong</option><option value="97">Hungary</option><option value="98">Iceland</option><option value="99">India</option><option value="100">Indonesia</option><option value="101">Iran (Islamic Republic of)</option><option value="102">Iraq</option><option value="103">Ireland</option><option value="104">Israel</option><option value="105">Italy</option><option value="106">Ivory Coast</option><option value="107">Jamaica</option><option value="108">Japan</option><option value="109">Jordan</option><option value="110">Kazakhstan</option><option value="111">Kenya</option><option value="112">Kiribati</option><option value="113">Korea, Democratic People's Republic of</option><option value="114">Korea, Republic of</option><option value="115">Kuwait</option><option value="116">Kyrgyzstan</option><option value="117">Lao People's Democratic Republic</option><option value="118">Latvia</option><option value="119">Lebanon</option><option value="120">Lesotho</option><option value="121">Liberia</option><option value="122">Libyan Arab Jamahiriya</option><option value="123">Liechtenstein</option><option value="124">Lithuania</option><option value="125">Luxembourg</option><option value="126">Macau</option><option value="127">Macedonia</option><option value="128">Madagascar</option><option value="129">Malawi</option><option value="130">Malaysia</option><option value="131">Maldives</option><option value="132">Mali</option><option value="133">Malta</option><option value="134">Marshall Islands</option><option value="135">Martinique</option><option value="136">Mauritania</option><option value="137">Mauritius</option><option value="138">Mayotte</option><option value="139">Mexico</option><option value="140">Micronesia, Federated States of</option><option value="141">Moldova, Republic of</option><option value="142">Monaco</option><option value="143">Mongolia</option><option value="144">Montserrat</option><option value="145">Morocco</option><option value="146">Mozambique</option><option value="147">Myanmar</option><option value="148">Namibia</option><option value="149">Nauru</option><option value="150">Nepal</option><option value="151">Netherlands</option><option value="152">Netherlands Antilles</option><option value="153">New Caledonia</option><option value="154">New Zealand</option><option value="155">Nicaragua</option><option value="156">Niger</option><option value="157">Nigeria</option><option value="158">Niue</option><option value="159">Norfork Island</option><option value="160">Northern Mariana Islands</option><option value="161">Norway</option><option value="162">Oman</option><option value="163">Pakistan</option><option value="164">Palau</option><option value="165">Panama</option><option value="166">Papua New Guinea</option><option value="167">Paraguay</option><option value="168">Peru</option><option value="169">Philippines</option><option value="170">Pitcairn</option><option value="171">Poland</option><option value="172">Portugal</option><option value="173">Puerto Rico</option><option value="174">Qatar</option><option value="175">Reunion</option><option value="176">Romania</option><option value="177">Russian Federation</option><option value="178">Rwanda</option><option value="179">Saint Kitts and Nevis</option><option value="180">Saint Lucia</option><option value="181">Saint Vincent and the Grenadines</option><option value="182">Samoa</option><option value="183">San Marino</option><option value="184">Sao Tome and Principe</option><option value="185">Saudi Arabia</option><option value="240">Schengen</option><option value="186">Senegal</option><option value="187">Seychelles</option><option value="188">Sierra Leone</option><option value="189">Singapore</option><option value="190">Slovakia</option><option value="191">Slovenia</option><option value="192">Solomon Islands</option><option value="193">Somalia</option><option value="194">South Africa</option><option value="195">South Georgia South Sandwich Islands</option><option value="196">Spain</option><option value="197">Sri Lanka</option><option value="198">St. Helena</option><option value="199">St. Pierre and Miquelon</option><option value="200">Sudan</option><option value="201">Suriname</option><option value="202">Svalbarn and Jan Mayen Islands</option><option value="203">Swaziland</option><option value="204">Sweden</option><option value="205">Switzerland</option><option value="206">Syrian Arab Republic</option><option value="207">Taiwan</option><option value="208">Tajikistan</option><option value="209">Tanzania, United Republic of</option><option value="210">Thailand</option><option value="211">Togo</option><option value="212">Tokelau</option><option value="213">Tonga</option><option value="214">Trinidad and Tobago</option><option value="215">Tunisia</option><option value="216">Turkey</option><option value="217">Turkmenistan</option><option value="218">Turks and Caicos Islands</option><option value="219">Tuvalu</option><option value="220">Uganda</option><option value="221">Ukraine</option><option value="222">United Arab Emirates</option><option value="223">United Kingdom</option><option value="1">United States</option><option value="224">United States minor outlying islands</option><option value="225">Uruguay</option><option value="226">Uzbekistan</option><option value="227">Vanuatu</option><option value="228">Vatican City State</option><option value="229">Venezuela</option><option value="230">Vietnam</option><option value="232">Virgin Islands (U.S.)</option><option value="231">Virigan Islands (British)</option><option value="233">Wallis and Futuna Islands</option><option value="234">Western Sahara</option><option value="235">Yemen</option><option value="236">Yugoslavia</option><option value="237">Zaire</option><option value="238">Zambia</option><option value="239">Zimbabwe</option>                          </select> <span class=""></span>
            </div>
            <div class="form-group">
                <label for="inputpostal">What is your current job title*</label>
                <select class="form-control required isRequired" id="occupation" name="occupation" aria-required="true">
                    <option selected="selected" label="Please make a selection" value="">Please make a selection</option>
                    <option value="Accommodation Service Manager">Accommodation Service Manager</option><option value="Airplane Pilot">Airplane Pilot</option><option value="Architects">Architects</option><option value="Audiologist or Speech Language Pathologist">Audiologist or Speech Language Pathologist</option><option value="Biologists and Related Scientists">Biologists and Related Scientists</option><option value="Bricklayer">Bricklayer</option><option value="Care Worker">Care Worker</option><option value="Chef">Chef</option><option value="College and Other Vocational Instructor">College and Other Vocational Instructor</option><option value="Computer or Information Systems Manager">Computer or Information Systems Manager</option><option value="Construction Manager">Construction Manager</option><option value="Contractor or Supervisor, Carpentry Trade">Contractor or Supervisor, Carpentry Trade</option><option value="Contractor or Supervisor, Heavy Construction Equipment Crews">Contractor or Supervisor, Heavy Construction Equipment Crews</option><option value="Contractor or Supervisor, Pipefitting Trades">Contractor or Supervisor, Pipefitting Trades</option><option value="Contractors and Supervisors, Mechanic Trades">Contractors and Supervisors, Mechanic Trades</option><option value="Cook">Cook</option><option value="Crane Operator">Crane Operator</option><option value="Dental Hygienists &amp; Dental Therapists">Dental Hygienists &amp; Dental Therapists</option><option value="Dentists">Dentists</option><option value="Doctor">Doctor</option><option value="Driller and Blaster - Surface Mining, Quarrying and Construction">Driller and Blaster - Surface Mining, Quarrying and Construction</option><option value="Economist">Economist</option><option value="Electrician (Except Industrial and Power System)">Electrician (Except Industrial and Power System)</option><option value="Engineer">Engineer</option><option value="Finance">Finance</option><option value="Financial Auditor or Accountant">Financial Auditor or Accountant</option><option value="Financial Manager">Financial Manager</option><option value="Forestor">Forestor</option><option value="General Practitioner or Family Physician">General Practitioner or Family Physician</option><option value="Geological Engineer">Geological Engineer</option><option value="Geologist, Geochemist or Geophysicist">Geologist, Geochemist or Geophysicist</option><option value="Head Nurse or Supervisor">Head Nurse or Supervisor</option><option value="Heavy-Duty Equipment Mechanic">Heavy-Duty Equipment Mechanic</option><option value="Hotel Manager/Supervisor">Hotel Manager/Supervisor</option><option value="Human Resources">Human Resources</option><option value="Import Export">Import Export</option><option value="Industrial Electrician">Industrial Electrician</option><option value="Insurance Adjusters and Claims Examiners">Insurance Adjusters and Claims Examiners</option><option value="IT Professional">IT Professional</option><option value="Licensed Practical Nurse">Licensed Practical Nurse</option><option value="Manager in Health Care">Manager in Health Care</option><option value="Manufacturer">Manufacturer</option><option value="Mathematician">Mathematician</option><option value="Mechanic">Mechanic</option><option value="Medical Radiation Technologist">Medical Radiation Technologist</option><option value="Mining Engineer">Mining Engineer</option><option value="Nurse">Nurse</option><option value="Occupational Therapist">Occupational Therapist</option><option value="Other">Other</option><option value="Petroleum Engineer">Petroleum Engineer</option><option value="Pharmacists">Pharmacists</option><option value="Physiotherapist">Physiotherapist</option><option value="Plumber">Plumber</option><option value="Police Officer">Police Officer</option><option value="Primary Production Managers (Except Agriculture)">Primary Production Managers (Except Agriculture)</option><option value="Professional Occupations in Business Services to Management">Professional Occupations in Business Services to Management</option><option value="Public Relations">Public Relations</option><option value="Registered Nurse">Registered Nurse</option><option value="Restaurant and Food Service Manager">Restaurant and Food Service Manager</option><option value="Sales and Marketing Manager">Sales and Marketing Manager</option><option value="Social Workers">Social Workers</option><option value="Specialist Physician">Specialist Physician</option><option value="Steamfitter, Pipe fitter or Sprinkler System Installer">Steamfitter, Pipe fitter or Sprinkler System Installer</option><option value="Stock Broker">Stock Broker</option><option value="Supervisor, Mining and Quarrying">Supervisor, Mining and Quarrying</option><option value="Supervisor, Oil and Gas Drilling and Service">Supervisor, Oil and Gas Drilling and Service</option><option value="Supervisor, Petroleum, Gas and Chemical Processing and Utilities">Supervisor, Petroleum, Gas and Chemical Processing and Utilities</option><option value="Teacher">Teacher</option><option value="Tradesman">Tradesman</option><option value="Training and Development Professional">Training and Development Professional</option><option value="University Professor">University Professor</option><option value="Welder">Welder</option><option value="Welder and Related Machine Operator">Welder and Related Machine Operator</option><option value="Zoologist">Zoologist</option>
                </select>
            </div>
            <div class="form-group">
                <label for="radio1">Are you still in this employment </label>
                <div class="radio">
                    <label><input type="radio" class="required" value="No" name="StillInthisEmployment" aria-required="true">NO </label>
                </div>
                <div class="radio">
                    <label><input type="radio" class="required" value="Yes" id="stillemploye1" name="StillInthisEmployment" aria-required="true">Yes </label>
                </div>
            </div>
            <div class="form-group">
                <label for="inputQualification">Your highest level of qualification</label>
                 <select class="form-control required" name="education" aria-required="true">
                    <option selected="selected" label="Please make a selection" value="">Please make a selection</option>
                    <option label="None" value="None">None</option>
                    <option label="Diploma" value="Diploma">Diploma</option>
                    <option label="Advanced / Higher Diploma" value="Advanced / Higher Diploma">Advanced / Higher Diploma</option>
                    <option label="Graduate Diploma" value="Graduate Diploma">Graduate Diploma</option>
                    <option label="Undergraduate / Bachelor / Degree level" value="Undergraduate / Bachelor / Degree level">Undergraduate / Bachelor / Degree level</option>
                    <option label="Post Graduate Diploma" value="Post Graduate Diploma">Post Graduate Diploma</option>
                    <option label="Post Graduate / Master Degree" value="Post Graduate / Master Degree">Post Graduate / Master Degree</option>
                    <option label="MPhil" value="MPhil">MPhil</option>
                    <option label="PhD" value="PhD">PhD</option>
                    <option label="Professional Certification" value="Professional Certification">Professional Certification</option>
                    <option label="Other" value="Other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="inputExp">Number of years of work experience *</label>
                <select class="form-control required" name="exprienceduration" id="experience" aria-required="true">
                    <option selected="selected" label="Please make a selection" value="">Please make a selection</option>
                    <option value="Less than a year">Less than a year</option>
                    <option value="1 year">1 year</option>
                    <option value="2 years">2 years</option>
                    <option value="3 years">3 years</option>
                    <option value="4 years+">4 years+</option>
                </select>           
            </div>
            <div class="form-group">
                <label for="inputExp">Assistance with visa application *</label>
                <label id="helpwithvisa-error" class="error" for="helpwithvisa">This field is required.</label>
                <select class="form-control required error" name="helpwithvisa" aria-required="true">
                    <option selected="selected" label="Please make a selection" value="">Please make a selection</option>
                   
                    <option value="I am at the very beginning and don’t know what to do next">I am at the very beginning and don’t know what to do next.</option>
                    <option value="I am looking for further information but don’t need any help with the application process">I am looking for further information but don’t need any help with the application process</option>
                    <option value="I need help with my visa application and I am keen to engage the services of a migration agent">I need help with my visa application and I am to engage the services of a migration agent</option>
                    <option value="Global Migrate has been recommended to me and I am keen to speak to a migration consultant">Global Migrate has been recommended to me and I am keen to speak to a migration consultant</option>
                </select>
            </div>
            <div class="form-group">
                <label for="comments">Finally, please tell us a bit about you..</label>
                <label id="add_info-error" class="error" for="add_info">This field is required.</label>
                <textarea class="form-control-cv error" name="add_info" value=""  style="width: 100%;"></textarea>
                <!-- <span class="normalTxtdrk">
                <input type="hidden" value="4" id="residingcountry" name="residingcountry">
                <input type="hidden" value="2" id="destinationcountry" name="destinationcountry">
                </span> -->
            </div>
          
            <div class="form-group">
            <input class="required error" type="checkbox" name="captcha" value="captcha" style="margin-right: 10px;"> Please click here to proceed.<br>
              <!-- <p><img src="<?php bloginfo('stylesheet_directory'); ?>/templates/captcha.php" width="120" height="30" border="1" alt="CAPTCHA"></p>
              <p><input type="text" size="6" maxlength="5" id="captcha" name="captcha" value=""><br>
              <small>copy the digits from the image into this box</small></p> -->
              <!-- <div class="g-recaptcha required error" data-sitekey="6Le4eQoTAAAAAPjijcgmQTUfnY97hgFAbRiP6v0w"></div> -->
            </div>
            <div class="form-group" style="text-align: right; padding-top: 5px; margin-top:5px;">
              <button id="submit-id" type="submit" class="btn btn-primary" name="Next"> SUBMIT </button>
            </div>
           
        </fieldset>
    </form>
</div>

<!--<link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/normalize.css">-->
<!--<link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/main.css">-->
<link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/jquery.steps.css">


<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/js/modernizr-2.6.2.min.js"></script>
<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/js/jquery.cookie-1.3.1.js"></script>
<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/js/jquery.steps.min.js"></script>
<script type="text/javascript" src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>

<script type="text/javascript">
    


    var form = jQuery("#freeassessment").show();
     
    form.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "slideLeft",
        onStepChanging: function (event, currentIndex, newIndex)
        {
            // Allways allow previous action even if the current form is not valid!
            if (currentIndex > newIndex)
            {
                return true;
            }
            // Forbid next action on "Warning" step if the user is to young
            if (newIndex === 3 && Number($("#age-2").val()) < 18)
            {
                return false;
            }
            // Needed in some cases if the user went back (clean up)
            if (currentIndex < newIndex)
            {
                // To remove error styles
                form.find(".body:eq(" + newIndex + ") label.error").remove();
                form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
            }
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onStepChanged: function (event, currentIndex, priorIndex)
        {
            // Used to skip the "Warning" step if the user is old enough.
            if (currentIndex === 2 && Number($("#age-2").val()) >= 18)
            {
                form.steps("next");
            }
            // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
            if (currentIndex === 2 && priorIndex === 3)
            {
                form.steps("previous");
            }
        },
        onFinishing: function (event, currentIndex)
        {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function (event, currentIndex)
        {
            /*alert("Submitted!");*/ 
        }
    }).validate({
        errorPlacement: function errorPlacement(error, element) { element.before(error); },
        rules: {
            confEmail: {
                equalTo: "#txtEmail1"
            },
            telenumber: {
                required: true,
                number: true
            }

        }
    });

    // .validate({
    //     errorPlacement: function errorPlacement(error, element) { element.before(error); },
    //     rules: {
    //         confirm: {
    //             equalTo: "#password-2"
    //         }

    //     }
    // });

    // function checkForm(valdvalue)
    //   {

    //     if(!valdvalue.match(/^\d{5}$/)) {
    //       alert('Please enter the CAPTCHA digits in the box provided');
    //       form.captcha.focus();
    //       return false;
    //     }


    //     return true;
    //   }

    // $("#submit-id").click(function(){
       
    //     if($("#captcha").val()=='' || !$("#captcha").val().match(/^\d{5}$/)){
    //         alert('Please enter the CAPTCHA digits in the box provided');
    //         return false;
    //     }else{
    //       data={"captcha":$("#captcha").val()};
    //     url= "<?php //bloginfo('stylesheet_directory'); ?>/form-con-db.php";
    //     $.ajax({
    //           type: "POST",
    //           url: url,
    //           data: data,
    //           error: function(returnval) {
    //             if(returnval=='error'){
    //               alert("Sorry, the CAPTCHA code entered was incorrect!");
    //             }else{
    //               window.location.assign("http://global-migrate.com/wordpress/?page_id=809");
    //             }
            
    //         //return false;
    //         },
    //           success: function (returnval) {
                
                
              
    //               window.location.assign("http://global-migrate.com/wordpress/?page_id=809");

               
                
    //           }
            
    //         });
    //     }
        
        

    // });

    

</script>
<?php
    get_footer();
?>