<div class="wrapper col0">
    <div id="topline">
        <p>Tel: (16) 3339-2987 | Mail: contato@asolucoesweb.com.br</p>
        <ul>
            <li><a href="<?php echo site_url() ?>contato">Contato</a></li>
            <li><a href="#" id="bt_admin">Admin</a></li>
            <li class="last"><?php echo date('d/m/Y H:i:s'); ?></li>
        </ul>
        <br class="clear" />
    </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
    <div id="header">
        <div class="fl_left">
            <h1><a href="<?php echo site_url(); ?>"><strong>N</strong>ews <strong>M</strong>agazine</a></h1>
            <p>Free CSS Website Template</p>
        </div>
        <div class="fl_right">
            <?php  
            $dadosPublicidadeHeader=\app\models\publicidade::listar_publicidade(HEADER,1);
            echo '<img title="'.$dadosPublicidadeHeader->tb_publicidade_nome.'" src="'.site_url().'public/'.$dadosPublicidadeHeader->tb_publicidade_imagem.'" />'
             ?>
        </div>
        <br class="clear" />
    </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
    <div id="topbar">
        <div id="topnav">
            <ul>
                <?php
                $categoria = new \app\models\categoria();
                $categorias_encontradas = $categoria->listar();
                foreach ($categorias_encontradas as $cat):
                    ?>
                    <li><a href="<?php echo site_url(); ?>categoria/<?php echo $cat->tb_categoria_slug; ?>"><?php echo $cat->tb_categoria_nome; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div id="search">
            <form action="<?php echo site_url(); ?>busca/" method="get">
                <fieldset>
                    <legend>Buscar notícia</legend>
                    <input type="text" name="noticia" value="O que deseja buscar ?"  onfocus="this.value = (this.value == 'O que deseja buscar ?') ? '' : this.value;" />
                    <input type="submit" id="go" value="Search" />
                </fieldset>
            </form>
        </div>
        <br class="clear" />
    </div>
</div>