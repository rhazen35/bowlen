<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use app\core\Library as Lib;

if( !class_exists( "Reservation" ) ):

    class Reservation extends Eloquent
    {
        protected $fillable = ['staff_id', 'customer_id', 'menu', 'created_at', 'updated_at'];
        protected $capsule;
        protected $staffID;
        public $timestamps = true;

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

        public function get_reservation_customer( $reservationID )
        {
            return( $this->capsule->table('customers')->where("reservation_id", $reservationID)->first() );
        }

        public function add( $data = [] )
        {
            $reservationID = $this->capsule->table('reservations')->insertGetId([
                "user"         => $this->staffID,
                "customer"     => "",
                "lane_id"      => $data['lane'],
                "menu"         => $data['menu'],
                "glow_in_dark" => $data['glow_in_dark'],
                "reservation"  => $data['reservation'],
                "persons"      => $data['persons'],
                "time"         => $data['time']
            ]);

            $this->capsule->table('customers')->insert([
                "name" => $data['name'],
                "email" => $data['email'],
                "phone" => $data['phone'],
                "reservation_id" => $reservationID
            ]);

            Lib::redirect("reserveringen/index");
        }

        public function edit( $data = [] )
        {
            $this->capsule->table('reservations')
                          ->where('id', $data['reservation_id'])
                          ->update([
                              "lane_id"      => $data['lane'],
                              "menu"         => $data['menu'],
                              "glow_in_dark" => $data['glow_in_dark'],
                              "reservation"  => $data['reservation'],
                              "persons"      => $data['persons'],
                              "time"         => $data['time']
                          ]);
        }

        public function delete( $data = [] )
        {
            $this->capsule->table('reservations')->where('id', $data)->delete();
            $this->capsule->table('customers')->where('reservation_id', $data)->delete();
        }
    }

endif;