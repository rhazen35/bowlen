<?php

namespace app\controllers;

use app\core\Controller;

if( !class_exists( "app\\controllers\\Home" ) ):

    class Home extends Controller
    {
        protected $reservations;
        protected $staff;
        protected $lanes;
        protected $menus;

        public function __construct()
        {
            $this->reservations = $this->model('Reservation');
            $this->staff        = $this->model('Staff');
            $this->lanes        = $this->model('Lanes');
            $this->menus        = $this->model('Menu');
        }

        public function index()
        {
            $this->view('home/index', []);
        }

        public function get_all_reservations()
        {
            return( $this->reservations->get_all_reservations() );
        }

        public function get_all_staff()
        {
            return( $this->staff->get_all_staff() );
        }

        public function get_all_lanes()
        {
            return( $this->lanes->get_all_lanes() );
        }

        public function get_all_menus()
        {
            return( $this->menus->get_all_menus() );
        }

    }

endif;