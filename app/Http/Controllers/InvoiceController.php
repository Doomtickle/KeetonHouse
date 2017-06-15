<?php

namespace App\Http\Controllers;

use App\FacilityInfo;
use App\Resident;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function select()
    {
        return view('invoices.select');
    }

    public function generate($facility, $year, $month)
    {
        $allResidents = Resident::where('facility', $facility)->get()->sortBy('last_name');

        $residents = array();
        $facilityInfo = FacilityInfo::where('facility_name', \Auth::user()->facility)->first();
        $manDaysFY = Resident::calculateManDaysForFiscalYear();

        $totalBedDaysForMonth = 0;
        $invoiceMonth = Carbon::create($year, $month)->format('F, Y');
        $invoiceNumber = Carbon::create($year, $month)->format('m-Y');
        foreach($allResidents as $resident){
            if(Resident::stayedHereDuring($year, $month, $resident)){
                $residents[] = $resident;
                $totalBedDaysForMonth += Resident::calculateManDaysForMonth($year, $month, $resident);

            }
        }


        return view('invoices.show', compact('residents', 'totalBedDaysForMonth','invoiceNumber', 'invoiceMonth', 'year', 'month', 'facilityInfo', 'manDaysFY'));
    }
}
