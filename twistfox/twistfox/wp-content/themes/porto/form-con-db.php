<?php

// session_start();
// if($_POST['captcha'] != $_SESSION['digit']) {
//  echo('error');
//  session_destroy();
// }else{
//  session_destroy();
/*
    $dbhost='localhost'; // site
$db='global123'; // your database username
$dbuser='gblondon'; // your database username
$dbpass='em9Mu7?83wEqs9$0'; // your database user's password
$conn = mysql_connect ($dbhost,$dbuser,$dbpass,$db);
$new= mysql_select_db("global123",$conn);
       */


$service_url = 'http://api.global-migrate.com/addData';
$curl = curl_init($service_url);
$curl_post_data = array(

    'title' => $_POST['title'],
    'Condidate'  => $_REQUEST['firstname'],
    'lastname'  => $_REQUEST['lastname'],
    'Email'  => $_REQUEST['email'],
    'whyvisa'  => $_REQUEST['whyvisa'],
    'visatype'  => $_REQUEST['visatype'],
    'day'  => $_REQUEST['date_day'] ,
    'month'  => $_REQUEST['date_month'] ,
    'year'  => $_REQUEST['date_year'] ,
    'Contact'  => $_REQUEST['telenumber'],
    'nationality'  => $_REQUEST['nationality'],
    'occupation'  => $_REQUEST['occupation'],
    'postalcode'  => $_REQUEST['postalcode'],
    'destinationcountry'  =>  $_REQUEST['destinationcountry'],
    'residingcountry'  => $_REQUEST['residingcountry'],
    'address'  => $_REQUEST['address'],
    'education'  => $_REQUEST['education'],
    'require_time'  => $_REQUEST['helpwithvisa'],
    'applydate'  => date("Y-m-d"),
    'add_info'  => $_REQUEST['add_info'],
    'StillInthisEmployment' => $_REQUEST['StillInthisEmployment'],
    'exprienceduration'  => $_REQUEST['exprienceduration'],
    'apikey' => 'bbf4f601-a7d8-45ce-9b8c-ecdeca2dfd79',
    'crmtype' => 'mainAE'
);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
$curl_response = curl_exec($curl);
if ($curl_response === false) {
    $info = curl_getinfo($curl);
    curl_close($curl);
    die('error occured during curl exec. Additioanl info: ' . var_export($info));
}
curl_close($curl);
//var_dump($curl_response);
$decoded = json_decode($curl_response);
if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
    die('error occured: ' . $decoded->response->errormessage);
}
//echo 'response ok!';
//var_export($decoded->response);
header('Location: http://global-migrate.ae/?page_id=809');
die();

// $title=$_POST['title'];
// $Condidate=$_REQUEST['firstname'];
// $lastname=$_REQUEST['lastname'];
// $Email=$_REQUEST['email'];
// $whyvisa=$_REQUEST['whyvisa'];
// $visatype=$_REQUEST['visatype'];
// $day=$_REQUEST['date_day'] ;
// $month=$_REQUEST['date_month'] ;
// $year=$_REQUEST['date_year'] ;
// $Contact=$_REQUEST['telenumber'];
// $nationality=$_REQUEST['nationality'];
// $occupation=$_REQUEST['occupation'];
// $postalcode=$_REQUEST['postalcode'];
// $destinationcountry = $_REQUEST['destinationcountry'];
// $residingcountry=$_REQUEST['residingcountry'];
// $address=$_REQUEST['address'];
// $education=$_REQUEST['education'];
// $require_time=$_REQUEST['helpwithvisa'];
// $applydate=date("Y-m-d");
// $add_info =$_REQUEST['add_info'];
// $StillInthisEmployment=$_REQUEST['StillInthisEmployment'];
// $exprienceduration =$_REQUEST['exprienceduration'];


// $string_content= " Title : " . $title;
// $string_content.= " First Name : " .$Condidate ."/n";
// $string_content.= " Last Name : " .$lastname ."/n";
// $string_content.= " Email : " .$Email ."/n";
// $string_content.= " Why Visa : " .$whyvisa ."/n";
// $string_content.= " Visa Type : " .$visatype ."/n";
// $string_content.= " Day : " .$day ."/n";
// $string_content.= " Month : " .$month ."/n";
// $string_content.= " Year : " .$year ."/n";
// $string_content.= " Contact : " .$Contact ."/n";

// $string_content.= " Nationality : " .$nationality ."/n";
// $string_content.= " Occupation : " .$occupation ."/n";
// $string_content.= " Post Code : " .$postalcode ."/n";
// $string_content.= " Destination Country : " .$destinationcountry ."/n";

