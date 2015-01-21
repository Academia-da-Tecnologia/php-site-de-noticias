$(document).ready(function() {

    //categoria
    var painel = $("#painel");
    var content = painel.find("#content");
    var bt_add_categoria = content.find("#bt_add_categoria");

    //form cadastrar categoria
    var bt_cadastrar_categoria = $("#bt_cadastrar_categoria");
    var form_cadastrar_categoria = $("#form_cadastrar_categoria");
    var status = $("#status");
    var txt_categoria = $("#txt_categoria");
    var txt_slug = $("#txt_slug");

    //form editar categoria
    var bt_atualizar_categoria = $("#bt_atualizar_categoria");
    var form_categoria_editar = $("#form_categoria_editar");

    bt_add_categoria.on('click', function() {
        $.post('ajax/form_cadastrar_categoria.php').done(function(data) {
            $.modal(data, {
                minHeight: 300,
                minWidth: 250
            });
        });
    });

    bt_cadastrar_categoria.on('click', function(e) {
        e.preventDefault();

        if (txt_categoria.val() === '') {
            status.html('<div class="alert alert-error">Digite uma categoria</div>');
            return false;
        }

        if (txt_slug.val() === '') {
            status.html('<div class="alert alert-error">Digite um slug</div>');
            return false;
        }

        $.ajax({
            url: 'ajax/categoria_cadastrar.php',
            type: 'post',
            data: form_cadastrar_categoria.serialize(),
            beforeSend: function() {
                status.html('<div class="alert alert-info">cadastrando categoria, aguarde...</div>');
            },
            success: function(data) {
                if (data === 'cadastrou') {
                    status.html('<div class="alert alert-success">Categoria cadastrada com sucesso!</div>');
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                } else if (data === 'jacadastrado') {
                    status.html('<div class="alert alert-error">Categoria ja cadastrada, digite outra categoria</div>');
                }
            }
        });
    });

    content.on('click', "#bt_deletar_categoria", function(event) {
        event.preventDefault();
        var id = $(this).attr('data-id');
        $.post('ajax/categoria_deletar.php', {id: id}).done(function(data) {
            if (data === 'deletou') {
                location.reload();
            } else {
                alert('Erro ao deletar categoria, tente novamente');
            }
        });
    });

    content.on('click', '#bt_editar_categoria', function(event) {
        event.preventDefault();
        var id = $(this).attr('data-id');
        $.post('ajax/form_categoria_editar.php', {id: id}).done(function(data) {
            $.modal(data, {
                minHeight: 300,
                minWidth: 250
            });
        });
    });

    bt_atualizar_categoria.on('click', function(event) {
        event.preventDefault();
        $.ajax({
            url: 'ajax/categoria_editar.php',
            type: 'post',
            data: form_categoria_editar.serialize(),
            beforeSend: function() {
                status.html('<span class="alert alert-info">atualizando dados, aguarde...</span>');
            },
            success: function(data) {
                if (data === 'atualizou') {
                    status.html('<span class="alert alert-success">Atualizado com sucesso !</span>');
                    setTimeout(function() {
                        location.reload();
                    }, 2000);

                } else {
                    status.html('<span class="alert alert-error">Erro ao atualizar</span>');
                }
            }
        })
    })


});