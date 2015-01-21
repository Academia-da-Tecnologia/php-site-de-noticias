<?php

require $_SERVER['DOCUMENT_ROOT'] . 'config.php';

$id=filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

$emails=new \app\models\email();
try{
	$emails->deletar($id);
	echo 'deletou';
}catch(\ActiveRecord\ActiveRecordException $e){
	echo $e->getMessage();
}