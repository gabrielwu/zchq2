$(function(){
    $("#header .nav ul li").each(function() {
        $(this).removeClass("current_head_nav");
	});
	$("#research_li").addClass("current_head_nav");
	
	$("#sidebar_nav_r1").accordion({
			autoHeight: false,
			navigation: true,
			collapsible: true
	});
	
	fancyboxInit();
	$("#r_nav_li a").addClass("current");
	resize_layout();
});
function fancyboxInit() {
	$("#r_area img").each(function() {
	    $(this).attr("title",'点击查看大图');
	    var ori = $(this).parent().html();
	    var title = $(this).parent().next().text();
		if (title.indexOf("图片") == -1) {
		    title = "";
		} 
		var html = "<a rel='example_group' title='"+title+"' href='"+$(this).attr("src")+"'>";
		html = html + ori;
		html = html + "</a>";
	    $(this).parent().html(html);
	});
	$("a[rel=example_group]").fancybox({
		'transitionIn'		: 'none',
		'transitionOut'		: 'none',
		'showNavArrows'     :  false
    });
}