$(document).ready(function(){

    var painel = $("#painel");
    var content = painel.find("#content");


    //form
    var form_responder_email= $("#form_responder_email");
    var bt_form_responder_email=$("#bt_form_responder_email");


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

    content.on('click', "#btn-responder-email" ,function(event){
        event.preventDefault();
        var id= $(this).attr('data-id');
          $.post('ajax/form_responder_email.php',{id: id}).done(function(data) {
            $.modal(data, {
                minHeight: 550,
                minWidth: 520,
                onShow: function() {
                    initMce();
                }
            });
        });
    });

    bt_form_responder_email.on('click', function(event){
        event.preventDefault();
        var email=$("#email").val();
        var assunto=$("#assunto").val();
        var assunto=$("#mensagem").val();

        $.ajax({
            url: 'ajax/responder_email.php',
            type: 'post',
            data: 'email='+email+'&assunto='+assunto+'&mensagem='+tinymce.get('mensagem').getContent(),
            beforeSend: function(){
                $("#status-enviar-email").html('Enviando e-mail');
            },
            success: function(data){
                if(data === 'enviado'){
                    $("#status-enviar-email").html('Email enviado');
                    setTimeout(function(){
                        location.reload();
                    },3000);
                }else{
                     $("#status-enviar-email").html('Erro ao enviar e-mail');
                }
            }
        })
    })

    content.on('click',"#btn-deletar-email", function(event){
        event.preventDefault();
        var id=$(this).attr('data-id');
        $.post('ajax/email_deletar.php', {id: id}).done(function(data){
            if(data === 'deletou'){
                setTimeout(function(){
                    location.reload();
                },3000)
            }else{
                console.log(data);
            }
        });
    });


});