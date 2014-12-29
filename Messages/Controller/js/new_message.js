


$(document).ready(function()
{ 
	function generate(type) {
        var n = noty({
            text        : type,
            type        : type,
            dismissQueue: true,
            layout      : 'bottomLeft',
            theme       : 'defaultTheme',
            maxVisible  : 10
        });
        console.log('html: ' + n.options.id);
    }
 	function generateAll() {
 		
        generate('Your message was sent successfully!');
    }
    function generateClaim() {
 		
        generate('You have claimed this offer!');
    }
     function generateYes() {
 		
        generate('You Accepted this request');
    }
        function generateNo() {
 		
        generate('You Declined this request');
    }
	 		           
 $('#element_to_pop_up').hide();
$('.button_sub').click(function() {
 	var message=$.trim($("textarea#message_popup").val());
 	var to_user=$.trim($("input#user_popup").val());
 	var from_user=$.trim($("input#from_user").val());
 	var dataString='to_user=' + to_user + '&message=' + message + '&from_user=' + from_user ;

 	jQuery.ajax({
 		type:"POST",
 		url:"../../Messages/Controller/send_pm.php",
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

$('.button_claim').click(function() {
		var clickedID = this.id.split('-'); //Split string (Split works as PHP explode)
		var offer_id = clickedID[1]; //and get number from array
	 	var to_user=clickedID[2]; 
	 	var from_user=$.trim($("input#from_user").val());
	 	var dataString='to_user=' + to_user + '&offer_id=' + offer_id + '&from_user=' + from_user ;
		jQuery.ajax({
 		type:"POST",
 		url:"../../Messages/Controller/claim_offer.php",
 		dataType:'text',
 		data:dataString,
 		success:function(info){     
 		generateClaim();
 		}	
 	});
});	

$('.button_yes').click(function() {
				var clickedID = this.id.split('-'); //Split string (Split works as PHP explode)
					var deleteid = clickedID[1]; //and get number from array
					var myData = 'deleteid='+ deleteid; //build a post data structure
				jQuery.ajax({
						type: "POST", // HTTP method POST or GET
						url: "../Controller/updateRequesttoAccepted.php", //Where to make Ajax calls
						dataType:"text", // Data type, HTML, json etc.
						data:myData, //Form variables
						success:function(info){
							//on success, hide  element user wants to delete.
							$('#item_'+deleteid).fadeOut("slow");
							$('#item2_'+deleteid).fadeOut("slow");
							generateYes();
						},
						error:function (xhr, ajaxOptions, thrownError){
							//On error, we alert user
							alert(thrownError);
						}
						});
});	
$('.button_no').click(function() {
		     		//e.returnValue = false;
				var clickedID = this.id.split('-'); //Split string (Split works as PHP explode)
					var deleteid = clickedID[1]; //and get number from array
					var myData = 'deleteid='+ deleteid; //build a post data structure
					
				jQuery.ajax({
						type: "POST", // HTTP method POST or GET
						url: "../Controller/deleteRequest.php", //Where to make Ajax calls
						dataType:"text", // Data type, HTML, json etc.
						data:myData, //Form variables
						success:function(info){
							//on success, hide  element user wants to delete.
							$('#item_'+deleteid).fadeOut("slow");
							$('#item2_'+deleteid).fadeOut("slow");
							generateNo();
						},
						error:function (xhr, ajaxOptions, thrownError){
							//On error, we alert user
							alert(thrownError);
						}
						});
			//	$('#item_'+deleteid).fadeOut("slow");*/
 	

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

