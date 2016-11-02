<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use app\core\Library as Lib;

if( !class_exists( "Reservation" ) ):

    class Reservation extends Eloquent
    {
        protected $fillable = ['staff_id', 'customer_id', 'menu', 'created_at', 'updated_at'];
        protected $capsule;
        protected $staffID;

        public function __construct()
        {
            parent::__construct();
            $this->capsule = unserialize( CAPSULE );
            $this->staffID = Lib::get_current_user_id();
        }

        public function get_all_reservations()
        {
            $read = $this->capsule->table('reservations')->get();
            return( $read );
        }

        public function add( $data = [] )
        {
            $this->capsule->table('reservations')->insert([
                "user"        => $this->staffID,
                "customer"    => "",
                "lane_id"     => $data['lane'],
                "menu"        => $data['menu'],
                "reservation" => $data['reservation']
            ]);

            Lib::redirect("reserveringen/index");
        }

        public function edit( $data = [] )
        {
            $this->capsule->table('reservations')
                          ->where('id', $data['reservation_id'])
                          ->update([
                              "lane_id"     => $data['lane'],
                              "menu"        => $data['menu'],
                              "reservation" => $data['reservation']
                          ]);
        }

        public function delete( $data = [] )
        {
            $this->capsule->table('reservations')->where('id', $data)->delete();
        }
    }

endif;