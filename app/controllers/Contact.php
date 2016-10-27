<?php

namespace app\controllers;

use app\core\Controller;

if( !class_exists( "Contact" ) ):

    class Contact extends Controller
    {
        public function index()
        {
            $this->view('contact/index', []);
        }
    }

endif;