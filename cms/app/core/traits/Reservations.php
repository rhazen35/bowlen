<?php

namespace app\core\traits;

trait Reservations
{
    public static function get_all_menus_numbers( $data )
    {
        $menu_numbers  = [];
        $taken_numbers = [];
        $menu_data     = $data;

        $i = 0;
        foreach( $menu_data as $menu_item ):
            if( !in_array( $menu_item->menu, $taken_numbers ) ):
                $menu_numbers[$i]['id']   = $menu_item->id;
                $menu_numbers[$i]['menu'] = $menu_item->menu;
                $taken_numbers[] = $menu_item->menu;
                $i++;
            endif;
        endforeach;

        return( $menu_numbers );
    }

    public static function convert_lane_id( $lane_id, $lanes )
    {
        foreach( $lanes as $lane ):
            if( $lane->id === $lane_id ):
                return( $lane->lane );
            endif;
        endforeach;
    }

}