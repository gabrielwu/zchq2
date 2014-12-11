$(function(){
    $("#header .nav ul li").each(function() {
        $(this).removeClass("current_head_nav");
	});
	$("#publications_li").addClass("current_head_nav");

	resize_layout();
});
function more(index, year, currentDisplayYear) {
    var model = new page_model();
	model.index = index;
	model.year = year;
	model.currentDisplayYear = currentDisplayYear;
    $.ajax({
        url: "./ajax/publications.php",
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
function more_highlighted(index, currentDisplayYear) {
    var model = new page_model();
	model.index = index;
	model.currentDisplayYear = currentDisplayYear;
    $.ajax({
        url: "./ajax/highlightedPapers.php",
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
function more_citation(index, currentDisplayYear) {
    var model = new page_model();
	model.index = index;
	model.currentDisplayYear = currentDisplayYear;
    $.ajax({
        url: "./ajax/citationPapers.php",
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
function page_model() {
    var index;
	var year;
	var currentDisplayYear;
}
function more_journalCovers(index) {
    var model = new page_journalCovers();
	model.index = index;
    $.ajax({
        url: "./ajax/journal_covers.php",
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
function page_journalCovers() {
    var index;
}