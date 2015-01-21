<div class="wrapper">
   <div class="container">
<?php 
$slug=segmentoUri(2);
$post=new \app\models\post();
$postEncontrado=$post->pegar_pelo_id('tb_post_slug', $slug);
if(!empty($postEncontrado)):
 ?>
<h2><?php echo $postEncontrado->tb_post_titulo; ?></h2>
<div class="sociais">
<?php $linkRedesSociais=site_url().'post/'.$postEncontrado->tb_post_slug; ?>
	<iframe src="//www.facebook.com/plugins/like.php?href=<?php echo $linkRedesSociais; ?>;width=250&amp;height=80&amp;colorscheme=light&amp;layout=standard&amp;action=like&amp;show_faces=false&amp;send=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:200px; height:45px;" allowTransparency="true"></iframe>
</div>
<div class="sociais"><div class="g-plusone" data-annotation="inline" data-width="200"></div></div>
<div class="sociais"><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo $linkRedesSociais; ?>" data-text="<?php echo $postEncontrado->tb_post_titulo; ?>" data-via="asolucoesweb" data-lang="pt">Tweetar</a></div>
<div class="fix"></div>
<div id="texto-post-single"><?php echo stripslashes($postEncontrado->tb_post_texto); ?></div>
<div id="comentarios">
	<div class="fb-comments" data-href="<?php echo $linkRedesSociais; ?>" data-colorscheme="The color scheme used in the plugin" data-numposts="10" data-width="900"></div>
</div>
<?php else: ?>
	Nenhum Post encontado
<?php endif; ?>
   </div>
 </div>