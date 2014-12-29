function email_ajax_validation(){

	var email = $("#email").val();
	
	if(email == "")
	{
		$("#email_status").html('<div class="info">Please enter your account username in the required field to proceed.</div>');
		$("#email").focus();
	}
	else
	{
		var dataString = 'check_email=' + email;
		$.ajax({
			type: "POST",
			url: "../Controller/check_email.php",
			data: dataString,
			cache: false,
			beforeSend: function()
			{
				
				$("#email_status").html('<br clear="all"><br clear="all"><div id="status" align="left"><font style="font-family:Verdana, Geneva, sans-serif; font-size:15px; color:black;">Please wait</font> <img id="loading" src="images/loadings.gif" alt="Loading...." align="absmiddle" title="Loading...."/></div><br clear="all">');
			
			},
			success: function(response)
			
				{
					$("#email_status").fadeIn("slow").html(response);
				}
			
		});
	}
		  
}