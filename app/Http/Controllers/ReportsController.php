<?php

namespace App\Http\Controllers;

use App\Resident;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportsController extends Controller
{
    public function lastName()
    {
        $sortType = 'last name';
        $residents = Resident::all()->sortBy('last_name');
        return view('reports.residentIndex', compact('residents', 'sortType'));
    }

    public function lastNameDownload()
    {
        Excel::create('Keeton Residents' . Carbon::now()->toDateString(), function($excel) {

            $excel->sheet('Resident Report', function($sheet) {
                $sortType = 'last name';
                $residents = Resident::all()->sortBy('last_name');

                $sheet->loadView('reports.residentIndexXLS', compact('residents', 'sortType'));

            });

        })->download('xls');
    }

    public function dob()
    {
        $sortType = 'date of birth';
        $residents = Resident::all()->sortBy('dob');
        return view('reports.residentIndex', compact('residents', 'sortType'));
    }

    public function admitDate()
    {
        $sortType = 'date of admission';
        $residents = Resident::all()->sortBy('date_of_admission');
        return view('reports.residentIndex', compact('residents', 'sortType'));
    }

    public function releaseDate()
    {
        $sortType = 'projected date of discharge';
        $residents = Resident::all()->sortBy('projected_date_of_discharge');
        return view('reports.residentIndex', compact('residents', 'sortType'));
    }

    public function transactionIndex()
    {
        $transactions = Transaction::all()->sortBy('date');

        return view('reports.transactionIndex', compact('transactions'));
    }
}
