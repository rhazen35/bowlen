<?php

require_once( "functions.php" );

if( $_SERVER['REQUEST_METHOD'] === "POST" ):

    $params = array();
    foreach( $_POST as $k => $v ):
        $params[$k] = $v;
    endforeach;

    Functions::reservation( $params );
    header("Location: ../index.php?reservationComplete");
    exit();

endif;