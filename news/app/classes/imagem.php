<?php

namespace app\classes;

class imagem {

    private $novoNome;
    private $uplodaImage;

    public function renomear($foto) {
        $explode_foto = explode('.', $foto);
        $extensao = end($explode_foto);
        $this->novoNome = uniqid() . '.' . $extensao;
        return $this->novoNome;
    }

    public static function deletar($imagem) {
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $imagem)):
            @unlink($_SERVER['DOCUMENT_ROOT'] . $imagem);
        endif;
    }

    public function upload($wide, $pasta, $largura, $altura) {
        $this->uplodaImage = $wide->resize($largura, $altura, 'fill');
        $this->uplodaImage->savetofile($_SERVER['DOCUMENT_ROOT'] . 'public/' . $pasta . '/' . $this->novoNome);
    }

}