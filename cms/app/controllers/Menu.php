<?php

namespace app\controllers;

use app\core\Controller;

if( !class_exists( "Menu" ) ):

    class Menu extends Controller
    {
        protected $menu;

        public function __construct()
        {
            $this->menu = $this->model("Menu");
        }

        public function index()
        {
            $this->view('menu/index', []);
        }

        public function new_menu()
        {
            $this->view('menu/new', []);
        }

        public function add()
        {
            $this->menu->add( $_POST );
        }

        public function get_all_menus()
        {
            return( $this->menu->get_all_menus() );
        }

        public function edit()
        {
            $this->menu->edit( $_POST );
            return( $this->view_partial( "menu", "menu_table" ) );
        }

        public function delete( $data = [] )
        {
            $this->menu->delete( $data );
            return( $this->view_partial( "menu", "menu_table" ) );
        }
    }

endif;