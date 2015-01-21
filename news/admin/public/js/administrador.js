$(document).ready(function() {

    var painel = $("#painel");
    var content = painel.find("#content");

    var bt_add_administrador = content.find("#bt_add_administrador");

    //form
    var form_cadastrar_administrador = $("#form_cadastrar_administrador");
    var bt_form_cadastrar_administrador = $("#bt_form_cadastrar_administrador");
    var status_cadastrar_administrador = $("#status-cadastrar-administrador");
    var status_atualizar_administrador = $("#status_atualizar_administrador");
    var bt_editar_form_administrador = $("#bt_editar_form_administrador");
    var form_editar_administrador = $("#form_editar_administrador");

    bt_add_administrador.on('click', function() {
        $.post('ajax/form_cadastrar_administrador.php').done(function(data) {
            $.modal(data, {
                minHeight: 350,
                minWidth: 300
            });
        });
    });

    bt_form_cadastrar_administrador.on('click', function(event) {
        event.preventDefault();
        $.post('ajax/administrador_cadastrar.php', {dados_administrador: form_cadastrar_administrador.serialize()}).done(function(data) {
            if (data === 'cadastrou') {
                alert('Cadastrado');
                location.reload();
            } else {
                status_cadastrar_administrador.html('<p class="alert alert-danger">' + data + '<p>');
            }
        });
    });

    content.on('click', "#bt_deletar_administrador", function() {
        if (confirm('Deseja deletar esse registro ?')) {
            var id = $(this).attr('data-id');
            $.post('ajax/administrador_deletar.php', {id: id}).done(function(data) {
                if (data === 'deletou') {
                    alert('Deletado');
                    location.reload();
                } else {
                    alert('Erro ao deletar registro');
                }
            });
        } else {
            return false;
        }
    });

    content.on('click', "#bt_editar_administrador", function() {
        var id = $(this).attr('data-id');
        $.post('ajax/form_editar_administrador.php', {id: id}).done(function(data) {
            $.modal(data, {
                minHeight: 350,
                minWidth: 300
            });
        });
    });

    bt_editar_form_administrador.on('click', function(event) {
        event.preventDefault();
        var id = $(this).attr('data-id');

        $.post('ajax/administrador_editar.php', {id: id, dados: form_editar_administrador.serialize()}).done(function(data) {
            if (data === 'atualizou') {
                alert('alterou');
                location.reload();
            } else {
                status_atualizar_administrador.html('<p class="alert alert-danger">' + data + '<p>');
            }
        });
    });

});