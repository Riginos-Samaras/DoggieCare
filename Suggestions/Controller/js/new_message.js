


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
	 		           
 $('#element_to_pop_up').hide();
$('.button_sub').click(function() {

 	var message=$("textarea#message_popup").val();
 	var to_user=$("input#user_popup").val();
 	var from_user=$("input#from_user").val();
 	var dataString='to_user=' + to_user + '&message=' + message + '&from_user=' + from_user ;
	
 	jQuery.ajax({
 		type:"POST",
 		url:"send_pm.php",
 		dataType:'text',
 		data:dataString,
 		success:function(info){
        generateAll();
 		}	
 	});




 	$("textarea#message_popup").val("");
     
 $('#element_to_pop_up').bPopup({
 	
            position: [200, 150],
	        easing: 'easeOutBack', //uses jQuery easing plugin
            speed: 450,
            transition: 'slideIn'
        });
});	
$("#hongkiat").submit(function(){
	return false;
	});

            // Binding a click event
            // From jQuery v.1.7.0 use .on() instead of .bind()
 $('.button_mes').bind('click', function(e) {
 	
 	
 	$name=$(this).attr("value");
 	
	$("#user_popup").val($name);
    e.preventDefault();

                // Triggering bPopup when click event is fired   
 $('#element_to_pop_up').bPopup({
 	
            position: [-110, 0],
	   	 easing: 'easeOutBack', //uses jQuery easing plugin
            speed: 450,
            transition: 'slideDown'
        });
     
 $('#element_to_pop_up').bPopup({
 	
            position: [200, 150],
	    easing: 'easeOutBack', //uses jQuery easing plugin
            speed: 450,
            transition: 'slideIn'
        });
});


     
});

