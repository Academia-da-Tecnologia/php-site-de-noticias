<?php
$publicidades = new app\models\publicidade();
$dados_da_publicidade = $publicidades->listar_publicidade_administrador();
?>
<div class="bloco cat" style="display:block">
    <div class="titulo">Publicidades:
        <button id="bt_add_publicidade" class="btn">Add</button> 
    </div>  
    <table width="560" border="0" class="tbdados" style="float:left;" cellspacing="0" cellpadding="0">
        <tr class="ses">
            <td>Nome:</td>
            <td>Tamanho:</td>
            <td align="center" colspan="3">ações:</td>
        </tr>
        <?php
        foreach ($dados_da_publicidade as $publicidade):
            ?>
            <tr>
                <td><?php echo ucfirst($publicidade->tb_publicidade_nome); ?></td>
                <td><?php echo $publicidade->tb_publicidade_tamanho_valor; ?></td>
                <td align="center"><a href="#" id="bt_editar_publicidade" data-id="<?php echo $publicidade->idpublicidade; ?>" title="editar"><img src="../public/ico/edit.png" alt="editar" title="editar" /></a></td>
                <td align="center"><a href="#" id="bt_deletar_publicidade" data-id="<?php echo $publicidade->idpublicidade; ?>" title="deletar"><img src="../public/ico/no.png" alt="editar" title="excluir" /></a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div><!-- bloco cat -->