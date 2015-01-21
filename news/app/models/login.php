<?php
namespace app\models;

 class login extends \app\models\appModel{
     static $table_name='tb_administrador';
     
     public function logar($login,$senha){
         return parent::find('first', array('conditions'=> array('tb_administrador_login=? and tb_administrador_senha=?',$login,$senha)));        
     }
     
     public static function verificar_login($session){
         if(!isset($_SESSION[$session])):
             header('location:../index.php');
         endif;
     }

     public static function deslogar($session){
     	if(isset($_SESSION[$session])):
     		 session_destroy();
             header('location:../index.php');
         endif;
     }
 }