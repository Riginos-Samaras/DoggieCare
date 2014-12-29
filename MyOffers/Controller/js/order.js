
$(document).ready(function(){ 
	$(function() {
		$("#contentLeft ul").sortable({ opacity: 0.9, cursor: 'move', update: function() {
			
			var order = $(this).sortable("serialize") + '&action=updateRecordsListings';
			$.post("../Controller/update_order.php", order, function(theResponse){
				$("#contentRight").html(theResponse);
			});
		}
		});
	});

});
