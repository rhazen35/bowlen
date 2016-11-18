<?php

if( !class_exists( "Functions" ) ):

    class Functions
    {
        private static function dbCredentials()
        {
            $dbArray = array(
                "dbhost" => '127.0.0.1',
                "dbuser" => 'ruben35',
                "dbpass" => 'Ruben1986Hazenbosch35',
                "dbname" => 'bowlen'
            );
            return( $dbArray );
        }

        public static function db_connect()
        {

            $dbArray = self::dbCredentials();
            $con = mysqli_connect($dbArray['dbhost'], $dbArray['dbuser'], $dbArray['dbpass'],$dbArray['dbname']);

            // Check connection
            if(mysqli_connect_errno()):
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            else:
                return( $con );
            endif;

        }

        public static function get_lanes()
        {
            $mysqli = self::db_connect();
            $sql = "SELECT bowling_lanes.id, bowling_lanes.lane FROM bowling_lanes ORDER BY bowling_lanes.lane DESC";
            $stmt = $mysqli->prepare( $sql );
            $stmt->execute();
            $stmt->bind_result($lane_id, $lane);

            $results = array();
            while( $row = $stmt->fetch() ):
                $results[] = array("lane_id" => $lane_id, "lane" => $lane);
            endwhile;

            $stmt->close();
            $mysqli->close();

            return( $results );
        }

        public static function get_menus()
        {
            $mysqli = self::db_connect();
            $sql = "SELECT menu.id, menu.menu, menu.dish, menu.allergic, menu.price FROM menu ORDER BY menu.menu ASC";
            $stmt = $mysqli->prepare( $sql );
            $stmt->execute();
            $stmt->bind_result($menu_id, $menu, $dish, $allergic, $price);

            $results = array();
            while( $row = $stmt->fetch() ):
                $results[] = array(
                    "menu_id"   => $menu_id,
                    "menu"      => $menu,
                    "dish"      => $dish,
                    "allergic"  => $allergic,
                    "price"     => $price
                );
            endwhile;

            $stmt->close();
            $mysqli->close();

            return( $results );
        }

        public static function reservation( $params )
        {
            $id             = "";
            $userID         = "";
            $customer       = "";

            $lane           = ( !empty( $params['lane'] ) ? $params['lane'] : "" );
            $menu           = ( !empty( $params['menu'] ) ? $params['menu'] : "" );
            $glow_in_dark   = ( !empty( $params['glow_in_dark'] ) ? $params['glow_in_dark'] : "" );
            $reservation    = ( !empty( $params['reservation'] ) ? $params['reservation'] : "" );
            $persons        = ( !empty( $params['persons'] ) ? $params['persons'] : "" );
            $time           = ( !empty( $params['time'] ) ? $params['time'] : "" );

            $name           = ( !empty( $params['name'] ) ? $params['name'] : "" );
            $phone          = ( !empty( $params['phone'] ) ? $params['phone'] : "" );
            $email          = ( !empty( $params['email'] ) ? $params['email'] : "" );

            $created_at     = date("Y-m-d");
            $updated_at     = "";

            $mysqli = self::db_connect();
            $sql = "INSERT INTO reservations VALUES(?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $mysqli->prepare( $sql );
            $stmt->bind_param("iisssssssss", $id, $userID, $customer, $lane, $menu, $glow_in_dark, $reservation, $persons, $time, $created_at, $updated_at);
            $stmt->execute();
            $last_id = $mysqli->insert_id;
            $stmt->close();

            $sql = "INSERT INTO CUSTOMERS VALUES(?,?,?,?,?,?,?)";
            $stmt = $mysqli->prepare( $sql );
            $stmt->bind_param("isssiss", $id, $name, $email, $phone, $last_id, $created_at, $updated_at);
            $stmt->execute();

            $stmt->close();
            $mysqli->close();
        }
    }

endif;