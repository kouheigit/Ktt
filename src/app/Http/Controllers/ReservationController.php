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
        $end_date = $start_date->copy->addYears(2)->endOfYear();

        $calendars = Calendar::where('user_id',$user->id)
            ->whereBetween('start_date',[$start_date,$end_date])
            ->orderBy('start_date','asc')
            ->get();

        //FREEDAYSを取得
        $freedays = $this->freeday_service->getFreedays($user);

        $reservations = Reservation::where('owner_id',$user->id)
            ->whereIn('status',[
                ReservationConst::STATUS_APPLYING,
                ReservationConst::STATUS_UNDER_RESERVATION,
                ReservationConst::STATUS_RESERVED
            ])->orderBy('checkin_date','asc')
            ->get();

        return view('reservation.index',compact('calendars','freedays','reservations'));

    }
    public function create(Request $request)
    {
        $calendar_id = $request->calender_id;
        $fr = $request->fr; //フリーデイID

        if($calendar_id){
            //FIXDAY予約
            $calender = Calendar::findOrFail($calendar_id);

            return view('reservation.create',compact('calender'));
        }
        if($fr)
        {
            //FREEDAY予約
            $freeday = Freeday::findOrFail($fr);

            return view('reservation.create_freeday',compact('freeday'));
        }
        abort(404);
    }

    public function service(Request $request)
    {
        $user = Auth::user();

        $reservation_data = session('reservation_data');

        if($reservation_data)
        {
            return redirect()->route('reservation.index');
        }

        $services = Service::where('hotel_id',$reservation_data['hotel_id'])
            ->where('status',1)
            ->orderBy('sord','asc')
            ->with('serviceOptions')
            ->get();
        $tmp_orders = TmpOrderDetail::where('user_id',$user->id)
            ->with(['service','serviceOption'])
            ->get();

        return view('reservation.service', compact('services', 'tmp_orders', 'reservation_data'));
    }
    /*
    
     */

}

