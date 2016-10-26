<?php

namespace app\core;

if( !class_exists( "app\\core\\Application" ) ):

    class Application
    {
        public function __construct()
        {
            define( "CAPSULE", serialize( $GLOBALS['capsule'] ) );
            ( new Router() )->set_route();
        }
    }

endif;