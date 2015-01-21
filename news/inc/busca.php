<div class="wrapper">
   <div class="container">
<?php 
   if(isset($_GET['noticia'])):
   	if(!empty($_GET['noticia'])):

         $totalBarrasUrl=substr_count($_GET['noticia'], '/');

         if(count($totalBarrasUrl) == 0){
            $noticia=$_GET['noticia'];
         }else{
            $explodeNoticia=explode('/', $_GET['noticia']);
            $noticia=$explodeNoticia[0];
         }

   		$post=new \app\models\post();
   		$noticiasEncontradas=filter_var($noticia,FILTER_SANITIZE_MAGIC_QUOTES);
   		$totalRegistros=$post->buscarNoticia($noticiasEncontradas);

         //paginando resultados
         $pagination=new \app\classes\pagination();
         $pagination->setLimite(5);
         $pagination->setTotalRegistros(count($totalRegistros));
         $resultado=$post->buscarNoticia($noticia,$pagination->getLimite(),$pagination->offset());

         echo '<div id="resultados-encontrados">Resultados encontrados para <b>'.$noticia.'</b> - ('.count($resultado). ' notícias)</div>';

         foreach($resultado as $noticiaEncontrada): ?>
            <div class="listar-noticias">
               <div class="foto-post"><img src="<?php echo site_url().'public/'.$noticiaEncontrada->tb_post_foto; ?>" width="130" height="110" /></div>
               <div class="texto-post">
               <div class="tituloNoticia"><a><?php echo ucwords($noticiaEncontrada->tb_post_titulo); ?></a></div>
               <?php echo limitar_texto(stripslashes(strip_tags($noticiaEncontrada->tb_post_texto)), 600); ?> <br /><a href="<?php echo site_url(); ?>post/<?php echo $noticiaEncontrada->tb_post_slug; ?>">leia mais</a></div>               
               <div class="fix"></div>
            </div>
         
         <?php endforeach;
         echo $pagination->gerarLinks();

   		else:
   			echo 'Faça uma busca';	
   		endif;	
   	else:
   		echo 'Faça uma busca';	
   	endif;		
   ?>
	</div>
</div>