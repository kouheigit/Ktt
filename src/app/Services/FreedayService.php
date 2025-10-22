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
    //フリーデイが有効かどうか
    public function getEffectiveFreedays($user)
    {
        $user_id = $user->id;
        if ($user->type != UserConst::TYPE_OWNER) {
            $user_id = $user->user_id;
        }

        $freedays = Freeday::where('user_id', $user_id)
            ->where('end_date', '>=', Carbon::now())
            ->get();

        return $freedays;
    }

    public function getFreedaysNum($usr, $date = null)
    {
        $user_id = $user->id;
        if ($user->type != UserConst\::TYPE_OWNER) {
            $user_id = $user->user_id;
        }
        if ($date) {
            $freedays = Freeday::where('user_id', UserConst::TYPE_OWNER)
                ->where('start_date', '<=', $date)
                ->where('end_date', '>=', $date)
                ->get();
        } else {
            $freedays = Freeday::where('user_id', $user_id)
                ->get();
        }
        $total_freedays = 0;
        foreach ($freedays as $freeday) {
            $total_freedays += $freeday->freedays
        }
        return $total_freedays;
    }
    public function getMaxFreedaysNum($user, $date = null)
    {
        $user_id = $user->id;
        if ($user->type != UserConst::TYPE_OWNER) {
            $user_id = $user->user_id;
        }

        if ($date) {
            $freedays = Freeday::where('user_id', $user_id)
                ->where('start_date', '<=', $date)
                ->where('end_date', '>=', $date)
                ->get();
        } else {
            $freedays = Freeday::where('user_id', $user_id)
                ->get();
        }

        $total_max_freedays = 0;
        foreach ($freedays as $freeday) {
            $total_max_freedays += $freeday->max_freedays;
        }

        return $total_max_freedays;
    }
    public function getYearMaxFreedaysNum($user)
    {
        $user_id = $user->id;
        if($user->type != UserConst::TYPE_OWNER) {
            $user_id = $user->user_id;
        }
        $now Carbon::now();
        $start_date = $now->copy()->firstOfYear();
        $end_date= $now->copy()->lastOfYear();

        $freedays = Freeday::where('user_id',$user_id)
            ->whereBetween('start_date',[$start_date,$end_date])
            ->get();

        $total_max_freedays = 0;
        foreach ($freedays as $freeday) {
            $total_max_freedays += $freeday->max_freedays;
        }

        return $total_max_freedays;
    }
    /*
     * 
     */
}




