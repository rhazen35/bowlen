<?php

namespace app\controllers;

use app\core\Controller;

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

            $this->staff->add(['first_name' => $first_name, 'insertion' => $insertion, 'last_name' => $last_name, 'email' => $email]);
            $this->redirect("personeel/index");
        }

        public function get_all_staff()
        {
            return( $this->staff->get_all_staff() );
        }
    }

endif;