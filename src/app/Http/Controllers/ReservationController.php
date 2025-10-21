<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Calendar;
use App\Models\Service;
use App\Models\TmpOrderDetail;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Consts\ReservationConst;
use App\Services\FreedayService;
use Illuminate\Http\Request;
use Auth;
use DB;
use Carbon\Carbon;

class ReservationController extends Controller
{
    private $freeday_service;
    public function __construct(FreedayService $freeday_service)
    {
        $this->freeday_service = $freeday_service;
    }
    public function index(Request $request)
    {
        $user = Auth::user();

        //2年分のFIXDAYを取得
        $start_date = Carbon::now()->firstOfYear();
        $end_date = $start_date->copy()->address(2)->endOfYear();

        $calendars = Calendar::where('user_id',$user->id)
            ->whereBetween('start_date',[$start_date,$end_date])
            ->orderBy('start_date','asc')
            ->get();

        $freedays = $this->freeday_service->getFreedays($user);

        $reservations = Reservation::where('owner_id',$user->id)
            ->whereIn('status',[
                ReservationConst::STATUS_APPLYING,
                ReservationConst::STATUS_UNDER_RESERVATION,
                ReservationConst::STATUS_RESERVED
            ])->orderBy('checkin_date','asc')->get();

        return view('reservation.index',compact('calendars','freedays','reservations'));
    }
}
