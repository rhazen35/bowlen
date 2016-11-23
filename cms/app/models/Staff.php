<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

if( !class_exists( "Staff" ) ):

    class Staff extends Eloquent
    {
        protected $fillable = ['first_name', 'insertion', 'last_name', 'email', 'type', 'hash', 'created_at', 'updated_at'];
        protected $capsule;

        public function __construct()
        {
            parent::__construct();
            $this->capsule = unserialize( CAPSULE );
        }

        public function add( $data = [] )
        {
            $this->capsule->table('staff')->insert([
                'first_name' => $data['first_name'],
                'insertion'  => $data['insertion'],
                'last_name'  => $data['last_name'],
                'email'      => $data['email'],
                'type'       => $data['type'],
                'hash'       => $data['hash']
            ]);
        }

        public function get_all_staff()
        {
            $read = $this->capsule->table('staff')->get();
            return($read);
        }

        public function edit( $data = [] )
        {
            $this->capsule->table('staff')->where('id', $data['staff_id'])->update([
                    'first_name' => $data['first_name'],
                    'insertion'  => $data['insertion'],
                    'last_name'  => $data['last_name'],
                    'email'      => $data['email'],
                    'type'       => $data['type']
                ]);
        }

        public function delete_staff( $data = [] )
        {
            $this->capsule->table('staff')->where('id', $data)->delete();
            Staff::destroy($data);
        }
    }

endif;