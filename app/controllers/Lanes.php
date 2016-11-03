<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Library as Lib;

if( !class_exists( "Lanes" ) ):

    class Lanes extends Controller
    {
        protected $lanes;

        public function __construct()
        {
            $this->lanes = $this->model("Lanes");
        }

        public function index()
        {
            $this->view('banen/index', []);
        }

        public function new_lane()
        {
            $this->view('lanes/new', []);
        }

        public function add()
        {
            $lane         = ( !empty( $_POST['lane'] ) ? $_POST['lane'] : "" );
            $available    = ( !empty( $_POST['available'] ) ? $_POST['available'] : "" );
            $glow_in_dark = ( !empty( $_POST['glow_in_dark'] ) ? $_POST['glow_in_dark'] : "" );

            $this->lanes->add([
                'lane'         => $lane,
                'glow_in_dark' => $glow_in_dark,
                'available'    => $available]);
            $this->redirect("banen/index");
        }

        public function edit()
        {
            $lane_id      = ( !empty( $_POST['lane_id'] ) ? $_POST['lane_id'] : "" );
            $lane         = ( !empty( $_POST['lane'] ) ? $_POST['lane'] : "" );
            $available    = ( !empty( $_POST['available'] ) ? $_POST['available'] : "" );
            $glow_in_dark = ( !empty( $_POST['glow_in_dark'] ) ? $_POST['glow_in_dark'] : "" );

            if( Lib::noempty( $params = array( $lane_id, $lane, $available, $glow_in_dark ) ) ):
                $this->lanes->edit([
                    'lane_id'      => $lane_id,
                    'lane'         => $lane,
                    'available'    => $available,
                    'glow_in_dark' => $glow_in_dark
                ]);
            endif;

            return( $this->view_partial( "lanes", "lanes_table" ) );
        }

        public function get_all_lanes()
        {
            return( $this->lanes->get_all_lanes() );
        }

        public function delete( $data = [] )
        {
            if( !empty( $data ) ):
                $this->model("Lanes")->delete_lane( $data );
            endif;

            return( $this->view_partial( "lanes", "lanes_table" ) );
        }

    }

endif;