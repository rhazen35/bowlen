<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use app\core\Library as Lib;

if( !class_exists( "Menu" ) ):

    class Menu extends Eloquent
    {
        protected $fillable = ['menu', 'dish', 'allergic', 'price', 'created_at', 'updated_at'];
        protected $capsule;

        public function __construct()
        {
            parent::__construct();
            $this->capsule = unserialize(CAPSULE);;
        }

        public function add( $data = [] )
        {
            $this->capsule->table('menu')->insert([
                'menu'     => $data['menu'],
                'dish'     => $data['dish'],
                'allergic' => $data['allergic'],
                'price'    => $data['price']
            ]);
            Lib::redirect("menu/index");
        }

        public function get_all_menus()
        {
            return( $this->capsule->table('menu')->orderby('menu')->get() );
        }

        public function edit( $data = [] )
        {
            $this->capsule->table('menu')
                          ->where('id', $data['menu_id'])
                          ->update([
                            'menu'     => $data['menu'],
                            'dish'     => $data['dish'],
                            'allergic' => $data['allergic'],
                            'price'    => $data['price']
                            ]);
        }

        public function delete( $data = [] )
        {
            $this->capsule->table('menu')->where('id', $data)->delete();
        }

    }

endif;