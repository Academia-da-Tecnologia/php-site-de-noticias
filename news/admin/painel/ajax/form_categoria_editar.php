<?php  
require $_SERVER['DOCUMENT_ROOT'].'config.php';

$categoria=new \app\models\categoria();
$id=filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$dados_categoria=$categoria->pegar_pelo_id('id', $id);

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Editar categoria</title>
        <link rel="stylesheet" href="../public/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../public/css/styles.css">
    </head>
    <body>
        
    	<form action="" method="post" id="form_categoria_editar">
    		<label>Categoria:</label>
    		<input type="text" id="txt_categoria" value="<?php echo $dados_categoria->tb_categoria_nome; ?>" name="categoria" />

            <label>Slug:</label>
            <input type="text" id="txt_slug" value="<?php echo $dados_categoria->tb_categoria_slug; ?>" name="slug" />

            <label></label>
            <input type="hidden" name="id" value="<?php echo $dados_categoria->id; ?>" />
    		<input type="submit" class="btn btn-primary" id="bt_atualizar_categoria" value="atualizar" />
    	</form>

        <div id="status"></div>

        <script src="../public/js/categoria.js"></script>
    </body>
</html>