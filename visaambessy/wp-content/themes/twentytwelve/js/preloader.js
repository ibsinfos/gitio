// JavaScript Document
jQuery.fn.preloader = function(options){
	
	var defaults = {
		delay:200,
		preload_parent:"a",
		check_timer:300,
		ondone:function(){ },
		oneachload:function(image){  },
		fadein:500 
	};
	
	// variables declaration and precaching images and parent container
	 var options = jQuery.extend(defaults, options),
	root = jQuery(this) , images = root.find("img").css({"visibility":"hidden",opacity:0}) ,  timer ,  counter = 0, i=0 , checkFlag = [] , delaySum = options.delay ,
 
	init = function(){
		
		timer = setInterval(function(){
			
			if(counter>=checkFlag.length)
			{
			clearInterval(timer);
			options.ondone();
			return;
			}
		
			for(i=0;i<images.length;i++)
			{
				if(images[i].complete==true)
				{
					if(checkFlag[i]==false)
					{
						checkFlag[i] = true;
						options.oneachload(images[i]);
						counter++;
						
						delaySum = delaySum + options.delay;
					}
					
					jQuery(images[i]).css("visibility","visible").delay(delaySum).animate({opacity:1},options.fadein,
					function(){ jQuery(this).parent().removeClass("preloader");   });
								 
				}
			}
		
			},options.check_timer) 
		 
		 
		 } ;
	
		images.each(function(){
		
			if(jQuery(this).parent(options.preload_parent).length==0)
				jQuery(this).wrap("<a class='preloader' />");
			else
				jQuery(this).parent().addClass("preloader");
			
			checkFlag[i++] = false;
		}); 
		
	images = jQuery.makeArray(images); 
	
	var icon = jQuery("<img />",{
		  
		id : 'loadingicon' ,
		src : wppath.template_path + '/images/ajax-loader.gif'
	
		}).hide().appendTo("body");
	
	timer = setInterval(function(){
		
		if(icon[0].complete==true)
		{
			clearInterval(timer);
			init();
			 icon.remove();
			return;
		}
		
		},100);
	
	}
	
	
	
	
	
	
	var leftnum =[5, 10, 15, 20];
var rightnum =[2, 4, 6, 8];

var leftnum = Math.floor(Math.random()*11);
var rightnum = Math.floor(Math.random()*11);


var tolnum = eval(leftnum) + eval(rightnum) ;

	
	$(document).ready(function() {
		$("#my_awesome_form2").css({"opacity": "0.3"});
		$("#my_awesome_form3").css({"opacity": "0.3"});
	   // $("#my_awesome_form2 :input").prop("disabled", true);

		//$("#my_awesome_form3 :input").prop("disabled", true);
		

document.getElementById("sh").innerHTML = leftnum + " + " + rightnum;
		
		
	});
	
	function validate1(){
            
            
    if (document.getElementById("title").value == '')
    {
      document.getElementById('title1').innerHTML = "Please Select your title";

      document.getElementById("title").focus();

      return false;
    }
    else
    {
      document.getElementById("title1").innerHTML = "";
    }
 
  if (document.getElementById("typekids").value == '')
    {
      document.getElementById('typekids1').innerHTML = "Please Select your types";

      document.getElementById("typekids").focus();

      return false;
    }
    else
    {
      document.getElementById("typekids1").innerHTML = "";
    }

 var cond = document.getElementById("Condidate").value;

    if (cond == '')
    {
      document.getElementById('Condidate1').innerHTML = "Please Enter Your Name";

      document.getElementById("Condidate").focus();

      return false;
    }

    else if (!isNaN(cond))
    {

      document.getElementById('Condidate1').innerHTML = "Please enter a valid name";

      document.getElementById("Condidate").focus();

      return false;
    }

    else
    {
      document.getElementById("Condidate1").innerHTML = "";
    }
    
    
    var cond = document.getElementById("lastname").value;

    if (cond == '')
    {
      document.getElementById('lastname1').innerHTML = "Please Enter Your Name";

      document.getElementById("lastname").focus();

      return false;
    }

    else if (!isNaN(cond))
    {

      document.getElementById('lastname1').innerHTML = "Please enter a valid name";

      document.getElementById("lastname").focus();

      return false;
    }

    else
    {
      document.getElementById("lastname1").innerHTML = "";
    }
    
    
 if (document.getElementById("postal").value == '')
    {
      document.getElementById('postal1').innerHTML = "Please Enter your postal code";

      document.getElementById("postal").focus();

      return false;
    }
    else
    {
      document.getElementById("postal1").innerHTML = "";
    }

 
 
   var email = document.getElementById("txtEmail1").value;
   var confEmail = document.getElementById("confEmail").value;


    if (email == '') {


      document.getElementById('email1').innerHTML = "Please Enter Email ID";

      document.getElementById("txtEmail1").focus();

      return false;
    } else {
      document.getElementById("email1").innerHTML = "";
    }

    if (email != '')
    {

      if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))) {
        document.getElementById('email1').innerHTML = "Please Enter Right Email_Id";

        document.getElementById("txtEmail1").focus();
        return false;
      }

    }

    else {
      document.getElementById("email1").innerHTML = "";
    }
    
    if (email != confEmail) {


      document.getElementById('confEmail1').innerHTML = "Please Enter same as Email ID";

      document.getElementById("confEmail").focus();

      return false;
    } else {
      document.getElementById("confEmail1").innerHTML = "";
    }
 
    
