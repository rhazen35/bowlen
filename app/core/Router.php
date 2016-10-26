<?php

namespace app\core;

use app\core\Library as Lib;

if( !class_exists( "Router" ) ):

    class Router
    {
        protected $url;
        protected $routes;
        protected $controller = "home";
        protected $method     = 'index';
        protected $params     = [];

        public function __construct()
        {
            $this->url = $this->parse_url( isset( $_GET['url'] ) ? $_GET['url'] : "" );
            $this->routes = RouterMapper::routes();
        }

        public function set_route()
        {
            $url   = $this->url;
            $route = !empty( $url[0] ) && !empty( $url[1] ) ? $url[0] . '/' . $url[1] : 'home/index';

            foreach( $this->routes as $route_item ):
                if( $route === $route_item['url'] ):
                    $this->controller = $route_item['controller'];
                    $this->method     = $route_item['action'];
                    break;
                endif;
            endforeach;

            if( file_exists( Lib::path('app/controllers/' . $this->controller . '.php' ) ) )
            {
                unset($url[0]);
            }

            require_once( Lib::path( 'app/controllers/' . $this->controller . '.php' ) );

            $cp_controller = ucfirst( $this->controller );
            $ns_controller = "\\app\\controllers\\".$cp_controller;

            $this->controller = ( new $ns_controller );

            if( method_exists( $this->controller, $this->method ) )
            {
                unset( $url[1] );
            }

            $this->params = $url ? array_values( $url ) : [];

            call_user_func_array( [$this->controller, $this->method], $this->params );
        }

        private function parse_url( $url )
        {
            if( !empty( $url ) ):
                $parsed_url = explode('/', filter_var( rtrim( $url, '/' ), FILTER_SANITIZE_URL ) );
                return( $parsed_url );
            endif;

            return( false );
        }


    }

endif;