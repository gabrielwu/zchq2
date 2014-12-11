$(function(){
    $("#p_nav_li a").addClass("current");
	$("#submit").click(modifyInfo);
	resize_layout1();
});
function resize_layout1() {
    var height = $("#area").height() + 10;
	$("#main").height(height + 30);
	$("#content").height(height + 200);
}
function modifyInfo() {
    editor.sync();
	var username = $("#username").val();
	var cname = $("#cname").val();
	var ename = $("#ename").val();
	var grade = $("#grade").val();
	var title = $("#title").val();
	var email = $("#email").val();
	var tel = $("#tel").val();
	var addr = $("#addr").val();
	var detail = $("#detail").val();
	var flag = true;
	if (flag) {
	    var model = new data();
		model.username = username;
		model.cname = cname;
		model.ename = ename;
		model.grade = grade;
		model.title = title;
		model.email = email;
		model.tel = tel;
		model.addr = addr;
		model.detail = detail;
		$.ajax({
		    url: "./ajax/modify_member_info.php",
		    type: 'POST',
		    data: model,
		    success: 
		        function(result){
					switch (result) {
					    case '0':
						    alert('Modify succeed!');
							window.location.reload();
							break;
					    case '1':
						    alert('Modify failed! Username exists!');
							$("#username").focus();
							break;
					    case '2':
						    alert('Username modify succeed, but others failed!');
							window.location.reload();
							break;
					}
                }
		});
	}
}
function data() {
    var username;
	var cname;
	var ename;
	var grade;
	var title;
	var email;
	var addr;
	var tel;
	var detail;
}
