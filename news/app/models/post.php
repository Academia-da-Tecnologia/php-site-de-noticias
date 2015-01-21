<?php

namespace app\models;

class post extends \app\models\appModel{

	static $table_name="tb_post";
	private $categoria;

	public function setCategoria($categoria){
		$this->categoria=$categoria;
	}

	public function getCategoria(){
		return $this->categoria;
	}

	public function listar_posts_com_categoria(){
		$join= "inner join tb_categoria on (tb_post.tb_post_categoria=tb_categoria.id)";
		return parent::find('all', array('joins'=>$join, 'select'=> '*,tb_post.id as idpost'));
	}

	public function update_foto($id,$foto){
		$update=parent::find($id);
		$update->tb_post_foto=$foto;
		$update->save();
	}
        
    public function listar_post_com_limite($limit,$offset){
    	   $conditions=array('tb_post_categoria=?',$this->getCategoria());
           return parent::find('all', array('limit' => $limit, 'offset'=>$offset, 'conditions'=>$conditions));
    }

    public function listar_ultimos_posts(){
    	return parent::find('all', array('order'=>'id desc', 'limit'=>3));
    }

    public function listar_ultimo_post_categoria($categoria){
		$join= "inner join tb_categoria on (tb_categoria.id=tb_post.tb_post_categoria)";
		return parent::find(array('select'=> '*', 'order'=>'tb_post.id desc','limit'=> 1, 'joins'=>$join,'conditions'=>array('tb_categoria_nome=?',$categoria)));
    }

    public function buscarNoticia($busca,$limit=null,$offset=null){
		return parent::find('all', array_merge(array('limit'=>$limit,'offset'=>$offset),array('conditions'=>array('tb_post_texto like CONCAT("%",?,"%") || tb_post_titulo like CONCAT("%",?,"%")',$busca,$busca))));
    }


}