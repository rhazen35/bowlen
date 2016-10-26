<?php

namespace app\core;

if( !class_exists( "RouterMapper" ) ):
    class RouterMapper
    {
        public static function routes()
        {
            $routes = array(
                array('url' => 'login/index', 'controller' => 'login', 'action' => 'index'),
                array('url' => 'login/logout', 'controller' => 'login', 'action' => 'logout'),
                array('url' => 'login/authorize', 'controller' => 'login', 'action' => 'authorize'),
                array('url' => 'home/index', 'controller'  => 'home', 'action' => 'index'),
                array('url' => 'users/index', 'controller' => 'users', 'action' => 'index'),
                array('url' => 'users/new_user', 'controller' => 'users', 'action' => 'new_user'),
                array('url' => 'users/add_user', 'controller' => 'users', 'action' => 'add_user'),
                array('url' => 'users/edit', 'controller' => 'users', 'action' => 'edit')
            );

            return( $routes );
        }
    }
endif;