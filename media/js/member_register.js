$(function(){
	$("#submit").click(register);
});
function register() {
	var username = $("#username2").val();
	var password = $("#password2").val();
	var inviteCode = $("#inviteCode").val();
	var confirmPwd = $("#confirmPwd").val();
	var flag = false;
	$("#msgUsername").html("");
	$("#msgPassword").html("");
	$("#msgInviteCode").html("");
	if (username == "") {
    	$("#msgUsername").html("Input username!");
		$("#username2").focus();
	} else if (password == "") {
	    $("#msgPassword").html("Input password!");
		$("#password2").focus();
	} else if (inviteCode == "") {
	    $("#msgInviteCode").html("Input invite code!");
		$("#inviteCode").focus();
	} else if (username.indexOf("\'") != -1) {
	    $("#msgUsername").html("Invalid character!");
		$("#username2").focus();
	} else if (password.indexOf("\'") != -1) {
	    $("#msgNewPwd").html("Invalid character!");
		$("#password2").focus();
	} else if (inviteCode.indexOf("\'") != -1) {
	    $("#msgInviteCode").html("Invalid character!");
		$("#inviteCode").focus();
	} else if (password != confirmPwd) {
	    $("#msgPassword").html("Passwords do not match!");
		$("#confirmPwd").focus();
	} else {
	    flag = true;
	}
	if (flag) {
	    var model = new data();
		model.password = password;
		model.username = username;
		model.inviteCode = inviteCode;
		$.ajax({
		    url: "./ajax/member_register.php",
		    type: 'POST',
		    data: model,
		    success: 
		        function(result){
					$("#msgUsername").html("");
					$("#msgPassword").html("");
					$("#msgInviteCode").html("");
					switch (result) {
					    case '0': // succeed
						    alert("Register succeed! Please login and fill out your information!");
							window.location.href = 'index.php';
							break;
						case '1': // username existed
							$("#msgUsername").html("Username is existed!");
							break;
						case '2': // wrong invite code
						    alert("Wrong invite code!");
							break;							
					}
                }
		});
	}
}
function data() {
    var password;
	var username;
	var inviteCode;
}
