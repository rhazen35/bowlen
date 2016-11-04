<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use app\core\Library as Lib;

if( !class_exists( "Customer" ) ):

    class Customer extends Eloquent
    {
        protected $fillable = ['name', 'email', 'phone'];
        protected $capsule;

        public function __construct()
        {
            parent::__construct();
            $this->capsule = unserialize(CAPSULE);;
        }

    }

endif;