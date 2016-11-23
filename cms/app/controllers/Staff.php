<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Library as Lib;

if( !class_exists( "Staff" ) ):

    class Staff extends Controller
    {
        protected $staff;
        protected $user;

        public function __construct()
        {
            $this->staff = $this->model("Staff");
            $this->user  = $this->model("User");
        }

        public function index()
        {
            $this->view('staff/index', []);
        }

        public function add()
        {
            $this->view('staff/new', []);
        }

        public function user_types_array()
        {
            return( ['admin', 'superuser', 'normal', 'guest', 'manager', 'kitchen', 'reception', 'host'] );
        }

        public function add_staff()
        {
            $first_name = ( isset( $_POST['first_name'] ) ? $_POST['first_name'] : "" );
            $insertion  = ( isset( $_POST['insertion'] ) ? $_POST['insertion'] : "" );
            $last_name  = ( isset( $_POST['last_name'] ) ? $_POST['last_name'] : "" );
            $email      = ( isset( $_POST['email'] ) ? $_POST['email'] : "" );
            $type       = ( isset( $_POST['type'] ) ? $_POST['type'] : "" );
            $hash       = ( isset( $_POST['password'] ) ? $_POST['password'] : "" );
            $hash       = password_hash( $hash, PASSWORD_BCRYPT );

            $this->staff->add(['first_name' => $first_name, 'insertion' => $insertion, 'last_name' => $last_name, 'email' => $email, 'type' => $type, 'hash' => $hash]);
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
            $type       = ( isset( $_POST['type'] ) ? $_POST['type'] : "" );

            if( Lib::noempty( $params = array($staffID, $first_name, $insertion, $last_name, $email, $type ) ) ):
                $this->staff->edit(['staff_id' => $staffID, 'first_name' => $first_name, 'insertion' => $insertion, 'last_name' => $last_name, 'email' => $email, 'type' => $type]);
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

        public function convert_user_type_text( $user_type )
        {
            switch( $user_type ):
                case"1":
                    return( "admin" );
                    break;
                case"2":
                    return( "superuser" );
                    break;
                case"3":
                    return( "normal" );
                    break;
                case"4":
                    return( "guest" );
                    break;
                case"5":
                    return( "manager" );
                    break;
                case"6":
                    return( "reception" );
                    break;
                case"7":
                    return( "kitchen" );
                    break;
                case"8":
                    return( "host" );
                    break;
                default:
                    return( "unknown" );
                    break;
            endswitch;
        }

        public function convert_user_type_number( $user_type )
        {
            switch( $user_type ):
                case"admin":
                    return( 1 );
                    break;
                case"superuser":
                    return( 2 );
                    break;
                case"normal":
                    return( 3 );
                    break;
                case"guest":
                    return( 4 );
                    break;
                case"manager":
                    return( 5);
                    break;
                case"reception":
                    return( 6 );
                    break;
                case"kitchen":
                    return( 7 );
                    break;
                case"host":
                    return( 8 );
                    break;
                default:
                    return( 9 );
                    break;
            endswitch;
        }
    }

endif;