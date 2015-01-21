<?php

function query_string($arquivo){

    if(file_exists('inc/'.$arquivo.'.php')):
        require 'inc/'.$arquivo.'.php';
    else:
        require 'inc/404.php';
    endif;
    
}