<?php

namespace app\controllers;

use app\core\Controller;

if( !class_exists( "Menu" ) ):

    class Menu extends Controller
    {
        public function index()
        {
            $this->view('menu/index', []);
        }
    }

endif;