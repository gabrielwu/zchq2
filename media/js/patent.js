$(function(){
    $("#header .nav ul li").each(function() {
        $(this).removeClass("current_head_nav");
	});
	$("#publications_li").addClass("current_head_nav");

	$("#li_patent").addClass("current");
	resize_layout();
});
function page_model() {
    var index;
}
function more(index) {
    var model = new page_model();
	model.index = index;
    $.ajax({
        url: "./ajax/patent.php",
		type: 'POST',
		data: model,
		success: 
		    function(result){
			    $("#more").remove();	
                var html = $("#area").html();
                $("#area").html(html + result);	
                resize_layout();				
            }
    });
}