/*
 * day select
 */  
     if (document.getElementById("month_select").value == '0' || document.getElementById("day_select").value == '0' || document.getElementById("year_select").value == '0' )
    {
      document.getElementById('month_select1').innerHTML = "Please Select your DATE title";

      document.getElementById("month_select").focus();

      return false;
    }
    else
    {
      document.getElementById("month_select1").innerHTML = "";
    }
    
    
 
   
    
    
     var tel = document.getElementById("Contact").value;
    if (tel == '')
    {
      document.getElementById('Contact1').innerHTML = "Please Enter Your Phone No.";

      document.getElementById("Contact").focus();

      return false;
    }
    else if (isNaN(tel))
    {

      document.getElementById('Contact1').innerHTML = "Please enter a valid number";

      document.getElementById("Contact").focus();

      return false;
    }
    else
    {
      document.getElementById("Contact1").innerHTML = "";
    }
    
 
    if (document.getElementById("address").value == '')
    {
      document.getElementById('address1').innerHTML = "Please Enter your Address";

      document.getElementById("address").focus();

      return false;
    }
    else
    {
      document.getElementById("address1").innerHTML = "";
    }


   
	var captchanow = document.getElementById("comment_captcha_code").value;
	
	
	
	if(captchanow!=tolnum&&captchanow!='')
	{
	document.getElementById('captcha-validate').innerHTML = "Captcha Wrong";

      document.getElementById("comment_captcha_code").focus();
	  return false;
	
	}
	else if(captchanow=='')
	
	{
	document.getElementById('captcha-validate').innerHTML = "Fill the Captcha";

      document.getElementById("comment_captcha_code").focus();
	}
	else{

    abc();



  }
     }

	function abc(){
		var form1 = $('#my_awesome_form1');
		var datasting1 = form1.serialize();

		$('#centerLoader').show();
                
		setTimeout(function(){
			$("#my_awesome_form1").css({"opacity": "0.3"});
			$("#my_awesome_form2").css({"opacity": "1"});
			$("#my_awesome_form3").css({"opacity": "0.3"});
                        $('.step1').css('display', 'none');
	                $('.step2').css('display', 'block');
	                $('.step3').css('display', 'none');
			$('#centerLoader').hide();
		}, 3000);

	}


  function validate2()
  {

    if ((document.getElementById("Australia").checked == false) && (document.getElementById("Canada").checked == false) && (document.getElementById("Denmark").checked == false) && (document.getElementById("USA").checked == false) && (document.getElementById("Undecided").checked == false))
    {
      document.getElementById('wish_to_migrate1').innerHTML = "Please Choose One Option";
      return false;
    }
    else
    {
      document.getElementById("wish_to_migrate1").innerHTML = "";

    }

    if ((document.getElementById("current_live1").checked == false) && (document.getElementById("current_live2").checked == false))
    {
      document.getElementById('current_live1_1').innerHTML = "Please Choose One Option";
      return false;
    }
    else
    {
      document.getElementById("current_live1_1").innerHTML = "";

    }


    if ((document.getElementById("plan1").checked == false) && (document.getElementById("plan2").checked == false) && (document.getElementById("plan3").checked == false))
    {
      document.getElementById('planning123').innerHTML = "Please Choose One Option";
      return false;
    }
    else
    {
      document.getElementById("planning123").innerHTML = "";

    }
    
    if ((document.getElementById("stillemploye").checked == false) && (document.getElementById("stillemploye1").checked == false))
    {
      document.getElementById('stillemploye2').innerHTML = "Please Choose One Option";
      return false;
    }
    else
    {
      document.getElementById("stillemploye2").innerHTML = "";

    }
    
    
     if (document.getElementById("Nationality").value == '')
    {
      document.getElementById('Nationality1').innerHTML = "Please Enter Nationality";

      document.getElementById("Nationality").focus();

      return false;
    }
    else
    {
      document.getElementById("Nationality1").innerHTML = "";
    }



 if (document.getElementById("currentjob").value == '')
    {
      document.getElementById('currentjob1').innerHTML = "Please Enter Current Job";

      document.getElementById("currentjob").focus();

      return false;
    }
    else
    {
      document.getElementById("currentjob1").innerHTML = "";
    }
    
    
    if (document.getElementById("Type_of_Visa").value == '')
    {
      document.getElementById('Type_of_Visa1').innerHTML = "Please Select Type of Visa";

      document.getElementById("Type_of_Visa").focus();

      return false;
    }
    else
    {
      document.getElementById("Type_of_Visa1").innerHTML = "";
    }




    abc1();


  }


  function abc1()
  {
  $('.step1').css('display', 'none');
	                $('.step2').css('display', 'none');
	                $('.step3').css('display', 'block');


    var form = $('#my_awesome_form2');
    var datasting = form.serialize();

    $('#centerLoader').show();
		setTimeout(function(){
			$("#my_awesome_form1").css({"opacity": "0.3"});
			$("#my_awesome_form2").css({"opacity": "0.3"});
			$("#my_awesome_form3").css({"opacity": "1"});
			$('#centerLoader').hide();
                      
		}, 3000);


  }

  function validate3()
  {
    var occupation = document.getElementById("job_title").value;
    if (occupation == '')
    {
      document.getElementById('job_title1').innerHTML = "Please Enter Your Occupation";

      document.getElementById("job_title").focus();

      return false;
    }
    else if (!isNaN(occupation))
    {

      document.getElementById('job_title1').innerHTML = "Please enter occupation";

      document.getElementById("job_title").focus();

      return false;
    }
    else
    {
      document.getElementById("job_title1").innerHTML = "";
    }

    if (document.getElementById("Qualifications").value == '')
    {
      document.getElementById('Qualifications1').innerHTML = "Please Select Your Qualifications";

      document.getElementById("Qualifications").focus();

      return false;
    }
    else
    {
      document.getElementById("Qualifications1").innerHTML = "";
    }


    if (document.getElementById("experience").value == '')
    {
      document.getElementById('experience1').innerHTML = "Please Select Your Experience";

      document.getElementById("experience").focus();

      return false;
    }
    else
    {
      document.getElementById("experience1").innerHTML = "";
    }
    
    if (document.getElementById("experiencemonth").value == '')
    {
      document.getElementById('experiencemonth1').innerHTML = "Please Select Your Experience month";

      document.getElementById("experiencemonth").focus();

      return false;
    }
    else
    {
      document.getElementById("experiencemonth1").innerHTML = "";
    }
    
    
    
    if (document.getElementById("experienceyear").value == '')
    {
      document.getElementById('experienceyear1').innerHTML = "Please Select Your Experience year";

      document.getElementById("experienceyear").focus();

      return false;
    }
    else
    {
      document.getElementById("experienceyear1").innerHTML = "";
    }

  if (document.getElementById("assistance").value == '')
    {
      document.getElementById('assistance1').innerHTML = "Please Select any field";

      document.getElementById("assistance").focus();

      return false;
    }
    else
    {
      document.getElementById("assistance1").innerHTML = "";
    }

if (document.getElementById("Relocation").value == '')
    {
      document.getElementById('Relocation1').innerHTML = "Please Select any field";

      document.getElementById("Relocation").focus();

      return false;
    }
    else
    {
      document.getElementById("Relocation1").innerHTML = "";
    }

if (document.getElementById("comments").value == '')
    {
      document.getElementById('comments1').innerHTML = "Please Enter your Address";

      document.getElementById("comments").focus();

      return false;
    }
    else
    {
      document.getElementById("comments1").innerHTML = "";
    }
    /* if (document.getElementById("english").value == '')
    {
      document.getElementById('english1').innerHTML = "Please Select Your English language ability";

      document.getElementById("english").focus();

      return false;
    }
    else
    {
      document.getElementById("english1").innerHTML = "";
    } */ 
	
	if ((document.getElementById("uploadCV").value != '')){
		var strFileExt	= document.getElementById("uploadCV").value;
		strFileExt		= strFileExt.split('.');
		var strFileExt	= strFileExt[strFileExt.length -1];
			
		if((strFileExt == 'pdf') || (strFileExt == 'doc') || (strFileExt == 'odt') || (strFileExt == 'docx')){
			document.getElementById('uploadCV1').innerHTML = "";
		}else{
			var answer = confirm('The file you have selected is not a valid file. Click on "Yes" if you wish to continue without a Resume. Else click on "Cancel" to upload a valid file ?');
            if (answer){
              
            }
            else{
              document.getElementById('uploadCV1').innerHTML = "Please upload a word, txt, rtf or pdf file only.";
              document.getElementById("uploadCV").val('');
              return false;
			}
		}
		
		
	}
	

    abc2();

  }

  $(document).ready(function(){
    var file = document.getElementById('uploadCV');
    file.onchange = function(e){
        var ext = this.value.match(/\.([^\.]+)$/)[1];
        switch(ext)
        {
            case 'pdf':
            case 'doc':
            case 'docx':
            case 'rtf':
            case 'txt':
            case 'txt':
              document.getElementById('uploadCV1').innerHTML = "";
              break;
            default:
              document.getElementById('uploadCV1').innerHTML = "Please upload a word, txt, rtf or pdf file only.";
              break;
        }
    };
  });
  
  $('#centerLoader').hide().ajaxStart(function(){
	  $(this).show();
  }).ajaxStop(function() {
	  $(this).hide();
  });
  
  
  function abc2(){
	$('#centerLoader').show();
	$('.step1').css('display', 'none');
	$('.step2').css('display', 'none');
	$('.step3').css('display', 'block');
	setTimeout(function(){
			abc2_final();
		},100);
  }
  
  function abc2_final()
  {
    
    var form2 = $('#my_awesome_form3');
    var datasting2 = new FormData(jQuery('#my_awesome_form3')[0]);;
	$('#centerLoader').hide();
			$("#my_awesome_form1").css({
			  "opacity": "0.3"
			});
			$("#my_awesome_form2").css({
			  "opacity": "0.3"
			});
			$("#my_awesome_form3").css({
			  "opacity": "0.3"
			});
	
	$.ajax({
		type: "POST",
		url: form2.attr('action'),
		data: datasting2,
		dataType: 'text',
		async: false,
		cache: false,
		contentType: false,
		processData: false,	  
		success: function(response) {
			
	
			
  
			window.location.href = 'http://global-migrate.infowiz.in/thank-you/';
			return false;
		},
		error: function(){
			window.location.href = 'http://global-migrate.infowiz.in/thank-you/';
		}
     });

    return false;
     
  } 
	
	