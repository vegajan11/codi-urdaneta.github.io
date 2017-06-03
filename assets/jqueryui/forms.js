
$(document).ready(function(){
$('#formeventcontainer').hide();
$("#addeventbtn").click(function(){
	$('#formeventcontainer').attr('title','Add Event').dialog({width:850, 
	closeOnEscape: false, draggable: false, resizable: false, show:'fade', modal:true});
});

$("#refresh").click(function(){
	
	
	
});

var form = $("#customForm");
var name = $("#name");
var nameInfo = $("#nameInfo");
var email = $("#email");
var emailInfo = $("#emailInfo");
var pass1 = $("#pass1");
var pass1Info = $("#pass1Info");
var pass2 = $("#pass2");
var pass2Info = $("#pass2Info");
var state = false;


name.keyup(validateName);
email.keyup(validateEmail);
pass1.keyup(validatePass1);
pass2.keyup(validatePass2);


function validateName(){
		if(name.val().length <=4){
			name.removeClass("valid");
			nameInfo.removeClass("valid");
			name.addClass("error");
			nameInfo.addClass("error");
			nameInfo.text("We want names with more than 4 letters");
			state = false;
		}else {
			if(name.val().length > 4 ){
					
					var uname = name.val();
					$.post('validate.php', {names:uname}, function(data){
				
						if(data!=0){
							
							name.removeClass("valid");
							nameInfo.removeClass("valid");
							name.addClass("error");
							nameInfo.addClass("error");
							nameInfo.text("This name is already registered!");
							state = false;
						}else{
							name.removeClass("error");
							nameInfo.removeClass("error");
							name.addClass("valid");
							nameInfo.addClass("valid");
							nameInfo.text("Name available!");
							state = true;	
							
						}
						
					});
		
			}
			
		}
	
	return state;
}

	
function validateEmail(){
	var a = email.val();
	var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z-0-9]{2,4}$/;

	if(filter.test(a)){
		$.post('validate.php', {email:a}, function(data){
			
				if(data==1){
							email.removeClass("valid");
							emailInfo.removeClass("valid");
							email.addClass("error");
							emailInfo.addClass("error");
							emailInfo.text("Please type a valid email.");	
							state = false;
				}else{
							email.removeClass("error");
							emailInfo.removeClass("error");
							email.addClass("valid");
							emailInfo.addClass("valid");
							emailInfo.text("Email available");
							state = true;		
				}
		});
	} 
	else {
							email.removeClass("valid");
							emailInfo.removeClass("valid");
							email.addClass("error");
							emailInfo.addClass("error");
							emailInfo.text("Please type a valid email.");	
							state = false;
		
	}
	return state;
	}
	
function validatePass1(){

	if(pass1.val().length < 5) {
		
							pass1.removeClass("valid");
							pass1Info.removeClass("valid");
							pass1.addClass("error");
							pass1Info.addClass("error");
							pass1Info.text("Password must be at least 5 char!.");	
							state = false;
	}else{
		
							pass1.removeClass("error");
							pass1Info.removeClass("error");
							pass1.addClass("valid");
							pass1Info.addClass("valid");
							pass1Info.text("OK!");
							validatePass2();
							state = true;		
				}
	return state;
	}
	
function validatePass2(){

	if(pass1.val() != pass2.val()) {
		
							pass2.removeClass("valid");
							pass2Info.removeClass("valid");
							pass2.addClass("error");
							pass2Info.addClass("error");
							pass2Info.text("password not match");	
							state = false;
	}else{
		
							pass2.removeClass("error");
							pass2Info.removeClass("error");
							pass2.addClass("valid");
							pass2Info.addClass("valid");
							pass2Info.text("OK!");

							state = true;		
				}
	return state;
	}
	
	
	

$("#send").click(function(){
	var all = $(form).serialize();
	if((validateName() & validateEmail() & validatePass1() & validatePass2())== true){
		$.ajax({
			type: "POST",
			url: "insert.php",
			data: all,
			success: function(data) {
				if(data ==1){
					alert("Success! You have registered!");
					
				}else{
					alert("You have errors");
				}
				
			}
			
			
			
		});	
	}else{
		alert("Check your errors!");
	
	}

});	
	
});