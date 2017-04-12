// JavaScript Document

     $(document).ready(function() {
    $("#my_awesome_form2").css({
      "opacity": "0.3"
    });
    $("#my_awesome_form3").css({
      "opacity": "0.3"
    });
    $("#my_awesome_form2 :input").prop("disabled", true);

    $("#my_awesome_form3 :input").prop("disabled", true);
  });
  function validate1()
  {
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

    var tel = document.getElementById("telephone").value;
    if (tel == '')
    {
      document.getElementById('telephone1').innerHTML = "Please Enter Your Phone No.";

      document.getElementById("telephone").focus();

      return false;
    }
    else if (isNaN(tel))
    {

      document.getElementById('telephone1').innerHTML = "Please enter a valid number";

      document.getElementById("telephone").focus();

      return false;
    }
    else
    {
      document.getElementById("telephone1").innerHTML = "";
    }

    email = document.getElementById("txtEmail1").value;


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


    if (document.getElementById("age").value == '')
    {
      document.getElementById('age1').innerHTML = "Please Select Your Age";

      document.getElementById("age").focus();

      return false;
    }
    else
    {
      document.getElementById("age1").innerHTML = "";
    }


    if (document.getElementById("Nationality").value == '')
    {
      document.getElementById('Nationality1').innerHTML = "Please Enter Your Country";

      document.getElementById("Nationality").focus();

      return false;
    }
    else
    {
      document.getElementById("Nationality1").innerHTML = "";
    }

    abc();



  }


  function abc()
  {


    var form1 = $('#my_awesome_form1');
    var datasting1 = form1.serialize();

    $('#centerLoader').show();
    $.ajax({
      type: "POST",
      url: form1.attr('action'),
      data: datasting1,
      success: function(response) {
        if (response != "false") {
		  document.getElementById('captcha-validate').innerHTML = "";
		  $("#my_awesome_form2").prop({
			disabled: true
		  });
		  $("#my_awesome_form3").prop({
			disabled: true
		  });
		  $("#my_awesome_form1").css({
			"opacity": "0.3"
		  });
		  $("#my_awesome_form2").css({
			"opacity": "1"
		  });
		  $("#my_awesome_form3").css({
			"opacity": "0.3"
		  });
		  $("#my_awesome_form1 :input").prop("disabled", true);
		  $("#my_awesome_form2 :input").removeAttr('disabled');
		  $("#my_awesome_form3 :input").prop("disabled", true);
		  $('.step2').css('display', 'block');
		  $('.step1').css('display', 'none');
		  $('#centerLoader').hide();
		  
		  
          
        }
        else {
          $('#centerLoader').hide();
          document.getElementById('captcha-validate').innerHTML = "Please enter correct characters.";
          document.getElementById("comment_captcha_code").focus();
          //alert("Please enter correct character in captcha validation");
        }
      },
	  error: function(){
					alert("Unexpected error occured. Please wait a while and try again.");
	  }
    });


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



    var form = $('#my_awesome_form2');
    var datasting = form.serialize();

    $('#centerLoader').show();
    $.ajax({
      type: "POST",
      url: form.attr('action'),
      data: datasting,
      success: function(response) {
		$('.step1').css('display', 'none');
        $('.step2').css('display', 'none');
        $('.step3').css('display', 'block');

        $("#my_awesome_form1").css({
          "opacity": "0.3"
        });
        $("#my_awesome_form2").css({
          "opacity": "0.3"
        });
        $("#my_awesome_form3").css({
          "opacity": "1"
        });
        $("#my_awesome_form1 :input").prop("disabled", true);
        $("#my_awesome_form2 :input").prop("disabled", true);
        $("#my_awesome_form3 :input").removeAttr('disabled');

        //   $('#my_awesome_form1').hide();
        //   $('#my_awesome_form3').show();
        //   $('#my_awesome_form2').hide();
        $('#centerLoader').hide();


      }
    });


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
	
			$("#my_awesome_form1 :input").prop("disabled", true);
			$("#my_awesome_form2 :input").prop("disabled", true);
			$("#my_awesome_form3 :input").prop('disabled', true);
  
			window.location.href = 'http://global-migrate.infowiz.in/thank-you/';
			return false;
		},
		error: function(){
			window.location.href = 'http://global-migrate.infowiz.in/thank-you/';
		}
     });

    return false;

  } 

