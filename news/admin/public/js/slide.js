$(document).ready(function(){

	var painel=$("#painel");
	var content=painel.find("#content");

	content.on('click', "#bt_deletar_banner",function(event){
		event.preventDefault();
		var id=$(this).attr('data-id');
		$.post('ajax/slide_deletar.php', {id: id }).done(function(data){
			if(data === 'deletou'){
				location.reload();
			}else{
				alert('Erro ao deletar a foto, tente novamente');
			}
		})
	});

});