$(function(){
$('.search').bind('input', function() {
  	id = $(this).val();
	$(".info tr").hide();
	$(".info tr:first-child").show();
	$('#'+id).show();
	if (id=='') {  	$(".info tr").show();}
});

$('.searchname').bind('input', function() {
  	name = $(this).val();
	$(".info tr").hide();
	$(".info tr:first-child").show();

	$(".info tr").each(function() {
	var klasi = $(this).attr('class');
	if (klasi){
	 if ( klasi.indexOf(name) !== -1 ){
      $(this).show();      
    }
	}
});
});


tinymce.init({
	selector: "textarea",
	width: '870px',
	height: '600px',
	menubar: false,
       plugins: [
                "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "table contextmenu directionality emoticons template textcolor paste fullpage textcolor"
        ],

        toolbar1: "bullist | bold italic underline | alignleft aligncenter alignright alignjustify | forecolor media removeformat",
	
relative_urls: false
   
});








chw();

function chw(){
 		var id = $('[name="languageChoose"]').val();
		if(id == 1){		
			$("tr.langen").hide('fast');
			$("tr.langge").show('fast');
		} else{
			$("tr.langge").hide('fast');
			$("tr.langen").show('fast');
		}
}

$('[name="languageChoose"]').change('select', function() {
		var id = $(this).val();
		if(id ==1){		
			$("tr.langen").hide('fast');
			$("tr.langge").show('fast');
		} else{
					$("tr.langge").hide('fast');
			$("tr.langen").show('fast');
		}

});

$('.language a').click(function() {

	var klasi = $(this).attr('class');
	if ($(this).hasClass('active')) { return false; }
	$('.language a').removeClass('active');
	$(this).addClass('active');
	$('.langge, .langen').hide();

	
	 $(".lang"+klasi).each(function() {
	 var new_class = $(this).attr('class');
	 var length = new_class.length;
	 if (new_class.length=='6'){
	$(this).show();
	}
	else {
	var val = parseInt($('.hideval').val());

	 if (val==3){
	 	 $('.'+klasi+'2').show('fast');
	}
	  $('.'+klasi+val).show('fast');
	 
	 }
    });
	
});

$(".added").live({click:function() {
	var amogeba = parseInt($('.hideval').val());
	$('.hideval').val(amogeba+1);
	var id = $(this).attr('id');
	
	var axali_id = id.slice(2,3);
	$('#ge'+axali_id).hide();
	$('#en'+axali_id).hide();
	$('#ru'+axali_id).hide();

	$('.'+id+'').fadeIn();
}
});

$('#removepicture').click(function() {

$('#removepicture').remove();
$('#pictinput').remove();
$('#UploadImages').fadeIn();

});

$('#removepictures').click(function() {

$('#removepictures').remove();
$('#pictinputs').remove();
$('#UploadImagess').fadeIn();

});

	$("#ajax input[type='checkbox'], #ajax1 input[type='checkbox']").live({click:function() {
	var	id = $(this).attr('id');

var	clas = $(this).attr('class');
 var rel = $(this).closest('tr').attr('rel'); 
 
	if($(this).is(':checked')){	var text=1;	}else { text=0; }

		
	
		$.ajax({
				type: "POST",
				url: base_url+""+lang+"/admin/editmenu",
				data: {
					"id": id,
					"text": text,
					"rel": rel,
					"clas": clas
				},
				dataType: "json",
				success: function(data) {}
			});
			
	}});

	$("#ajax input[type!='checkbox'], #ajax1 input[type!='checkbox']").live({focus:function() {
    $(this).addClass('focus');
}}).live({blur:function() {
    $(this).removeClass('focus');
	
var	text = $(this).val();
var	id = $(this).attr('id');
var	clas = $(this).attr('class');
 var rel = $(this).closest('tr').attr('rel'); 


 
		$.ajax({
				type: "POST",
				url: base_url+""+lang+"/admin/editmenu",
				data: {
					"id": id,
					"text": text,
					"rel": rel,
					"clas": clas
				},
				dataType: "json",
				success: function(data) {}
			})
	
}});
 
 $('.dropdown').click(function() {

var id=$(this).attr('id');

	 $( ".d"+id ).toggle();
});

xOffset =80;
yOffset = 20;
$(".pictur").hover(function(e){

rel = $(this).attr('rel');

		$("body").append("<p id='preview'><img src='"+base_url+"pictures/"+ rel +"'/></p>");								 
		$("#preview")
			.css("position","absolute")
			.css("opacity","0.4")
			.css("top",(e.pageY - xOffset) + "px")
			.css("left",(e.pageX + yOffset) + "px")
			.fadeIn("fast");						
    },
	function(){	
	$("#preview").remove();
    });	
	
	$(".pictur").mousemove(function(e){
		$("#preview")
			.css("top",(e.pageY - xOffset) + "px")
			.css("left",(e.pageX + yOffset) + "px");
	});	
	
	
	
$(".picturb").hover(function(e){

rel = $(this).attr('rel');

		$("body").append("<p id='preview'><img src='"+base_url+"pictures/"+ rel +"'/></p>");								 
		$("#preview")
			.css("position","absolute")
			.css("opacity","0.4")
			.css("top",(e.pageY - xOffset) + "px")
			.css("left",(e.pageX -50) + "px")
			.fadeIn("fast");						
    },
	function(){	
	$("#preview").remove();
    });	
	
	$(".picturb").mousemove(function(e){
		$("#preview")
			.css("top",(e.pageY - xOffset) + "px")
			.css("left",(e.pageX-50) + "px");
	});	
	

$('.pictur').live({click:function(){
	var id = $(this).attr('id');
	$('.upload_new').append('<input value='+id+' type="hidden" name="axali_suratis_idi"/> ');
	$('.bg').fadeIn();
	$('.upload_new').fadeIn();
}});

$('.picturb').live({click:function(){
	var id = $(this).attr('id');
	$('.upload_news').append('<input value='+id+' type="hidden" name="axali_suratis_idi"/> ');
	$('.bg').fadeIn();
	$('.upload_news').fadeIn();
}});

$('.bg').live({click:function(){
	$('[name="axali_suratis_idi"]').remove();
	$('.upload_new').hide();
	$(this).hide();
}});
	
	
	
	$(".addMenu").live({click:function() {
	var $tr    = $(this).closest('tr').prevAll('tr:visible:first');
		var id = $(this).attr('id');
			$.ajax({
				type: "POST",
				url: base_url+""+lang+"/admin/addMenu",
				data: {
					"id": id
				},
				dataType: "json",
				success: function(data) {
	
    var $clone = $tr.clone();
    $clone.find(':text').val('').attr('id',data.maxid);
    $clone.find('.subid').val(id);
    $clone.find('.link').val('pages/index/'+data.maxid);
    $clone.find('[type="checkbox"]').attr('id',data.maxid).prop('checked',false);
    $clone.find('a').attr('id',data.maxid);
	$clone.attr('id', data.maxid);
    $tr.after($clone);
				}});
	

	
}
});
	
	
$('.mDelete').live({click:function(){
 if (!confirm('დარწმუნებული ხართ რო მგსურთ წაშლა?')) return false;
	var id = $(this).attr('id');

		$.ajax({
				type: "POST",
				url: base_url+""+lang+"/admin/deleteMenu",
				data: {
					"id": id
				},
				dataType: "json",
				success: function(data) {

			$('tr#'+id).remove();	
				
				}});
	
	
}});	
	
$('[name="seoTitle"]').live({keyup:function(){
	var val = $(this).val();
	var length = val.length;
	$('#seoTlength').text(length);
	if(length > 2 && length < 61){
		$('#seoTlength').removeClass().addClass('green');
	} else {
		$('#seoTlength').removeClass().addClass('red');
	}	
}});	

$('[name="seoKey"]').live({keyup:function(){
	var val = $(this).val();
	var length = val.length;
	$('#seoKlength').text(length);
	if(length > 2 && length < 101){
		$('#seoKlength').removeClass().addClass('green');
	} else {
		$('#seoKlength').removeClass().addClass('red');
	}	
}});	

$('[name="seoDescr"]').live({keyup:function(){
	var val = $(this).val();
	var length = val.length;
	$('#seoDlength').text(length);
	if(length > 2 && length < 141){
		$('#seoDlength').removeClass().addClass('green');
	} else {
		$('#seoDlength').removeClass().addClass('red');
	}	
}});	

$('[name="seoTitle"]').live({blur:function(){
	var val = $(this).val();
	var id = $(this).attr('id');
	if(!id){
		id = 0;
	}
				$.ajax({
				type: "POST",
				url: base_url+""+lang+"/admin/checking",
				data: {
					"val": val,
					"id": id,
					"which": 'seotitle'
				},
				dataType: "json",
				success: function(data) {

				if(data.code == 0){
					$('#seoTlength').before("<span class='ERROR red'>მსგავსი სახელი უკვე არსებობს</span>");
				} else{
					$('.ERROR').remove();
				}				
		}});
	
	
	
}});
	
	
});

