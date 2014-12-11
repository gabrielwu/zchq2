$(function(){
    $("#m_nav_li a").addClass("current");
	$("#submit").click(modifyPassword);
});
function modifyPassword() {
	var oldPwd = $("#oldPwd").val();
	var newPwd = $("#newPwd").val();
	var confirmPwd = $("#confirmPwd").val();
	var flag = false;
	if (oldPwd == "") {
    	$("#msgNewPwd").html("");
    	$("#msgOldPwd").html("Input password!");
	} else if (newPwd == "") {
    	$("#msgOldPwd").html("");
	    $("#msgNewPwd").html("Input new password!");
	} else if (oldPwd.indexOf("\'") != -1) {
    	$("#msgNewPwd").html("");
	    $("#msgOldPwd").html("Invalid character!");
	} else if (newPwd.indexOf("\'") != -1) {
    	$("#msgOldPwd").html("");
	    $("#msgNewPwd").html("Invalid character!");
	} else if (newPwd != confirmPwd) {
    	$("#msgOldPwd").html("");
	    $("#msgNewPwd").html("Passwords do not match!");
	} else {
	    $("#msgNewPwd").html("");
	    $("#msgOldPwd").html("");
	    flag = true;
	}
	if (flag) {
	    var model = new data(oldPwd, newPwd);
		model.oldPwd = oldPwd;
		model.newPwd = newPwd;
		$.ajax({
		    url: "./ajax/modify_password.php",
		    type: 'POST',
		    data: model,
		    success: 
		        function(result){
					$("#msgNewPwd").html("");
					$("#msgOldPwd").html("");
					switch (result) {
					    case '0':
						    alert("Modify succeed!");
							break;
						case '1':
							$("#msgOldPwd").html("Wrong!");
							break;
						case '2':
						    alert("Modify failed!");
							break;
						case '3':
						    alert("Modify failed!");
							break;
							
					}
                }
		});
	}
}
function data() {
    var oldPwd;
	var newPwd;
}
