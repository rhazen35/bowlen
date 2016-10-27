<?php

namespace app\core;

if( !class_exists( "RouterMapper" ) ):

    class RouterMapper
    {
        /**
         * @return array
         */
        public static function routes()
        {
            $routes = array(
                /**
                 **** url **************************** controller *********************** method **********************
                 *
                 *
                 * Login */
                array('url' => 'login/index'        , 'controller' => 'login'           , 'action' => 'index'),
                array('url' => 'login/logout'       , 'controller' => 'login'           , 'action' => 'logout'),
                array('url' => 'login/authorize'    , 'controller' => 'login'           , 'action' => 'authorize'),

                /** Home */
                array('url' => 'home/index'         , 'controller'  => 'home'           , 'action' => 'index'),

                /** Users */
                array('url' => 'users/index'        , 'controller' => 'users'           , 'action' => 'index'),
                array('url' => 'users/new_user'     , 'controller' => 'users'           , 'action' => 'new_user'),
                array('url' => 'users/add_user'     , 'controller' => 'users'           , 'action' => 'add_user'),
                array('url' => 'users/delete'       , 'controller' => 'users'           , 'action' => 'delete'),
                array('url' => 'users/edit'         , 'controller' => 'users'           , 'action' => 'edit'),

                /** Staff */
                array('url' => 'personeel/index'    , 'controller' => 'staff'           , 'action' => 'index'),
                array('url' => 'personeel/nieuw'    , 'controller' => 'staff'           , 'action' => 'add'),
                array('url' => 'staff/add_staff'    , 'controller' => 'staff'           , 'action' => 'add_staff'),

                /** Bowling lanes */
                array('url' => 'banen/index'        , 'controller' => 'lanes'           , 'action' => 'index'),

                /** Menu */
                array('url' => 'menu/index'         , 'controller' => 'menu'            , 'action' => 'index'),

                /** Reservations */
                array('url' => 'reserveringen/index', 'controller' => 'reservations'    , 'action' => 'index'),

                /** Contact */
                array('url' => 'contact/index'      , 'controller' => 'contact'         , 'action' => 'index')
            );

            return( $routes );
        }
    }

endif;