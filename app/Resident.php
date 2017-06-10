<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Resident extends Model
{
    protected $guarded = [];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public static function calculateManDays($resident)
    {
        $admitDate   = Carbon::parse($resident->date_of_admission);
        $releaseDate = $resident->actual_date_of_discharge == null ? Carbon::now() :
            Carbon::parse($resident->actual_date_of_discharge);

        $manDays = $admitDate->diffInDays($releaseDate);

        if ($manDays == 0) {
            $manDays += 1;
        }

        return $manDays;

    }

    public static function calculateManDaysForMonth($month)
    {

        $residents = DB::table('residents')
            ->where('facility', \Auth::user()->facility)
            ->whereMonth('date_of_admission', '<=', $month)
            ->get();


        $sum = 0;
        foreach ($residents as $resident) {
            $firstDayOfMonth = Carbon::now()->month($month)->firstOfMonth();
            $lastDayOfMonth  = Carbon::now()->month($month)->lastOfMonth();
            $admitDateTmp    = Carbon::parse($resident->date_of_admission);
            $admitDate       = $admitDateTmp->lt($firstDayOfMonth) ? $firstDayOfMonth : $admitDateTmp;
            $releaseDate     = $resident->actual_date_of_discharge == null ? $lastDayOfMonth->addDay() :
                Carbon::parse($resident->actual_date_of_discharge);

            if ($releaseDate->gte($firstDayOfMonth)) {
                $sum += $admitDate->diffInDays($releaseDate);
            }
        }

        return $sum;
    }

}
