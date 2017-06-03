var password = document.getElementById("password") , confirmPass = document.getElementById("confirmPass");

function validatePassword(){
	if(password.value != confirmPass.value){
		confirmPass.setCustomValidity("Passwords don't match.")
	} else {
		confirmPass.setCustomValidity('');
	}
}

password.onchange = validatePassword;
confirmPass.onkeyup = validatePassword;