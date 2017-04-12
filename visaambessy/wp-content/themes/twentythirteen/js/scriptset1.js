function is_email(email)
{
	if(!email.match(/^[A-Za-z0-9\._\-+]+@[A-Za-z0-9_\-+]+(\.[A-Za-z0-9_\-+]+)+$/))
	return false;
	return true;
}


function registerForm() 
{
	if(document.contact.txt_name.value == "" ) 
	{
		alert("Name can not be Blank !");
		return false;
		document.contact.txt_name.focus();
		
	} 
	
	else if(document.contact.txt_email.value == "" ) 
	{
		alert("E-Mail can not be Blank !");
		document.contact.txt_email.focus();
		return false;
	} 
	else if(! is_email( document.contact.txt_email.value))
	{
		alert("Email Address should be Valid Format !");
		document.contact.txt_email.focus();
		return false;
	} 
	
	
	
        else if(document.contact.txt_phone.value == "" ) 
	{
		alert("contact no.can not be Blank !");
		document.contact.txt_phone.focus();
		return false;
	} 
	
	   
	

		else
	  {	   
		   document.contact.method="post";
		 document.contact.action="request2.php";
		  document.contact.submit(); 
		    return true;
	   }
}
	
	
	
