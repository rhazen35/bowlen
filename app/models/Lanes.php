<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

if( !class_exists( "Lanes" ) ):

    class Lanes extends Eloquent
    {
        protected $fillable = ['lane', 'available', 'glow_in_dark'];

        public function add( $data = [] )
        {
            $capsule = unserialize( CAPSULE );
            $capsule->table('bowling_lanes')->insert([
                'lane'         => $data['lane'],
                'available'    => $data['available'],
                'glow_in_dark' => $data['glow_in_dark']
            ]);
        }

        public function get_all_lanes()
        {
            $capsule = unserialize( CAPSULE );
            $data = $capsule->table('bowling_lanes')->orderby('lane')->get();
            return( $data );
        }

        public function edit( $data = [] )
        {
            $capsule = unserialize( CAPSULE );
            $capsule->table('bowling_lanes')->where('id', $data['lane_id'])->update([
                'lane' => $data['lane'],
                'available'  => $data['available'],
                'glow_in_dark'  => $data['glow_in_dark']
            ]);
        }

        public function delete_lane( $data = [] )
        {
            $capsule = unserialize( CAPSULE );
            $capsule->table('bowling_lanes')->where('id', $data)->delete();
        }

    }

endif;
