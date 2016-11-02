<?php

/**
 * Library consists of all global functions and can be called statically.
 */

namespace app\core;

if( !class_exists( "Library" ) ):

    class Library
    {
        /**
         * @param $sPath
         * @param string $sDelimiter
         * @param string $sReplacementDelimiter
         * @return mixed
         */
        public static function path($sPath, $sDelimiter = '/', $sReplacementDelimiter = DIRECTORY_SEPARATOR )
        {
            return str_replace( $sDelimiter, $sReplacementDelimiter, $sPath );
        }

        public static function get_current_user_id()
        {
            return( !empty( $_SESSION['login'] ) ? $_SESSION['login'] : "" );
        }

        public static function redirect( $location = '' )
        {
            header("Location: " . BASE_PATH . $location . "");
            exit();
        }

        public static function format_number( $number, $decimals = 2 )
        {
            return( number_format( $number, $decimals ) );
        }

        /**
         * @param $data
         * @return string
         */
        public static function microtimeFormat($data )
        {
            $duration   = microtime( true ) - $data;
            $hours      = (int)( $duration/60/60 );
            $minutes    = (int)( $duration/60 )-$hours*60;
            $seconds    = $duration-$hours*60*60-$minutes*60;

            return( number_format( (float)$seconds, 2, '.', '' ) );
        }
        /**
         * @param $dir
         */
        public static function removeDirRecursive($dir )
        {
            if ( is_dir( $dir ) ):

                $objects = scandir( $dir );

                foreach( $objects as $object ):
                    if( $object != "." && $object != ".." ):
                        if( filetype($dir."/".$object) == "dir" ):
                            Library::removeDirRecursive( $dir."/".$object );
                        else:
                            unlink( $dir."/".$object );
                        endif;
                    endif;
                endforeach;

                reset( $objects );
                rmdir( $dir );
            endif;
        }
        /**
         * @return string
         */
        public static function random_password()
        {
            $alphabet    = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
            $pass        = array();
            $alphaLength = strlen( $alphabet ) - 1;

            for ($i = 0; $i < 8; $i++) {
                $n = rand( 0, $alphaLength );
                $pass[] = $alphabet[$n];
            }

            return( implode( $pass ) );
        }

        public static function noempty( $params )
        {
            foreach($params as $arg)
                if(!empty($arg))
                    continue;
                else
                    return false;
            return true;
        }

    }

endif;