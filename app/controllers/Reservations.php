<?php

namespace app\controllers;

use app\core\Controller;

if( !class_exists( "Reservations" ) ):

    class Reservations extends Controller
    {
        public function index()
        {
            $this->view('reserveringen/index', []);
        }
    }

endif;