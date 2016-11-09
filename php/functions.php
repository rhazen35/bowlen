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

        private static function db_connect()
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
            $sql = "SELECT menu.id, menu.menu FROM menu ORDER BY menu.menu DESC";
            $stmt = $mysqli->prepare( $sql );
            $stmt->execute();
            $stmt->bind_result($menu_id, $menu);

            $results = array();
            while( $row = $stmt->fetch() ):
                $results[] = array("menu_id" => $menu_id, "menu" => $menu);
            endwhile;

            $stmt->close();
            $mysqli->close();

            return( $results );
        }
    }

endif;