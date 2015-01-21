<?php

namespace app\classes;

class email extends \PHPMailer {

    private $email;
    private $body;
    private $quem;
    private $para;
    private $copia;
    private $assunto;

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getBody() {
        return $this->body;
    }

    public function setBody($body) {
        $this->body = $body;
    }

    public function getQuem() {
        return $this->quem;
    }

    public function setQuem($quem) {
        $this->quem = $quem;
    }

    public function getPara() {
        return $this->para;
    }

    public function setPara($para) {
        $this->para = $para;
    }

    public function getCopia() {
        return $this->copia;
    }

    public function setCopia($copia) {
        $this->copia = $copia;
    }

    public function getAssunto() {
        return $this->assunto;
    }

    public function setAssunto($assunto) {
        $this->assunto = $assunto;
    }

    public function enviar_email() {
        $body = $this->getBody();
        $this->CharSet = "UTF-8";
        $this->SMTPSecure = "ssl";
        $this->IsSMTP();
        $this->Host = "br74.hostgator.com.br";
        $this->Port = 465;
        $this->SMTPAuth = true;
        $this->Username = "contato@asolucoesweb.com.br";
        $this->Password = "contato2013!";
        $this->IsHTML(true);
        $this->SetFrom('contato@news.com.br');
        $this->FromName = $this->getQuem();
        $this->AddAddress($this->getPara());
        $copia = $this->getCopia();
        if (!empty($copia)) :
            $this->AddAddress($copia);
        //enviar copia para
        endif;
        $this->Subject = $this->getAssunto();
        $this->AltBody = "Para ver esse email tenha certeza de estar vendo em um programa que aceite ver html";
        $this->MsgHTML($body);

        if (!$this->Send()) {
            return false;
        } else {
            return true;
        }
    }
}
