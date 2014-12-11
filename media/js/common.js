$(function(){
    $("#header .nav ul li").each(function() {
        $(this).removeClass("current_head_nav");
	});
	$("#clicks").html($("#clicks a").html());
	//resize_layout();
	$(".first_ul li").each(function(index) {
		var left = $(this).position().left - 10;
		var id = $(this).attr("id");
		$("#"+id+"_sec").css("left", left);
    	$(this).mouseover(function() {
			$("#"+id+"_sec").css("display", "block");
	    });
		$(this).mouseout(function() {
			$("#"+id+"_sec").css("display", "none");
	    });
	});
	$("#second_nav div").each(function() {
	    var id = $(this).attr("id");
		var index = id.lastIndexOf("_");
		var fa_id = id.substring(0, index);
    	$(this).mouseover(function() {
	        $(this).css("display", "block");
		    $("#"+fa_id+" a").addClass("ahover");
	    })
		$(this).mouseout(function() {
	        $(this).css("display", "none");
		    $("#"+fa_id+" a").removeClass("ahover");
	    });
	});
});

function list_page(request_page, tid) {
    var model = new page_model();
	model.request_page = request_page;
	model.tid = tid;
	$.ajax({
        url: "./util/list_page.php",
		type: 'POST',
		data: model,
		success: 
		    function(result){
			    $("#paper_items").css("display", "none");
    		    $("#paper_items").html(result).fadeIn("500");	
				resize_layout();			
            }
    });
}
function page_model() {
    var request_page;
	var current;
	var tid;
}
function resize_layout() {
    var height = $("#area").height() + 10;
	$("#main").height(height + 30);
	$("#content").height(height + 100);
}
function login() {
    var username = $("#username").val();
	var password = $("#password").val();
	var flag = false;
	if (username == "") {
    	$("#login_msg").html("Input username!");
	} else if (password == "") {
	    $("#login_msg").html("Input password!");
	} else if (username.indexOf("\'") != -1) {
	    $("#login_msg").html("Invalid character in username!");
	} else if (password.indexOf("\'") != -1) {
	    $("#login_msg").html("Invalid character in password!");
	} else {
	    $("#login_msg").html("");
	    flag = true;
	}
	if (flag) {
	    var model = new login_data(username, password);
		model.password = password;
		model.username = username;
		$.ajax({
		    url: "./ajax/login.php",
		    type: 'POST',
		    data: model,
		    success: 
		        function(result){
			    	if (result.indexOf("success") != -1) {
					    window.location.reload();
					} else {
					    $("#login_msg").html("Username or password is wrong!");
					}		
                }
		});
		
	}
}
function login_data(username, password) {
    var username = username;
	var password = password;
}
function logout() {
    $.ajax({
		url: "./ajax/logout.php",
	    type: 'POST',
		success: 
		    function(result){
				window.location.href = 'index.php';
            }
	});
}
$(function(){
    $("#login_submit").click(login);
    $("#logout").click(logout);
    $("#register").click(function () {
	    window.location.href = 'member_register.php';
	});
});