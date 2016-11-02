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
                array('url' => 'login/failed'       , 'controller' => 'login'           , 'action' => 'failed'),

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
                array('url' => 'staff/edit'         , 'controller' => 'staff'           , 'action' => 'edit'),
                array('url' => 'staff/delete'       , 'controller' => 'staff'           , 'action' => 'delete'),

                /** Bowling lanes */
                array('url' => 'banen/index'        , 'controller' => 'lanes'           , 'action' => 'index'),
                array('url' => 'banen/nieuw'        , 'controller' => 'lanes'           , 'action' => 'new_lane'),
                array('url' => 'lanes/add_lane'     , 'controller' => 'lanes'           , 'action' => 'add'),
                array('url' => 'lanes/edit'         , 'controller' => 'lanes'           , 'action' => 'edit'),
                array('url' => 'lanes/delete'       , 'controller' => 'lanes'           , 'action' => 'delete'),

                /** Menu */
                array('url' => 'menu/index'         , 'controller' => 'menu'            , 'action' => 'index'),
                array('url' => 'menu/nieuw'         , 'controller' => 'menu'            , 'action' => 'new_menu'),
                array('url' => 'menu/add'           , 'controller' => 'menu'            , 'action' => 'add'),
                array('url' => 'menu/edit'          , 'controller' => 'menu'            , 'action' => 'edit'),
                array('url' => 'menu/delete'        , 'controller' => 'menu'            , 'action' => 'delete'),

                /** Reservations */
                array('url' => 'reserveringen/index', 'controller' => 'reservations'    , 'action' => 'index'),
                array('url' => 'reserveringen/nieuw', 'controller' => 'reservations'    , 'action' => 'new_reservation'),
                array('url' => 'reservations/add'   , 'controller' => 'reservations'    , 'action' => 'add'),

                /** Contact */
                array('url' => 'contact/index'      , 'controller' => 'contact'         , 'action' => 'index')
            );

            return( $routes );
        }
    }

endif;