<?php

namespace App\Http\Controllers;

use App\Resident;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionReportsController extends Controller
{
    public function select()
    {
        $residents = Resident::all()->sortBy('last_name');
        return view('reports.transactions.select', compact('residents'));
    }

    public function runReport(Request $request)
    {
        $date = Carbon::parse($request->date);
        $month = $date->month;

//        $report = Transaction::where(['date', 'BETWEEN', $startOfMonth], ['resident_id', '=', $resident->id])->get();
        $transactions = DB::table('transactions')
                            ->where('resident_id', $request->resident_id)
                            ->whereMonth('date', $month)
                            ->get();

        return view('reports.transactionIndex', compact('transactions'));

    }
}
