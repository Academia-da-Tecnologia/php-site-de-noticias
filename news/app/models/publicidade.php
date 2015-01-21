<?php

namespace app\models;

class publicidade extends \app\models\appModel {

    static $table_name = 'tb_publicidade';

    public function listar_publicidade_administrador() {
        $join = "inner join tb_publicidade_tamanho inner join tb_publicidade_posicao on 
                (tb_publicidade.tb_publicidade_tamanho=tb_publicidade_tamanho.id 
                and tb_publicidade.tb_publicidade_posicao=tb_publicidade_posicao.id)";
        return parent::find('all', array('joins' => $join, 'select' => '*,tb_publicidade.id as idpublicidade'));
    }

    public static function listar_publicidade($posicao,$tamanho){
    	return parent::find(array('select'=>'*', 'order'=>'rand()', 'limit'=>1, 'conditions'=> array('tb_publicidade_posicao=? and tb_publicidade_tamanho=?',$posicao,$tamanho)));
    }


}
