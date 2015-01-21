$(document).ready(function() {

    var painel = $("#painel");
    var content = painel.find("#content");

    var bt_add_publicidade = content.find("#bt_add_publicidade");

    //form
    var bt_form_cadastrar_publicidade = $("#bt_form_cadastrar_publicidade");
    var form_cadastrar_publicidade = $("#form_cadastrar_publicidade");

    var bt_form_alterar_publicidade = $("#bt_form_alterar_publicidade");
    var form_editar_publicidade = $("#form_alterar_publicidade");


    bt_add_publicidade.on('click', function() {
        $.post('ajax/form_cadastrar_publicidade.php').done(function(data) {
            $.modal(data, {
                minHeight: 500,
                minWidth: 350
            });
        });
    });


    bt_form_cadastrar_publicidade.on('click', function(event) {
        event.preventDefault();

        $("#form_cadastrar_publicidade").ajaxForm({
            url: 'ajax/publicidade_cadastrar.php',
            data: {dados: form_cadastrar_publicidade.serialize()},
            type: 'post',
            success: function(data) {
                if (data === 'upload') {
                    alert('Upload feito');
                    location.reload();
                } else {
                    alert(data);
                }
            },
            error: function() {
                alert('Erro com o arquivo');
            }

        }).submit();
    });

    content.on('click', '#bt_deletar_publicidade', function() {
        var id = $(this).attr('data-id');
        $.post('ajax/publicidade_deletar.php', {id: id}).done(function(data) {
            if (data === 'deletou') {
                location.reload();
            } else {
                alert('Erro ao deletar publicidade');
            }
        });
    });


    content.on('click', '#bt_editar_publicidade', function() {
        var id = $(this).attr('data-id');
        $.post('ajax/form_editar_publicidade.php', {id: id}).done(function(data) {
            $.modal(data, {
                minHeight: 500,
                minWidth: 350
            });
        });
    });


    bt_form_alterar_publicidade.on('click', function(event) {
        event.preventDefault();

        $("#form_editar_publicidade").ajaxForm({
            url: 'ajax/publicidade_editar.php',
            data: {dados: form_editar_publicidade.serialize()},
            type: 'post',
            success: function(data) {
                if (data === 'atualizou') {
                    alert('Atualizado com sucesso');
                    location.reload();
                } else {
                    alert(data);
                }
            },
            error: function() {
                alert('Erro com o arquivo');
            }

        }).submit();
    });

});