$(document).ready(function(){

var eventId = $("#event");
var event = eventId.val();

$("#alertbox").hide();
$('body').on("mouseover", "tr.myRow", function(){

$('#memberphoto').show();


	var userId = this.cells[0].innerHTML;
	var adminId = this.cells[1].innerHTML;
	var eventId = this.cells[2].innerHTML;
	
	$.post('searchphoto.php',{userId:userId}, function(data){
	document.getElementById('memberphoto').innerHTML = data;
	});
});

$('body').on("mouseout", "tr.myRow", function(){

$('#memberphoto').hide();


	
});

$('body').on("click", "tr.myRow", function(){

	var userId = this.cells[0].innerHTML;
	var adminId = this.cells[1].innerHTML;
	var eventId = this.cells[2].innerHTML;
	
	$.post('checkIn.php',{userId:userId, adminId:adminId, eventId:eventId}, function(data){
                      document.getElementById('msg').innerHTML = data;
                      $("#alertbox").show('fast').delay('1200');
                      $("#alertbox").hide('slow');

	});


	$.post('attendanceview.php',{eventId:eventId}, function(data2){
		 document.getElementById('attendance-display').innerHTML = data2;
	});

});


$('body').on("click", "tr.present", function(){

	var recId = this.cells[0].innerHTML;
	var memberName = this.cells[1].innerHTML;
	
bootbox.confirm("This will mark " + memberName +" as absent.", function(result){
	console.log('This was logged in the callback: ' + result);

	if (result==true){
		$.post('markAbsent.php',{recId:recId}, function(data){
		bootbox.alert(data);

	});

		$.post('attendanceview.php',{eventId:event}, function(data2){
		 document.getElementById('attendance-display').innerHTML = data2;

	});
	}
	
	
});



});

$.post('attendanceview.php',{eventId:event}, function(data2){
		 document.getElementById('attendance-display').innerHTML = data2;
	});

});