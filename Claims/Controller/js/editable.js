$(document).ready(function() {
	alert("HEllo");
    //toggle `popup` / `inline` mode
    $.fn.editable.defaults.mode = 'popup';     
    
   
    //make username editable
    $('#username').editable();
    $('#test').on('click',function(){
    	alert(":");
		
	});
     $('table#username').editable();
    
    //make status editable
    $('.txtinput1>#the_tables>#the_tables2>#status').editable({
        type: 'select',
        title: 'Select status',
        placement: 'right',
        value: 2,
        source: [
            {value: 1, text: 'Doggie walking'},
            {value: 2, text: 'Doggie sitting'},
            {value: 3, text: 'Doggie cleaning'}
        ]
        /*
        //uncomment these lines to send data on server
        ,pk: 1
        ,url: '/post'
        */
    });
    
     $('.txtinput1>#the_tables>#the_tables2>#username1').editable();
});