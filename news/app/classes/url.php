<?php
namespace app\classes;
class url {

    public static function verificar_url($url) {      
        if (substr_count($url, "/") > 0):
            $explode_url = explode("/", $url);
            foreach ($explode_url as $u):
                if (is_file('inc/' . $u . '.php')):
                    require_once 'inc/'.$u . '.php';
                endif;
            endforeach;
        else:
            if (is_file("inc/" . $url . ".php")):
                require_once 'inc/'. $url . ".php";
            else:
                require_once "inc/404.php";
            endif;
        endif;
    }

}