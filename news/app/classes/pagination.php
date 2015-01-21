<?php

namespace app\classes;

class pagination {

    private $totalRegistros;
    private $limite;
    private $offset;
    private $pagina;
    private $totalPaginas;
    private $numeroPagina;
    private $segmentoLink;
    private $serverUrl;

    const NEXT_LABEL = '>>';
    const PREV_LABEL = '<<';
    const SITEURL = 'http://news.com.br:8888/';

    public function getTotalRegistros() {
        return $this->totalRegistros;
    }

    public function setTotalRegistros($totalRegistros) {
        $this->totalRegistros = $totalRegistros;
    }

    public function getLimite() {
        return $this->limite;
    }

    public function setLimite($limite) {
        $this->limite = $limite;
    }

    public function getTotal_paginas() {
        return $this->totalPaginas;
    }

    public function setTotal_paginas($totalPaginas) {
        $this->totalPaginas = $totalPaginas;
    }

    private function verificarNumeroDaPagina($urlVerificarNuemro) {
        $this->numeroPagina = (preg_match('/[0-9]/', $urlVerificarNuemro)) ? $urlVerificarNuemro : 1;
        return $this->numeroPagina;
    }

    private function segmentoPagDaUrl() {
        $this->serverUrl = $_SERVER['REQUEST_URI'];
        $explodeUrl = explode('/', $this->serverUrl);
        if (substr_count($this->serverUrl, '/') === 4) {
            if (isset($explodeUrl[3]) && $explodeUrl[3] === 'pag') {
                $this->verificarNumeroDaPagina($explodeUrl[4]);
                return $this->numeroPagina;
            }
        } else {
            return 1;
        }
    }

    private function numeroPaginaAtual() {
        $this->pagina = ($this->segmentoPagDaUrl()) ? $this->segmentoPagDaUrl() : 1;
        return $this->pagina;
    }

    public function offset() {
        return $this->offset = ($this->numeroPaginaAtual() * $this->getLimite()) - $this->getLimite();
    }

    private function nextLink() {
        if ($this->pagina < $this->totalDePaginas()) {
            return '<a href="'.self::SITEURL. $this->segmentoLink . '/pag/' . ($this->pagina + 1) . '">' . self::NEXT_LABEL . '</a>';
        }
    }

    private function prevLink() {
        if ($this->pagina <= $this->totalDePaginas() && $this->pagina > 1) {
            return '<a href="'.self::SITEURL. $this->segmentoLink . '/pag/' . ($this->pagina - 1) . '">' . self::PREV_LABEL . '</a>';
        }
    }

    private function totalDePaginas() {
        return $this->totalPaginas = ceil($this->getTotalRegistros() / $this->getLimite());
    }

    public function gerarLinks() {
        $explodeUrl = explode('/', $_SERVER['REQUEST_URI']);
        $this->segmentoLink = $explodeUrl[1] . '/' . $explodeUrl[2];

       echo '<div class="pagination pagination-centered">'; 
       echo '<ul>';
       echo '<li>'.$this->prevLink().'</li>';
        for ($i = 1; $i <= $this->totalDePaginas(); $i++):
            ?>
           <li <?php echo ($i == $this->numeroPaginaAtual() ? 'class="active"' : ''); ?>><a href="<?php echo self::SITEURL.$this->segmentoLink . '/pag/' . $i; ?>"><?php echo $i; ?></a></li>
            <?php
        endfor;
        echo '<li>'.$this->nextLink().'</li>';
        echo '</ul>';
        echo '</div>';
    }

}
