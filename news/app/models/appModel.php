<?php

namespace app\models;

abstract class appModel extends \ActiveRecord\Model implements \app\interfaces\Isql {

    public function listar() {
        return parent::find('all');
    }

    public function pegar_pelo_id($campo, $valor, $tipo=null) {
        $tipoListagem=($tipo == null) ? 'first' : 'all';
        return parent::find($tipoListagem, array('conditions' => array($campo . '=?', $valor)));
    }

    public function atualizar($id, $attributes) {
        $atualizar = parent::find($id);
        $atualizar->update_attributes($attributes);
        return $atualizar;
    }

    public function deletar($id) {
        $deletar = parent::find($id);
        $deletar->delete();
    }

    public function cadastrar($attributes) {
        $cadastrar = parent::create($attributes);
        return $cadastrar;
    }

    public function limitOffset($limit,$offset){
         return array('limit' => $limit, 'offset'=>$offset);
    }


}