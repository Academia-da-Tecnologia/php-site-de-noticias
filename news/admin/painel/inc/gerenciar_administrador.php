<?php
$administradores=new \app\models\administrador();
$dados_dos_administradores = $administradores->listar();
?>
<div class="bloco cat" style="display:block">
    <div class="titulo">Administradores:
        <button id="bt_add_administrador" class="btn">Add</button> 
    </div>  
    <table width="560" border="0" class="tbdados" style="float:left;" cellspacing="0" cellpadding="0">
        <tr class="ses">
            <td>Nome:</td>
            <td align="center" colspan="3">ações:</td>
        </tr>
        <?php foreach ($dados_dos_administradores as $administrador): ?>
            <tr>
                <td><?php echo $administrador->tb_administrador_nome; ?></td>
                <td align="center"><a href="#" id="bt_editar_administrador" data-id="<?php echo $administrador->id; ?>" title="editar"><img src="../public/ico/edit.png" alt="editar" title="editar" /></a></td>
                <td align="center"><a href="#" id="bt_deletar_administrador" data-id="<?php echo $administrador->id; ?>" title="deletar"><img src="../public/ico/no.png" alt="editar" title="excluir" /></a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div><!-- /bloco cat -->