<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Library as Lib;

if( !class_exists( "Staff" ) ):

    class Staff extends Controller
    {
        protected $staff;

        public function __construct()
        {
            $this->staff = $this->model("Staff");
        }

        public function index()
        {
            $this->view('staff/index', []);
        }

        public function add()
        {
            $this->view('staff/new', []);
        }

        public function add_staff()
        {
            $first_name = ( isset( $_POST['first_name'] ) ? $_POST['first_name'] : "" );
            $insertion  = ( isset( $_POST['insertion'] ) ? $_POST['insertion'] : "" );
            $last_name  = ( isset( $_POST['last_name'] ) ? $_POST['last_name'] : "" );
            $email      = ( isset( $_POST['email'] ) ? $_POST['email'] : "" );
            $hash       = ( isset( $_POST['password'] ) ? $_POST['password'] : "" );
            $hash       = password_hash( $hash, PASSWORD_BCRYPT );

            $this->staff->add(['first_name' => $first_name, 'insertion' => $insertion, 'last_name' => $last_name, 'email' => $email, 'hash' => $hash]);
            $this->redirect("personeel/index");
        }

        public function get_all_staff()
        {
            return( $this->staff->get_all_staff() );
        }

        public function edit()
        {
            $staffID    = ( isset( $_POST['staff_id'] ) ? $_POST['staff_id'] : "" );
            $first_name = ( isset( $_POST['first_name'] ) ? $_POST['first_name'] : "" );
            $insertion  = ( isset( $_POST['insertion'] ) ? $_POST['insertion'] : "" );
            $last_name  = ( isset( $_POST['last_name'] ) ? $_POST['last_name'] : "" );
            $email      = ( isset( $_POST['email'] ) ? $_POST['email'] : "" );

            if( Lib::noempty( $params = array($staffID, $first_name, $insertion, $last_name, $email ) ) ):
                $this->staff->edit(['staff_id' => $staffID, 'first_name' => $first_name, 'insertion' => $insertion, 'last_name' => $last_name, 'email' => $email]);
            endif;

            return( $this->view_partial( "staff", "staff_table" ) );
        }

        public function delete( $data = [] )
        {
            if( !empty( $data ) ):
                $this->model('Staff')->delete_staff( $data );
            endif;

            return( $this->view_partial( "staff", "staff_table" ) );
        }
    }

endif;