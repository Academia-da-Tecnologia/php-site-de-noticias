<?php

namespace app\models;

class administrador extends \app\models\appModel {

    static $table_name = 'tb_administrador';
    static $validates_uniqueness_of = array(
        array('tb_administrador_nome', 'message' => 'Escolha outro nome'),
        array('tb_administrador_login', 'message' => 'Escolha outro login')
    );

}