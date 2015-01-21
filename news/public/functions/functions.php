<?php

function site_url(){
    $site=$_SERVER['SERVER_NAME'];
    return 'http://'.$site.':8888/';
}

function limitar_texto($texto,$limiteCaracteres){
	$textoSemTags=strip_tags($texto);
	$limite=substr($textoSemTags,0, $limiteCaracteres);
	$limiteEspacoBranco=strrpos($limite, ' ');
	return substr($limite, 0, $limiteEspacoBranco).'...';
}

function segmentoUri($numeroSegmento){
	$uri=$_SERVER['REQUEST_URI'];
	$explodeUri=explode('/', $uri);
	return $explodeUri[$numeroSegmento];
}