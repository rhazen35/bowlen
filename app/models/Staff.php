<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

if( !class_exists( "Staff" ) ):

    class Staff extends Eloquent
    {
        protected $fillable = ['first_name', 'insertion', 'last_name', 'email'];

        public function add( $data = [] )
        {
            $capsule = unserialize( CAPSULE );
            $capsule->table('staff')->insert([
                'first_name' => $data['first_name'],
                'insertion'  => $data['insertion'],
                'last_name'  => $data['last_name'],
                'email'      => $data['email']
            ]);
        }

        public function get_all_staff()
        {
            $capsule = unserialize( CAPSULE );
            $read = $capsule->table('staff')->get();
            return($read);
        }
    }

endif;