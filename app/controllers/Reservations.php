<?php

namespace app\controllers;

use app\core\Controller;

if( !class_exists( "Reservations" ) ):

    class Reservations extends Controller
    {
        protected $lanes;
        protected $menus;
        protected $reservation;

        public function __construct()
        {
            $this->lanes        = $this->model('Lanes');
            $this->menus        = $this->model('Menu');
            $this->reservation  = $this->model('Reservation');
        }

        public function index()
        {
            $this->view('reserveringen/index', []);
        }

        public function new_reservation()
        {
            $this->view('reservations/new', []);
        }

        public function add()
        {
            $this->reservation->add( $_POST );
        }

        public function get_all_reservations()
        {
            return( $this->reservation->get_all_reservations() );
        }

        public function edit()
        {
            $this->reservation->edit( $_POST );
            return( $this->view_partial('reservations', 'reservations_table') );
        }

        public function delete( $data = [] )
        {
            $this->reservation->delete( $data );
        }
    }

endif;