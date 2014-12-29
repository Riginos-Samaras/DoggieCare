


$(document).ready(function()
{ 
	function generate(type) {
        var n = noty({
            text        : type,
            type        : type,
            dismissQueue: true,
            layout      : 'bottomCenter',
            theme       : 'defaultTheme',
            maxVisible  : 10
        });
        console.log('html: ' + n.options.id);
    }
 	function generateAll() {
 		
        generate('Your message was sent successfully!');
    }
	 		           
$('.button_sub').click(function() {
 	var message=$.trim($("textarea#message_popup").val());
 	var to_user=$.trim($("input#user_popup").val());
 	var from_user=$.trim($("input#from_user").val());
 	var dataString='to_user=' + to_user + '&message=' + message + '&from_user=' + from_user ;
 	alert(dataString);
 	jQuery.ajax({
 		type:"POST",
 		url:"../../Messages/Controller/send_pm.php",
 		dataType:'text',
 		data:dataString,
 		success:function(info){
        generateAll();
        alert
 		}	
 	});



     
});

