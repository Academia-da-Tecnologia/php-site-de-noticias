<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Untitled</title>
        <link rel="stylesheet" href="../public/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../public/css/styles.css">
    </head>
    <body>
        
    	<form action="" method="post" id="form_cadastrar_categoria">
    		<label>Categoria:</label>
    		<input type="text" id="txt_categoria"  name="categoria" />

            <label>Slug:</label>
            <input type="text" id="txt_slug" name="slug" />

            <label></label>
    		<input type="submit" class="btn btn-primary" id="bt_cadastrar_categoria" value="cadastrar" />
    	</form>

        <div id="status"></div>

        <script src="../public/js/categoria.js"></script>
    </body>
</html>