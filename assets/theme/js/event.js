

$(document).ready(function(){
var idhidden = $("#idhidden");
var eventId = $("#eventId");
var eventDate = $("#eventDate");
var eventType = $("#eventType");
var speaker = $("#speaker");
var title = $("#title");
var eventText = $("#eventText");
var venue = $("#venue");
var eventButton = $("#eventButton");

eventDate.change(checkEvent);
eventType.change(checkEvent);


function checkEvent(){
		
	var edate = eventDate.val();
	var etype = eventType.val();
	$.post('eventCheck.php',{edate:edate, etype:etype}, function(data){

			if (data == ""){
				eventButton.val('CREATE');
				idhidden.val('CREATE');		
				eventId.val('');
				speaker.val('');	
				title.val('');	
				eventText.val('');	
				venue.val('');					
			} else {
				eventButton.val('UPDATE');
				idhidden.val('UPDATE');				
				data = $.parseJSON(data); 
				eventId.val(data[0].eventId);
				speaker.val(data[0].speaker);	
				title.val(data[0].title);	
				eventText.val(data[0].textRef);	
				venue.val(data[0].venue);					
			}
		});
	}


});	

