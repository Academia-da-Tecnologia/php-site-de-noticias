<?php

ActiveRecord\Config::initialize(function($cfg) {
            $cfg->set_model_directory($_SERVER['DOCUMENT_ROOT'].'app/models');
            $cfg->set_connections(array(
                'development' => 'mysql://root:root@localhost/news'));
        });