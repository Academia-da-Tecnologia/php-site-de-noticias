<div class="bloco form" style="display:block">
    <div class="titulo">Galeria:</div>
    <form action="" method="post" enctype='multipart/form-data'>
        <label>
            <input id="file_upload" name="file_upload" type="file" class="file" />
        </label>
        <label>Categoria:</label>
        <select name="categoria">
            <?php 
                $categoria=new \app\models\categoria();
                $categorias_encontradas=$categoria->listar();
                foreach($categorias_encontradas as $cat):
             ?>
            <option value="<?php echo $cat->id; ?>"><?php echo $cat->tb_categoria_nome; ?></option>

            <?php endforeach; ?>
        </select>
         <button type="submit" name="enviar" class="btn upload">Enviar</button>
    </form>

    <ul class="gblist">
                                         
    <?php 
        $slides=new \app\models\slide();
        $dados_slide=$slides->listar();
        foreach($dados_slide as $slide):
              ?>
            <li> 
                <img src="<?php echo site_url().$slide->tb_slide_caminho_thumb; ?>" width="80" height="60" class="img-rounded"/>
          
                <div class="action">
                    <a href="#" id="bt_deletar_banner" data-id="<?php echo $slide->id; ?>" title="Exluir"><img src="../public/ico/no.png" title="Exluir" alt="Exluir" /></a>
                </div><!-- /action -->
            </li>
    <?php endforeach; ?>
           
    </ul>

</div><!-- /bloco form -->

<div class="bloco user" style="display:block">
    <div class="titulo">E-mails:</div>   

    <table width="560" border="0" class="tbdados" style="float:left;" cellspacing="0" cellpadding="0">
        <tr class="ses">
            <td align="center">#id</td>
            <td>nome:</td>
            <td>email:</td>
            <td align="center" colspan="3">ações:</td>
        </tr>
        <?php 
            $email=new \app\models\email();
            $emailsEncontrados=$email->listar();
            foreach($emailsEncontrados as $emailEncontrado):
        ?>
            <tr>
                <td align="center"><a href="#" title="usuário"><?php echo $emailEncontrado->id; ?></a></td>
                <td><?php echo $emailEncontrado->tb_emails_nome;; ?></td>
                <td>contato@site.com.br</td>
                <td align="center"><a href="#" id="btn-responder-email" data-id="<?php echo $emailEncontrado->id; ?>" title="editar"><img src="../public/ico/edit.png" alt="editar" title="editar" /></a></td>
                <td align="center"><a href="#" id="btn-deletar-email" data-id="<?php echo $emailEncontrado->id; ?>" title="editar"><img src="../public/ico/no.png" alt="editar" title="excluir" /></a></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <div class="paginator">

    </div><!-- /paginator -->
</div><!-- /bloco user -->