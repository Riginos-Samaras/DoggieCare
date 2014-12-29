$(document).ready(function()
{
	var del_id=2;

	alert(del_id);
	
		   $.ajax({
            type:'POST',
            url:'../Controller/deleteMessage.php',
            data: delete_id : del_id,
            success:function(data) {
                if(data == "YES") {
                   rowElement.fadeOut(500).remove();
                } 
                else {

                }   
            }
    });

});
