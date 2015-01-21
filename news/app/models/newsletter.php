<?php

namespace app\models;

class newsletter extends \app\models\appModel{

	 static $validates_uniqueness_of = array(
        array('tb_newsletter_nome', 'message' => 'Escolha outro nome'),
        array('tb_newsletter_email', 'message' => 'Escolha outro e-mail')
    );

	static $table_name='tb_newsletter';
}