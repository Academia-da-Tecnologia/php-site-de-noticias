<?php  
    if(isset($_POST['newsletter_go'])):
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING); 
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);    

        $newsletter=new \app\models\newsletter();
        $validation=new \app\classes\validation();

        $validacoes=array(
            'nome' => 'obrigatorio',
            'email' => 'obrigatorio|email'
        );

        $valido=$validation->validar($_POST, $validacoes);
        if($valido){
            $attributes=array(
                'tb_newsletter_nome' => $nome,
                'tb_newsletter_email' => $email
            );
            $cadastro=$newsletter->cadastrar($attributes);
            $validation = new \app\classes\validationUniqueness();
                $validation->typeObjectValidation($cadastro);
                if ($validation->validUniqueness()):
                   $statusCadastroNewsletter='E-mail cadastrado com sucesso !';
                else:
                    $validation->createErrorsValidateUniqueness($attributes);
                    $erros = $validation->getErrorValidateUniqueness();
                endif;
        }
    endif;   
?>
<div class="wrapper">
    <div id="footer">
<!--colocar o que voce quiser-->
    </div>
        <br class="clear" />
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
    <div id="socialise">
        <ul>
            <li><a href="http://facebook.com/asolucoesweb" target="_blank"><img src="<?php echo site_url() ?>/public/images/facebook.gif" alt="" /><span>Facebook</span></a></li>
            <li><a href="#"><img src="<?php echo site_url() ?>/public/images/rss.gif" alt="" /><span>FeedBurner</span></a></li>
            <li class="last"><a href="#"><img src="<?php echo site_url() ?>/public/images/twitter.gif" alt="" /><span>Twitter</span></a></li>
        </ul>
        <div id="newsletter">
            <h2>NewsLetter Sign Up !</h2>
            <p>Please enter your Email and Name to join.</p>
            <form action="#" method="post">
                <fieldset>
                    <legend>Digital Newsletter</legend>
                    <div class="fl_left">
                        <input type="text" name="nome"  placeholder="Digite seu nome"/>
                        <input type="text" name="email"  placeholder="Digite seu email" />
                    </div>
                    <div class="fl_right">
                        <input type="submit" name="newsletter_go" id="newsletter_go" value="&raquo;" />
                    </div>
                </fieldset>
            </form>
            <?php echo \app\classes\validation::mostrarErros(); ?>
            <?php echo isset($statusCadastroNewsletter) ? $statusCadastroNewsletter : ''; ?>
            <?php 
                if(isset($erros)):
                   foreach ($erros as $erroValidate):
                        echo $erroValidate.'<br />';
                    endforeach;
                endif;    
             ?>
        </div>
        <br class="clear" />
    </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col8">
    <div id="copyright">
        <p class="fl_left">Copyright &copy; 2011 - All Rights Reserved - <a href="#">Domain Name</a></p>
        <p class="fl_right">Template by <a href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
        <br class="clear" />
    </div>
</div>