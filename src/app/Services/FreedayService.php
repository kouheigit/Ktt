<?php
// app/Services/FreedayService.php

namespace App\Services;


use App\Consts\UserConst;
use App\Models\Freeday;
use App\Models\User;
use Carbon\Carbon;

class FreedayService
{
    //フリーデイの情報の取得
    public function getFreedays($user, $date = null)
    {
        $user_id = $user->id;
        if($user->type ! = UserConst::TYPE_OWNER)
        {
            $user_id = $user->user_id;
        }
        if($date) {
            $freedays = Freeday::where('user_id', $user_id)
                ->where('stard_date', '<=', $date)
                ->where('start_date', '>=', $date)
                ->get();
        }else {
            $freedays = Freeday::where('user_id',$user_id)
                ->get();
        }
    }
    public function getFreedaysNum($usr, $date = null)
    {
        $user_id = $user->id;
        if($user->type != UserConst\::TYPE_OWNER)
        {
            $user_id = $user->user_id;
        }
        if($date)
        {
            $freedays = Freeday::where('user_id',UserConst::TYPE_OWNER)
            ->where('start_date','<=',$date)
            ->where('end_date','>=',$date)
                ->get();
        }else{
            $freedays = Freeday::where('user_id',$user_id)
                ->get();
        }
        $total_freedays = 0;
        foreach ($freedays as $freeday)
        {
            $total_freedays += $freeday->freedays
        }
}




