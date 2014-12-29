$(document).ready(function()
{
	
	$.ajax({
    url: '../Model/location_suggestion.php',
    dataType: 'json',
    success: function(data){
    $('#location').autocomplete(
    {
    source: data,
    minLength: 1    
    });
    }
          });
		  
});