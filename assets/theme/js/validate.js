
$(document).ready(function(){

var form = $("#joinForm");
var lastName = $("#lastName");
var firstName = $("#firstName");
var userName = $("#userName");
var password = $("#password");
var confirmPass = $("#confirmPass");
var dateOfBirth = $("#dateOfBirth");
var male = $("#optionsRadios1");
var female = $("#optionsRadios2");
var state = false;
var errormsg;
errormsg = "";

firstName.keyup(autoDefault);
dateOfBirth.change(autoDefault);

function validateUserName(){

if (firstName.val()==''){
	firstName.addClass("has-error");
}else{
	firstName.removeClass("has-error");
}

if (lastName.val()==''){
	lastName.addClass("has-error");
}else{
	lastName.removeClass("has-error");
}

		if(userName.val().length <=4){

			userName.addClass("has-error");
			state = false;
		}else {
			if(userName.val().length > 4 ){
					
					var uname = userName.val();
					var lname = lastName.val();
					var fname = firstName.val();										

$.ajax({
			type: "POST",
			url: "validate.php",
			data: {UserName:uname,LastName:lname,FirstName:fname},
			success: function(data) {
					if (data == 1) {
						bootbox.alert ('Someone\'s already using this username.');

								state = false;
					}

					if (data == 2) {
						bootbox.alert ('The name you are trying to register has already been registered.');

								state = false;
					}
					if (data == 0) {
						state = true;
					}
				
			}
			
			
			
		});	
			}
		}
	return state;
}

	

function validateDOB(){

	if(dateOfBirth.val()=='') {
		
							dateOfBirth.addClass("has-error");

							state = false;
	}else{
		dateOfBirth.removeClass("has-error");
							state = true;		
				}
	return state;
	}



	
function validatePass1(){

	if(password.val().length < 5) {
		
							password.addClass("has-error");

							state = false;
	}else{
		password.removeClass("has-error");
							state = true;		
				}
	return state;
	}
	
function validatePass2(){

	if(password.val() != confirmPass.val()) {
		

							confirmPass.addClass("has-error");
							state = false;
	}else{
								confirmPass.removeClass("has-error");
							state = true;		
				}
	return state;
	}

function validateGender(){
	if ($("input[name=sex]:checked").length<=0) {

							$('#genderdiv').addClass("has-error");

							state = false;
	}else{
						$('#genderdiv').removeClass("has-error");
							state = true;		
				}
	return state;
	}
	
function autoDefault(){
	var ddate = dateOfBirth.val().split('-')[2];
	var fword = firstName.val();
	userName.val(fword.split(' ')[0]+ddate);
}

$("#join").click(function(){

//	var all = $(form).serialize();

	if(( validateGender() & validateDOB() & validatePass1() & validatePass2() & validateUserName()) == true){

		$('#joinForm').submit();

	}

});	

});