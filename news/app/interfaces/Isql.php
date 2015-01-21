<?php
namespace app\interfaces;

interface Isql{
    public function listar(); 
    public function pegar_pelo_id($campo, $valor); 
    public function atualizar($id,$attributes);   
    public function deletar($id);
    public function cadastrar($attributes);
}