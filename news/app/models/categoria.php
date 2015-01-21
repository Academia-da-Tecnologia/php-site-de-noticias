<?php
namespace app\models;
class categoria extends \app\models\appModel{
    static $table_name = 'tb_categoria';

    public function verificar_categoria($categoria){
    	return parent::find('first', array('conditions'=>array('tb_categoria_nome=?',$categoria)));
    }
}