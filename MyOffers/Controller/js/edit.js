$(document).ready(function()
{ 



$(".offer_type").editable('save.php', { 
     data   : " {'Consumer':'Consumer','Provider':'Provider', 'selected':'Consumer'}",
     type   : 'select',
     cancel    : 'Cancel',
     submit    : 'OK',
    style  : "inherit"
    
 });
 
  $('.description').editable('save.php', { 
         type      : 'textarea',
         cancel    : 'Cancel',
         submit    : 'OK',
         indicator : '<img src="img/indicator.gif">',
         tooltip   : 'Click to edit...'
     });
 
 $('.location').editable('save.php', {
         indicator : '<img src="img/indicator.gif">',
         cancel    : 'Cancel',
     	 submit    : 'OK',
         tooltip   : 'Click to edit...'
     });
 
 $(".datee").editable('save.php', {
         indicator : '<img src="img/indicator.gif">',
         cancel    : 'Cancel',
     	 submit    : 'OK',
         tooltip   : 'Click to edit...'
     });
     
 $(".startTime").editable("save.php", { 
        indicator : "<img src='img/indicator.gif'>",
        submit    : 'OK',
        tooltip   : "Click to edit..."
    });
  
 $(".endTime").editable("save.php", { 
        indicator : "<img src='img/indicator.gif'>",
        submit    : 'OK',
        tooltip   : "Click to edit..."
    });
 
  $(".reward").editable("save.php", { 
        indicator : "<img src='img/indicator.gif'>",
        submit    : 'OK',
        tooltip   : "Click to edit..."
    });
    
  $(".service").editable("save.php", { 
        data   : " {'walking':'walking','sitting':'sitting','cleaning':'cleaning', 'selected':'walking'}",
	    type   : 'select',
	    cancel    : 'Cancel',
	    submit    : 'OK',
	    style  : "inherit",
	    callback : function(data) {
         var oid=this.id.split('_');
         var service=oid[2];
         var offerid=oid[1];
        
         var newsrc="../View/img/"+data;
         $('.serviceIcon_'+offerid).fadeOut("slow", function(){
         	
         	$('.serviceIcon_'+offerid).attr('src', newsrc);
         	$('.serviceIcon_'+offerid).fadeIn("slow");
         });
         
         
         
     }
    });
 
});