<?php

namespace App\Http\Controllers;

use App\Resident;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function lastName()
    {
        $sortType = 'last name';
        $residents = Resident::all()->sortBy('last_name');
        return view('reports.residentIndex', compact('residents', 'sortType'));
    }

    public function dob()
    {
        $sortType = 'date of birth';
        $residents = Resident::all()->sortBy('dob');
        return view('reports.residentIndex', compact('residents', 'sortType'));
    }
}
