<?php

namespace app\controllers;

use app\core\Controller;

if( !class_exists( "Lanes" ) ):

    class Lanes extends Controller
    {
        public function index()
        {
            $this->view('banen/index', []);
        }
    }

endif;