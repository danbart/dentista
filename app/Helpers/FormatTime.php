<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class FormatTime {

    public static function LongTimeFilter($date, $time) {
        if ($date == null && $time == null) {
            return "Sin fecha";
        }

        date_default_timezone_set('America/Guatemala');

        $start_date = new \DateTime( date($date).' '.date($time));
        $today = new \DateTime("now");
        $since_start = $today->diff($start_date);
        //$result = $since_start->format('%a dias %h horas');
        if ($since_start->y == 0) {
            if ($since_start->m == 0) {
                if ($since_start->d == 0) {
                    //if ($since_start->h == 0) {
                    //     if ($since_start->i == 0) {
                    //         if ($since_start->s == 0) {
                    //             $result = $since_start->s . ' segundos';
                    //         } else {
                    //             if ($since_start->s == 1) {
                    //                 $result = $since_start->s . ' segundo';
                    //             } else {
                    //                 $result = $since_start->s . ' segundos';
                    //             }
                    //         }
                    //     } else {
                    //         if ($since_start->i == 1) {
                    //             $result = $since_start->i . ' minuto';
                    //         } else {
                    //             $result = $since_start->i . ' minutos';
                    //         }
                    //     }
                    // } else {
                        if ($since_start->h == 1) {
                            $result = $since_start->h ;
                        } else {
                            $result = $since_start->h;
                        }
                  //  }
                } else {
                    if ($since_start->d == 1) {
                        $result = $since_start->d *24 +$since_start->h;
                    } else {
                        $result = $since_start->d *24 +$since_start->h;
                    }
                }
            } else {
                if ($since_start->m == 1) {
                    $result = 100;
                } else {
                    $result = 100;
                }
            }
        } else {
            if ($since_start->y == 1) {
                $result = 100;
            } else {
                $result = 100;
            }
        }

        return  $result;
    }
}
