$(function(){

$(".loginsubmit").click(function() {
	$.ajax({
		type: "POST",
		url: base_url+''+lang+'/admin/login',
		data: {
			"email" : $("[name='email']").val(), 
			"password" : $("[name='password']").val(),
		},
		dataType: "json",
		success: function(data) {
			if (data.code == 1){
			location.reload();
			}	
			if (data.code == 2){ 
			alert(data.text)
			}	
	if (data.code == 0){ 
			alert(data.text)
			}	
			
	if (data.code == 3){ 
			alert(data.text);
			}
		}
});
});

$('.logininput').keydown(function (e){
    if(e.keyCode == 13){
      $('.loginsubmit').trigger('click');
    }
})

});