<?php
$posts = new \app\models\post();
$dados_post = $posts->listar_posts_com_categoria();
?>
<div class="bloco cat" style="display:block">
    <div class="titulo">Artigos:
        <button id="bt_add_artigo" class="btn">Add</button> 
    </div>  
    <table width="560" border="0" class="tbdados" style="float:left;" cellspacing="0" cellpadding="0">
        <tr class="ses">
            <td>categoria:</td>
            <td>titulo:</td>
            <td align="center">criada:</td>
            <td align="center">Foto:</td>
            <td align="center" colspan="3">ações:</td>
        </tr>
        <?php foreach ($dados_post as $post): ?>
            <tr>
                <td><?php echo $post->tb_categoria_nome; ?></td>
                <td><?php echo $post->tb_post_titulo; ?></td>
                <td align="center"><?php echo $post->tb_post_data; ?></td>
                <td><button id="bt_add_foto_artigo" data-id="<?php echo $post->idpost; ?>" class="btn">Add Foto</button> </td>
                <td align="center"><a href="#" id="bt_editar_artigo" data-id="<?php echo $post->idpost; ?>" title="editar"><img src="../public/ico/edit.png" alt="editar" title="editar" /></a></td>
                <td align="center"><a href="#" id="bt_deletar_artigo" data-id="<?php echo $post->idpost; ?>" title="deletar"><img src="../public/ico/no.png" alt="editar" title="excluir" /></a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div><!-- /bloco cat -->