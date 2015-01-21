$(document).ready(function() {

    var topline = $("#topline");
    var bt_admin = topline.find('#bt_admin');
    var form_login = $("#form_login");
    var bt_logar = form_login.find('#bt_logar');
    var mensagem=$("#mensagem");

    bt_admin.on('click', function() {

        $.post('http://news.com.br:8888/ajax/form_admin.php').done(function(data) {
            $.modal(data, {
                minHeight: 300,
                minWidth: 250
            });
        });
    });

    bt_logar.on('click', function(event) {
        event.preventDefault();
        $.ajax({
            url: 'http://news.com.br:8888/ajax/logar_admin.php',
            type: 'post',
            data: form_login.serialize() + '&logar=true',
            beforeSend: function() {
                mensagem.html('Aguarde, logando no sistema');
            },
            success: function(data) {
                if(data === 'invalido'){
                    mensagem.html('Usuario ou senha invalidos');
                }else{
                    document.location.href='http://news.com.br:8888/admin/painel/';
                }
            }
        });
    });
});