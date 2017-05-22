<?php

namespace App\Http\Controllers;

use App\Resident;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportsController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function lastName()
    {
        $sortType = 'last name';
        $downloadLink = '/report/download/last_name';
        $residents = Resident::all()->sortBy('last_name');
        return view('reports.residentIndex', compact('residents', 'sortType', 'downloadLink'));
    }



    public function download($sortBy)
    {
        Excel::create('Keeton Residents' . Carbon::now()->toDateString(), function($excel) use ($sortBy) {

            $excel->sheet('Resident Report', function($sheet) use ($sortBy) {

                $residents = Resident::all()->sortBy($sortBy);

                $sheet->loadView('reports.residentIndexXLS', compact('residents'));

            });

        })->download('xls');
    }

    public function dob()
    {
        $sortType = 'date of birth';
        $downloadLink = '/report/download/dob';
        $residents = Resident::all()->sortBy('dob');
        return view('reports.residentIndex', compact('residents', 'sortType', 'downloadLink'));
    }

    public function admitDate()
    {
        $sortType = 'date of admission';
        $downloadLink = '/report/download/date_of_admission';
        $residents = Resident::all()->sortBy('date_of_admission');
        return view('reports.residentIndex', compact('residents', 'sortType', 'downloadLink'));
    }

    public function releaseDate()
    {
        $sortType = 'projected date of discharge';
        $downloadLink = '/report/download/projected_date_of_discharge';
        $residents = Resident::all()->sortBy('projected_date_of_discharge');
        return view('reports.residentIndex', compact('residents', 'sortType', 'downloadLink'));
    }

    public function transactionIndex()
    {
        $transactions = Transaction::all()->sortBy('date');

        return view('reports.transactionIndex', compact('transactions'));
    }
}
