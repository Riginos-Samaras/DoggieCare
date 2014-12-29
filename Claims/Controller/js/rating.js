$(function() {
					$.fn.raty.defaults.path = '../Controller/js/img';
					
					$('.star').raty({ 
						number: 5,
						score: function() {
   						 return $(this).attr('data-score');
   						 
 						 },
						
						size     : 24,
						starHalf : 'star-half.png',
						starOff  : 'star-off.png',
						starOn   : 'star-on.png',
						hints: ['Bad', 'Poor', 'Neutral', 'Good', 'Excellent'],
						half: true,
						click: function(score, evt) {
					    
					    var clickedID = $(this).attr('offerid'); 
					 	
						var myData = 'id='+ clickedID + '&score='+score; //build a post data structure
					 	
						jQuery.ajax({
						type: "POST", // HTTP method POST or GET
						url: "../Controller/save.php", //Where to make Ajax calls
						dataType:"text", // Data type, HTML, json etc.
						data:myData, //Form variables
						success:function(response){
							//on success, hide  element user wants to delete.
							
						},
						error:function (xhr, ajaxOptions, thrownError){
							//On error, we alert user
							alert(thrownError);
						}
						});
					  }
					});


				});