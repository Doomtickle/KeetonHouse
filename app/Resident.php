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

    public static function calculateManDaysForMonth($year, $month, $resident = null)
    {

        $residents = DB::table('residents')
            ->where('facility', \Auth::user()->facility)
            ->when($resident, function ($query) use ($resident) {
                return $query->where('id', $resident->id);
            })
            ->whereYear('date_of_admission', '<=', $year)
            ->get();


        $sum = 0;
        foreach ($residents as $resident) {
            $firstDayOfMonth = Carbon::now()->year($year)->month($month)->firstOfMonth();
            $lastDayOfMonth  = Carbon::now()->year($year)->month($month)->lastOfMonth();
            $admitDateTmp    = Carbon::parse($resident->date_of_admission);
            $admitDate       = $admitDateTmp->lessThanOrEqualTo($firstDayOfMonth) ? $firstDayOfMonth : $admitDateTmp;
            $releaseDate     = $resident->actual_date_of_discharge == null || Carbon::parse($resident->actual_date_of_discharge)->greaterThanOrEqualTo($lastDayOfMonth) ? $lastDayOfMonth->addDay() :
                Carbon::parse($resident->actual_date_of_discharge);

            if ($admitDate->lessThanOrEqualTo($lastDayOfMonth) && $releaseDate->greaterThanOrEqualTo($firstDayOfMonth)) {
                $sum += $admitDate->diffInDays($releaseDate);
            }
        }

        return $sum;
    }

    public static function calculateManDaysForCurrentMonth($resident = null)
    {
        $date            = Carbon::now();
        $tomorrow        = Carbon::tomorrow();
        $month           = $date->month;
        $year            = $date->year;
        $firstDayOfMonth = Carbon::now()->firstOfMonth();

        $residents = DB::table('residents')
            ->where('facility', \Auth::user()->facility)
            ->when($resident, function ($query) use ($resident) {
                return $query->where('id', $resident->id);
            })
            ->whereMonth('date_of_admission', '<=', $month)
            ->whereYear('date_of_admission', '<=', $year)
            ->get();


        $sum = 0;
        foreach ($residents as $resident) {
            $admitDateTmp = Carbon::parse($resident->date_of_admission);
            $admitDate    = $admitDateTmp->lt($firstDayOfMonth) ? $firstDayOfMonth : $admitDateTmp;
            $releaseDate  = $resident->actual_date_of_discharge == null ? $tomorrow :
                Carbon::parse($resident->actual_date_of_discharge);

            if ($releaseDate->greaterThanOrEqualTo($firstDayOfMonth)) {
                $sum += $admitDate->diffInDays($releaseDate);
            }
        }

        return $sum;

    }

    public static function stayedHereDuring($year, $month, $resident)
    {
        $checkedDate = Carbon::create($year, $month)->firstOfMonth();

        return (Carbon::parse($resident->date_of_admission)->lessThanOrEqualTo($checkedDate) &&
            Carbon::parse($resident->actual_date_of_discharge)->greaterThanOrEqualTo($checkedDate));
    }

    public static function calculateManDaysForFiscalYear()
    {
        $today = Carbon::now();

        $fyStart = $today->month >= 7 ? $today->copy()->month(7)->firstOfMonth() : $today->copy()->subYear(1)->month(7)->firstOfMonth();
        $fyEnd   = $today->month > 6 ? $today->copy()->addYear(1)->month(6)->endOfMonth() : $today->copy()->month(6)->endOfMonth();

        $diff = $fyStart->diffInMonths($today);
        $sum  = 0;

        for ($i = 1; $i <= $diff; $i++) {
            $year  = Carbon::now()->subMonths($i)->year;
            $month = Carbon::now()->subMonths($i)->month;
            $sum += Resident::calculateManDaysForMonth($year, $month);
        }

        return $sum;
    }


}
