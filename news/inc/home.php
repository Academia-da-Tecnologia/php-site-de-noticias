<!-- ####################################################################################################### -->
<div class="wrapper">
    <div class="container">
        <div class="content">
            <div id="featured_slide">
                <ul id="featurednews">
                    <?php 
                    $slides=new \app\models\slide();
                    $slides_encontrados=$slides->listar();
                    foreach($slides_encontrados as $slide):
                     ?>
                    <li><img src="<?php echo site_url().$slide->tb_slide_caminho ?>" alt="" />
                        <div class="panel-overlay">
                            <?php  
                            $categoria_slide=new \app\models\categoria();
                            $categoria_encontrada_slide=$categoria_slide->pegar_pelo_id('id',$slide->tb_slide_categoria);
                            ?>
                            <h2><?php echo $categoria_encontrada_slide->tb_categoria_nome; ?></h2>
                            <p><?php echo $slide->tb_slide_texto; ?><br />
                                <a href="<?php echo site_url().'/categoria/'.$slide->tb_slide_slug; ?>">Ver Categoria</a></p>
                        </div>
                    </li>
                    <?php endforeach; ?>                  
                </ul>
            </div>
        </div>
        <div class="column">
        <?php 
            $ultimasNoticias=new \app\models\post();
            $ultimasNoticiasEncontradas=$ultimasNoticias->listar_ultimos_posts();
         ?>
            <ul class="latestnews">
            <?php foreach($ultimasNoticiasEncontradas as $noticiaDestaqueHeader): ?>
                <li><img src="<?php echo site_url().'public/'.$noticiaDestaqueHeader->tb_post_foto; ?>" alt="" width="100" height="100" />
                    <p><strong><a href="<?php echo site_url(); ?>post/<?php echo $noticiaDestaqueHeader->tb_post_slug; ?>"><?php echo $noticiaDestaqueHeader->tb_post_titulo; ?></a></strong> <?php echo limitar_texto(strip_tags($noticiaDestaqueHeader->tb_post_texto), 150); ?></p>
                </li>
            <?php endforeach; ?>
            </ul>
        </div>
        <br class="clear" />
    </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
    <div id="adblock">
        <div class="fl_left">
             <?php  
                $dadosPublicidadeMiddle=\app\models\publicidade::listar_publicidade(MIDDLE,1);
                echo '<img title="'.$dadosPublicidadeMiddle->tb_publicidade_nome.'" src="'.site_url().'public/'.$dadosPublicidadeMiddle->tb_publicidade_imagem.'" />';
             ?>
        </div>
        <div class="fl_right">
            <?php 
            $dadosPublicidadeMiddle=\app\models\publicidade::listar_publicidade(MIDDLE,1);
            echo '<img title="'.$dadosPublicidadeMiddle->tb_publicidade_nome.'" src="'.site_url().'public/'.$dadosPublicidadeMiddle->tb_publicidade_imagem.'" />'; 
            ?>
        </div>
        <br class="clear" />
    </div>
    <div id="hpage_cats">
    <?php 
        $ultimosPostsCategoria=new \app\models\post();
        $ultimosPostsEncontradosCategoria=$ultimosPostsCategoria->listar_ultimo_post_categoria('Tecnologia');
     ?>
        <div class="fl_left">
            <h2><a href="<?php echo site_url(); ?>categoria/<?php echo $ultimosPostsEncontradosCategoria->tb_categoria_slug; ?>"><?php echo $ultimosPostsEncontradosCategoria->tb_categoria_nome; ?>&raquo;</a></h2>
            <img src="<?php echo site_url().'public/'.$ultimosPostsEncontradosCategoria->tb_post_foto; ?>"width="100" height="100"alt="" />
            <p><strong><a href="<?php echo site_url(); ?>post/<?php echo $ultimosPostsEncontradosCategoria->tb_post_slug; ?>"><?php echo $ultimosPostsEncontradosCategoria->tb_post_titulo;  ?></a></strong></p>
            <p><?php echo limitar_texto($ultimosPostsEncontradosCategoria->tb_post_texto,200); ?></p>
        </div>
        <div class="fl_right">
        <?php $ultimosPostsEncontradosCategoria=$ultimosPostsCategoria->listar_ultimo_post_categoria('Games'); ?>
            <h2><a href="<?php echo site_url(); ?>categoria/<?php echo $ultimosPostsEncontradosCategoria->tb_categoria_slug; ?>"><?php echo $ultimosPostsEncontradosCategoria->tb_categoria_nome; ?>&raquo;</a></h2>
            <img src="<?php echo site_url().'public/'.$ultimosPostsEncontradosCategoria->tb_post_foto; ?>"width="100" height="100"alt="" />
            <p><strong><a href="<?php echo site_url(); ?>post/<?php echo $ultimosPostsEncontradosCategoria->tb_post_slug; ?>"><?php echo $ultimosPostsEncontradosCategoria->tb_post_titulo;  ?></a></strong></p>
            <p><?php echo limitar_texto($ultimosPostsEncontradosCategoria->tb_post_texto,200); ?></p>
        </div>
        <br class="clear" />
        <div class="fl_left">
            <?php $ultimosPostsEncontradosCategoria=$ultimosPostsCategoria->listar_ultimo_post_categoria('Cotidiano'); ?>
            <h2><a href="<?php echo site_url(); ?>categoria/<?php echo $ultimosPostsEncontradosCategoria->tb_categoria_slug; ?>"><?php echo $ultimosPostsEncontradosCategoria->tb_categoria_nome; ?>&raquo;</a></h2>
            <img src="<?php echo site_url().'public/'.$ultimosPostsEncontradosCategoria->tb_post_foto; ?>"width="100" height="100"alt="" />
            <p><strong><a href="<?php echo site_url(); ?>post/<?php echo $ultimosPostsEncontradosCategoria->tb_post_slug; ?>"><?php echo $ultimosPostsEncontradosCategoria->tb_post_titulo;  ?></a></strong></p>
            <p><?php echo limitar_texto($ultimosPostsEncontradosCategoria->tb_post_texto,200); ?></p>
        </div>
        <div class="fl_right">
        <?php $ultimosPostsEncontradosCategoria=$ultimosPostsCategoria->listar_ultimo_post_categoria('Esportes'); ?>
            <h2><a href="<?php echo site_url(); ?>categoria/<?php echo $ultimosPostsEncontradosCategoria->tb_categoria_slug; ?>"><?php echo $ultimosPostsEncontradosCategoria->tb_categoria_nome; ?>&raquo;</a></h2>
            <img src="<?php echo site_url().'public/'.$ultimosPostsEncontradosCategoria->tb_post_foto; ?>"width="100" height="100"alt="" />
            <p><strong><a href="<?php echo site_url(); ?>post/<?php echo $ultimosPostsEncontradosCategoria->tb_post_slug; ?>"><?php echo $ultimosPostsEncontradosCategoria->tb_post_titulo;  ?></a></strong></p>
            <p><?php echo limitar_texto($ultimosPostsEncontradosCategoria->tb_post_texto,200); ?></p>
        </div>
        <br class="clear" />
    </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
    <div class="container">
        <div class="content">
            <div id="hpage_latest">
                <h2>Últimas notícias</h2>
                <ul>
                   <?php 
                   $i=1;;
                   foreach($ultimasNoticiasEncontradas as $noticiaDestaqueFooter):  
                    ?>
                    <li <?php echo ($i == 3) ? 'class="last"' : ''; ?>><img src="<?php echo site_url() .'public/'. $noticiaDestaqueFooter->tb_post_foto; ?>" alt="" width="190" height="130" />
                        <p><?php echo limitar_texto($noticiaDestaqueFooter->tb_post_texto, 250); ?></p>
                        <p class="readmore"><a href="<?php echo site_url(); ?>post/<?php echo $noticiaDestaqueFooter->tb_post_slug; ?>">Continuar lendo &raquo;</a></p>
                    </li>
                <?php 
                $i++;
                endforeach; 
                ?>
                </ul>
                <br class="clear" />
            </div>
        </div>
        <div class="column">
            <div class="holder">
             <?php  
                $dadosPublicidadeFooter=\app\models\publicidade::listar_publicidade(FOOTER,2);
                echo '<img title="'.$dadosPublicidadeFooter->tb_publicidade_nome.'" src="'.site_url().'public/'.$dadosPublicidadeFooter->tb_publicidade_imagem.'" />';
             ?>
            </div>
            <div class="holder">
             <?php  
                $dadosPublicidadeFooter=\app\models\publicidade::listar_publicidade(FOOTER,3);
                echo '<img title="'.$dadosPublicidadeFooter->tb_publicidade_nome.'" src="'.site_url().'public/'.$dadosPublicidadeFooter->tb_publicidade_imagem.'" />';
             ?>
            </div>
        </div>
        <br class="clear" />
    </div>
</div>