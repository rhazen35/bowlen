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

        public function get_all_menu_numbers()
        {
            $menu_numbers  = [];
            $taken_numbers = [];
            $menu_data = $this->menus->get_all_menus();

            $i = 0;
            foreach( $menu_data as $menu_item ):
                if( !in_array( $menu_item->menu, $taken_numbers ) ):
                    $menu_numbers[$i]['id']   = $menu_item->id;
                    $menu_numbers[$i]['menu'] = $menu_item->menu;
                    $taken_numbers[] = $menu_item->menu;
                    $i++;
                endif;
            endforeach;

            return( $menu_numbers );
        }

        public function add()
        {
            $this->reservation->add( $_POST );
        }

        public function get_all_reservations()
        {
            return( $this->reservation->get_all_reservations() );
        }
    }

endif;