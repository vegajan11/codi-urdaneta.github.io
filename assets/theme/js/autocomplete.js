
$(document).ready(function(){

	$("#name").autocomplete({
		source:'autocomplete.php',
		select:function(event,ui){
			$("#suggest").html(ui.item.value);
			
		}
		
	});

});	

