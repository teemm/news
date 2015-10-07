this.imagePreview = function(){	
		xOffset = 10;
		yOffset = 30;
		
	$("li.preview").hover(function(e){
		var agwera = $(this).attr('rel');
	
		$("body").append("<p id='preview'>"+ agwera +"</p>");								 
		$("#preview").css("top",(e.pageY - xOffset) + "px").css("left",(e.pageX + yOffset) + "px").fadeIn("fast");						
    },
	function(){
		$("#preview").remove();
    });	
	$("li.preview").mousemove(function(e){
		$("#preview").css("top",(e.pageY - xOffset) + "px").css("left",(e.pageX + yOffset) + "px");
	});			
};

$(document).ready(function(){
	imagePreview();
});
