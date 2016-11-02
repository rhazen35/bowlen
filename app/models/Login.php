<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

if( !class_exists( "Login" ) ):

    class Login extends Eloquent
    {
        protected $capsule;

        public function __construct()
        {
            parent::__construct();
            $this->capsule = unserialize( CAPSULE );
        }

        public function read_where_email( $data = '' )
        {
            $read = $this->capsule->table('users')->where('email', '=', $data['email'])->first();
            return($read);
        }

        public function read_where_email_staff( $data = '' )
        {
            $read = $this->capsule->table('staff')->where('email', '=', $data['email'])->first();
            return($read);
        }
    }

endif;