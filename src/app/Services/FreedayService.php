<?php
// app/Services/FreedayService.php

namespace App\Services;


use App\Consts\UserConst;
use App\Models\Freeday;
use App\Models\User;
use Carbon\Carbon;

class FreedayService
{
    public function getFreedays($user, $date = null)
    {
        $user_id = $user->id;
        if($user->type ! = UserConst::TYPE_OWNER)
        {
            $user_id = $user->user_id;
        }
       
    }
}



