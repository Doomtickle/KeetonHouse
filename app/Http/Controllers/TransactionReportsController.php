<?php

namespace App\Http\Controllers;

use App\Resident;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionReportsController extends Controller
{
   function __construct()
   {
       $this->middleware('auth');
   }

    public function select()
    {
        $residents = Resident::all()->sortBy('last_name');

        return view('reports.transactions.select', compact('residents', 'types'));
    }

    public function runReport(Request $request)
    {
        $resident_id = $request->resident_id;
        $date        = Carbon::parse($request->date);
        $month       = $date->month;
        $year        = $date->year;
        $type        = $request->type;

//        $report = Transaction::where(['date', 'BETWEEN', $startOfMonth], ['resident_id', '=', $resident->id])->get();
        $transactions = DB::table('transactions')
            ->select(DB::raw("*"))
            ->when($resident_id, function ($query) use ($resident_id) {
                return $query->where('resident_id', $resident_id);
            })
            ->when($month, function ($query) use ($month) {
                return $query->whereMonth('date', $month);
            })
            ->when($year, function ($query) use ($year) {
                return $query->whereYear('date', $year);
            })
            ->when($type, function ($query) use ($type) {
                return $query->where('reason', $type);
            })
            ->get();

        return view('reports.transactions.transactionIndex', compact('transactions'));

    }
}
