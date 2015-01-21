$(document).ready(function() {

    //categoria
    var painel = $("#painel");
    var content = painel.find("#content");

    var bt_add_artigo = content.find("#bt_add_artigo");

    //ajax form
    var bt_cadastrar_artigo = $("#bt_cadastrar_artigo");
    var form_cadastrar_artigo = $("#form_cadastrar_artigo");
    var bt_cadastrar_foto_post = $("#bt_cadastrar_foto_post");
    var bt_editar_form_artigo = $("#bt_editar_form_artigo");
    var form_editar_artigo = $("#form_editar_artigo");
    var status = $("#status");

    function initMce() {
        tinymce.init({
        selector: "textarea",
            plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        });
    }

    bt_add_artigo.on('click', function() {
        $.post('ajax/form_cadastrar_artigo.php').done(function(data) {
            $.modal(data, {
                minHeight: 550,
                minWidth: 520,
                onShow: function() {
                    initMce();
                }
            });
        });
    });

    bt_cadastrar_artigo.on('click', function(event) {
        event.preventDefault();
        $.post("ajax/post_cadastrar.php", {values: form_cadastrar_artigo.serialize(), textarea: tinymce.get('value-post').getContent()}).done(function(data) {
            if (data === 'cadastrado') {
                alert('Cadastrado');
                location.reload();
            } else {
                alert('Erro ao cadastrar artigo');
            }
        });
    });

    content.on('click', "#bt_add_foto_artigo", function() {
        var id = $(this).attr('data-id');
        $.post("ajax/form_cadastrar_foto_post.php", {id: id}).done(function(data) {
            $.modal(data, {
                minHeight: 350,
                minWidth: 300
            });
        });
    });

    content.on('click', '#bt_deletar_artigo', function() {
        var id = $(this).attr('data-id');
        $.post('ajax/post_deletar.php', {id: id}).done(function(data) {
            if (data === 'deletou') {
                alert('Deletado');
                location.reload();
            } else {
                alert('Ocorreu um erro ao deletar o post');
            }
        });
    });

    content.on('click', "#bt_editar_artigo", function() {
        var id = $(this).attr('data-id');
        $.post("ajax/form_editar_artigo.php", {id: id}).done(function(data) {
            $.modal(data, {
                minHeight: 500,
                minWidth: 520,
                onShow: function() {
                    initMce();
                }
            });
        });
    });

    bt_cadastrar_foto_post.on('click', function(event) {
        event.preventDefault();
        var id = $(this).attr('data-id');
        $("#form_cadastrar_foto_artigo").ajaxForm({
            url: 'ajax/post_cadastrar_foto.php',
            data: {id: id},
            type: 'post',
            success: function(data) {
                if (data === 'upload') {
                    status.html('<p class="alert alert-success">Upload feito</p>');
                } else {
                    status.html('Erro ao realizar upload');
                }
            },
            error: function() {
                status.html('Erro com o arquivo');
            }

        }).submit();
    });

    bt_editar_form_artigo.on('click', function(event) {
        event.preventDefault();
        $.post('ajax/post_editar.php', {values: form_editar_artigo.serialize(), textarea: tinymce.get('value-post').getContent()}).done(function(data) {
            if (data === 'atualizou') {
                alert('Atualizado');
                location.reload();
            } else {
                alert('Erro ao atualizar post');
            }
        });

    });

});