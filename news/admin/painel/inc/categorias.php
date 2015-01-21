<div class="bloco list" style="display:block">
    <div class="titulo">Categorias:
        <button id="bt_add_categoria" class="btn">Add</button>
    </div><!-- /titulo -->

    <table width="560" border="0" class="tbdados" style="float:left;" cellspacing="0" cellpadding="0">
        <tr class="ses">
            <td>titulo:</td>
            <td align="center" colspan="3">ações:</td>
        </tr>
        <?php 
            $categorias=new \app\models\categoria();
            $dados_categoria=$categorias->listar();        
            foreach($dados_categoria as $categoria):
            ?>
            <tr>
                <td><a href="#" target="_blank"><?php echo $categoria->tb_categoria_nome; ?></a></td>
                <td align="center"><a href="#" id="bt_editar_categoria" data-id="<?php echo $categoria->id; ?>" title="editar"><img src="<?php echo site_url() ?>admin/public/ico/edit.png" alt="editar" title="editar" /></a></td>
                <td align="center"><a href="#" id="bt_deletar_categoria" data-id="<?php echo $categoria->id; ?>" title="deletar"><img src="<?php echo site_url() ?>admin/public/ico/no.png" alt="editar" title="excluir" /></a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div><!-- /bloco list -->