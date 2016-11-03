<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use app\core\Library as Lib;

if( !class_exists( "Lanes" ) ):

    class Lanes extends Eloquent
    {
        protected $fillable = ['lane', 'available', 'glow_in_dark'];
        protected $capsule;

        public function __construct()
        {
            parent::__construct();
            $this->capsule = unserialize( CAPSULE );
        }

        private function lane_exists( $lane )
        {
            return( $this->capsule->table('bowling_lanes')->where('lane', $lane)->first() );
        }

        public function add( $data = [] )
        {
            if( empty( $this->lane_exists( $data['lane'] ) ) ):
                $this->capsule->table('bowling_lanes')->insert([
                    'lane'         => $data['lane'],
                    'available'    => $data['available'],
                    'glow_in_dark' => $data['glow_in_dark']
                ]);
            else:
                Lib::redirect('banen/nieuw/exists');
            endif;
        }

        public function get_all_lanes()
        {
            $data = $this->capsule->table('bowling_lanes')->orderby('lane')->get();
            return( $data );
        }

        public function edit( $data = [] )
        {
            if( empty( $this->lane_exists( $data['lane'] ) ) ):
                $this->capsule->table('bowling_lanes')->where('id', $data['lane_id'])->update([
                    'lane' => $data['lane'],
                    'available'  => $data['available'],
                    'glow_in_dark'  => $data['glow_in_dark']
                ]);
            endif;
        }

        public function delete_lane( $data = [] )
        {
            $this->capsule->table('bowling_lanes')->where('id', $data)->delete();
        }

    }

endif;
