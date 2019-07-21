function blockScreen(){
	var block = '<div id="blockBody" class="back">';
	block += 		'<div id="blockContent">';
	block +=			'<i class="fas fa-sync-alt fa-2x fa-spin"></i>';
	block += 			'<br>';
	block += 			'<span class="text16">Carregando...</span>';
	block += 		'</div>';
	block += 	'</div>';

	$('body').prepend(block);
}

function unblockScreen(){
	$('#blockBody').hide();
}