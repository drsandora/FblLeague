<?php

namespace App\Http\Controllers;



use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function resultMatch($score)
    {
        $scoreHome = substr($score, 0, 1); // get Home score
        $scoreAway = substr($score, strlen($score) - 1, 1); //get the away Score
        if ((int) $scoreHome > (int) $scoreAway) {
            return 'Home';
        } else
        if ((int) $scoreHome < (int) $scoreAway) {
            return 'Away';
        } else
        if ((int) $scoreHome == (int) $scoreAway) {
            return 'Draw';
        }
    }
}
