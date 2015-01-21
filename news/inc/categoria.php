<div class="wrapper">
   <div id="fb-root"></div>
   <div class="container">
<?php
$slug=segmentoUri(2);

$categoria=new \app\models\categoria();
$dadosDaCategoria=$categoria->pegar_pelo_id('tb_categoria_slug', $slug);

if(!empty($dadosDaCategoria)):
	$idCategoria=$dadosDaCategoria->id;
	$post=new \app\models\post();
	$post->setCategoria($idCategoria);
	$postsEncontradosCategoria=$post->pegar_pelo_id('tb_post_categoria', $idCategoria, 'all');
	
	$pagination=new \app\classes\pagination();
	$pagination->setLimite(2);
	$pagination->setTotalRegistros(count($postsEncontradosCategoria));
	$postsDaCategoriaEscolhida=$post->listar_post_com_limite($pagination->getLimite(), $pagination->offset());
?>

<h2><?php echo $dadosDaCategoria->tb_categoria_nome; ?></h2>
<?php foreach($postsDaCategoriaEscolhida as $noticiaCategoria): ?>
	<div class="listar-noticias">
		<div class="foto-post"><img src="<?php echo site_url().'public/'.$noticiaCategoria->tb_post_foto; ?>" width="130" height="110" /></div>
		<div class="texto-post">
		<div class="tituloNoticia"><a><?php echo ucwords($noticiaCategoria->tb_post_titulo); ?></a></div>
		<?php echo limitar_texto(stripslashes(strip_tags($noticiaCategoria->tb_post_texto)), 600); ?> <br /><a href="<?php echo site_url(); ?>post/<?php echo $noticiaCategoria->tb_post_slug; ?>">leia mais</a>
		</div>
	
<div class="fix"></div>
	</div>

<div class="fix"></div>
<?php endforeach; ?>

<div class="fix"></div>
<?php
	echo $pagination->gerarLinks();
else:
	echo 'escolha uma categoria';
endif;	
?>
	</div>
</div>