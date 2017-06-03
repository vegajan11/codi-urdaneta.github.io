
$(document).ready(function(){

var singing = $("#singing");
var dancing = $("#dancing");
var play = $("#play");
var acting = $("#acting");
var cooking = $("#cooking");
var driving = $("#driving");
var electrician = $("#electrician");
var plumbing = $("#plumbing");
var carpentry = $("#carpentry");
var interior = $("#interior");
var emcee = $("#emcee");
var visual = $("#visual");
var userID = $("#userID");

play.change(updateskill);
acting.change(updateskill);
cooking.change(updateskill);
driving.change(updateskill);
electrician.change(updateskill);
plumbing.change(updateskill);
carpentry.change(updateskill);
interior.change(updateskill);
emcee.change(updateskill);
visual.change(updateskill);
singing.change(updateskill);
dancing.change(updateskill);
	function updateskill(){
		if($(this).is(':checked')){

			var action = "add";
		}else {

			var action = "delete";
		}
		var skill = $(this).val();
		var memberid = userID.val();
		$.post('updateskill.php',{skill:skill, action:action, memberid:memberid}, function(data){
			var something;
		});
	};



});	

