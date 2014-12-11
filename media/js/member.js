$(function(){
    $("#header .nav ul li").each(function() {
        $(this).removeClass("current_head_nav");
	});
	$("#member_li").addClass("current_head_nav");
	resize_layout1();
	/*
	$("#sidebar_nav_p1").accordion({
			autoHeight: false,
			navigation: true,
			collapsible: true
	});
	*/
});
function page_model() {
    var index;
}
function more(index) {
    var model = new page_model();
	model.index = index;
    $.ajax({
        url: "./ajax/research.php",
		type: 'POST',
		data: model,
		success: 
		    function(result){
			    $("#more").remove();	
                var html = $("#area").html();
                $("#area").html(html + result);	
                resize_layout1();				
            }
    });
}
function resize_layout1() {
    var height = $("#area").height() + 60;
	$("#main").height(height + 30);
	$("#content").height(height + 100);
}