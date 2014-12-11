$(function(){
    $("#header .nav ul li").each(function() {
        $(this).removeClass("current_head_nav");
	});
	$("#index_li").addClass("current_head_nav");
	
	$("#sidebar_nav_1").accordion({
			autoHeight: false,
			navigation: true,
			collapsible: true
	});
	$("#sidebar_nav_2").accordion({
			autoHeight: false,
			navigation: true,
			active: false,
			collapsible: true
	});
	$("#sidebar_nav_3").accordion({
			autoHeight: false,
			navigation: true,
			active: false,
			collapsible: true
	});
	$("#sidebar_nav_4").accordion({
			autoHeight: false,
			navigation: true,
			collapsible: true
	});
	$("#sidebar_nav_1 h3").unbind("click");
	$("#sidebar_nav_4 h3").unbind("click");
	$("#clicks").html($("#clicks a").html());
});
function resize_layout() {
    var height = 1054;
	$("#main").height(height + 30);
	$("#content").height(height + 100);
}
resize_layout();