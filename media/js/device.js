function page_model() {
    var index;
}
function more(index) {
    var model = new page_model();
	model.index = index;
    $.ajax({
        url: "./ajax/device.php",
		type: 'POST',
		data: model,
		success: 
		    function(result){
			    $("#more").remove();	
                var html = $("#r_area").html();
                $("#r_area").html(html + result);	
                resize_layout();				
            }
    });
}