// $string_content.= " Residing Country : " .$residingcountry ."/n";
// $string_content.= " Address : " .$address ."/n";
// $string_content.= " Education : " .$education ."/n";
// $string_content.= " Help with visa : " .$require_time ."/n";

// $string_content.= " Apply Date : " .$applydate ."/n";
// $string_content.= " Comment : " .$add_info ."/n";
// $string_content.= " Still In employment : " .$StillInthisEmployment ."/n";
// $string_content.= " Experience in education : " .$exprienceduration ."/n";


// //Email information
// $admin_email = "t.jawed@global-migrate.com";
// $email = $_REQUEST['email'];
// $subject ='lead from website - .ae';
// $comment = $string_content;

// //send email
// mail($admin_email, $subject, $comment, "From:" . $email);



// $dbhost='37.187.8.194'; // site
// $db='crm_globalmigrate_ae'; // your database username
// $dbuser='crmuae'; // your database username
// $dbpass='Wasiqaftab123!@£'; // your database user's password
// $conn = mysql_connect ($dbhost,$dbuser,$dbpass,$db);// or die(mysql_error());
// $new= mysql_select_db("crm_globalmigrate_ae",$conn);//  or die(mysql_error());;



// // die($residingcountry);

// if($title!="" && $Condidate!="" && $lastname!="" && $Email!="" && $whyvisa!="" && $visatype!="" && $address!="" && $postalcode!="" )
// {



//     $sql="select * from enquiries where email='".$Email."'";
// //echo ($sql); //die;
//     $res=mysql_query($sql) or die("point 1 ". mysql_error());
// //echo((mysql_num_rows($res)));
//     if((mysql_num_rows($res)) > 0)
//     {
//         while($rs=mysql_fetch_array($res))
//         {
//             //print_r($rs);
//             /*$sql="update enquiries
//     set
//     contactnumber='$Contact',address1='$address',
//     firstname='$Condidate',lastname='$lastname',
//     add_info='$add_info' id=".$rs["id"];*/

//             $sql="update enquiries
// set
// firstname='$Condidate',lastname='$lastname',contactnumber='$Contact',address1='$address',
// dob_day='$day', dob_month='$month', dob_year='$year', postalcode='$postalcode',
// residingcountry='$residingcountry', destinationcountry='$destinationcountry', require_time='$require_time',
// occupation='$occupation', education='education', applydate='$applydate', StillInthisEmployment='$StillInthisEmployment', exprienceduration='exprienceduration',

// add_info='$add_info' where id=".$rs["id"];

// //echo $sql; //die;

//             mysql_query($sql) ;// or die("point 2 ". mysql_error());
// //die();
//             $client=$rs["id"];
//         }

// //echo($client);
//     }
//     else
//     {

//         $sql="insert into enquiries(whyvisa,visatype,title,firstname,lastname,nationality,dob_day,dob_month,dob_year,email,contactnumber,address1,destinationcountry,residingcountry,require_time,occupation,education,postalcode,applydate,add_info,StillInthisEmployment,exprienceduration)
//      values('$whyvisa','$visatype','$title','$Condidate','$lastname','$nationality','$day','$month',
// '$year','$Email','$Contact','$address','$destinationcountry','$residingcountry','$require_time','$occupation','$education','$postalcode','$applydate','$add_info','$StillInthisEmployment','$exprienceduration')";
// //die();
// //echo($sql."sssss");
//         $meneed = mysql_query($sql);// or die("point 3 ". mysql_error());

//         $client=mysql_insert_id();
//     }




// //echo ($client)."</br>";

//     $case_sql="insert into cases set clientid='$client', updatedby='7', productid='$visatype', consultantid='7', caseworkerid='7', descountryid='$destinationcountry'";
// //echo($case_sql)."< /br>";
//     $mewant = mysql_query($case_sql); //or die("point 4 ". mysql_error());

//     $caseid=mysql_insert_id();

// //
//     $event_sql="insert into all_events set caseid='$caseid', schedulefor='7', scheduleset_by='7', eventfor_client='$client', eventtype='Single Event', taskdate='', urgent='', events='46', eventdetails='$_REQUEST[add_info]', eventstatus='Completed'";
// //echo($event_sql)."</br>";
//     $megoing = mysql_query($event_sql); //or die("point 5 ". mysql_error());



// //sleep(10);
// //echo "THANKS";

//     header('Location: http://global-migrate.ae/?page_id=809');

// }
// else
// {
//     header('Location: http://global-migrate.ae/?page_id=809');
// }


?>