<?php

namespace App\Http\Controllers;

use App\Resident;
use Carbon\Carbon;
use App\FacilityInfo;

class InvoiceController extends Controller
{
    public function __construct()
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


        $residents = [];
        $facilityInfo = FacilityInfo::where('facility_name', \Auth::user()->facility)->first();
        $manDaysFY = Resident::calculateManDaysForFiscalYear($year, $month);

        $totalBedDaysForMonth = 0;
        $invoiceMonth = Carbon::create($year, $month)->format('F, Y');
        $invoiceNumber = Carbon::create($year, $month)->format('m-Y');
        foreach ($allResidents as $resident) {
            if (Resident::stayedHereDuring($year, $month, $resident)) {
                $totalBedDaysForMonth += Resident::calculateManDaysForMonth($year, $month, $resident);
                $residents[] = $resident;
            }
        }

        return view('invoices.show', compact('residents', 'totalBedDaysForMonth', 'invoiceNumber', 'invoiceMonth', 'year', 'month', 'facilityInfo', 'manDaysFY'));
    }

    public function printable($facility, $year, $month)
    {
        $allResidents = Resident::where('facility', $facility)->get()->sortBy('last_name');

        $residents = [];
        $facilityInfo = FacilityInfo::where('facility_name', \Auth::user()->facility)->first();
        $manDaysFY = Resident::calculateManDaysForFiscalYear($year, $month);

        $totalBedDaysForMonth = 0;
        $invoiceMonth = Carbon::create($year, $month)->format('F, Y');
        $invoiceNumber = Carbon::create($year, $month)->format('m-Y');
        foreach ($allResidents as $resident) {
            if (Resident::stayedHereDuring($year, $month, $resident)) {
                $residents[] = $resident;
                $totalBedDaysForMonth += Resident::calculateManDaysForMonth($year, $month, $resident);
            }
        }


        return view('invoices.printable', compact('residents', 'totalBedDaysForMonth', 'invoiceNumber', 'invoiceMonth', 'year', 'month', 'facilityInfo', 'manDaysFY'));
    }
}
