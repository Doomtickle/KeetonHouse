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
        $date        = isset($request->date) ? Carbon::parse($request->date) : null;
        $month       = null;
        $year        = null;
        if ($date != null) {
            $month = $date->month;
            $year  = $date->year;
        }
        $type = isset($request->type) ? $request->type : null;

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

        $credits = $transactions->pluck('credit')->sum();
        $debits  = $transactions->pluck('debit')->sum();
        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $balance = money_format('%.2n', ($credits - $debits) / 100);

        $class = ($credits - $debits > 0) ? 'credit' : 'debit';

        return view('reports.transactions.transactionIndex', compact('transactions', 'balance', 'class'));

    }
}
