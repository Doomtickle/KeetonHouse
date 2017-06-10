<?php

namespace App\Http\Controllers;

use App\Resident;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manDays = Resident::calculateManDaysForMonth(Carbon::now()->month);
        $intakes  = array();
        $releases = array();
        for ($i = 0; $i < 6; $i++) {
            $intakes[ $i ]['month'] = Carbon::now()->subMonths(($i + 1))->format('M, Y');
            $intakes[ $i ]['count'] = DB::table('residents')
                                        ->where('facility', \Auth::user()->facility)
                                        ->whereMonth('date_of_admission', Carbon::now()->subMonths(($i + 1))->month)
                                        ->count();
            $releases[ $i ]['month'] = Carbon::now()->subMonths(($i + 1))->format('M, Y');
            $releases[ $i ]['count'] = DB::table('residents')
                ->where('facility', \Auth::user()->facility)
                ->whereMonth('actual_date_of_discharge', Carbon::now()->subMonths(($i + 1))->month)
                ->count();
        }


        return view('home', compact('intakes', 'releases', 'manDays'));
    }
}
