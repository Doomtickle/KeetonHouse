<?php

namespace Tests\Feature;

use App\Resident;
use App\User;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ManDaysForMonthTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_should_calculate_all_man_days_for_specified_month()
    {
        $user = factory(User::class)->create([
            'facility' => 'Demo'
        ]);

        $this->actingAs($user);

        $firstDate  = Carbon::create(2017, 1, 1, 12);
        $secondDate = Carbon::create(2017, 1, 2, 12);

        factory(Resident::class)->create([
            'date_of_admission'        => $firstDate->toDateString(),
            'actual_date_of_discharge' => null,
            'facility'                 => $user->facility
        ]);

        factory(Resident::class)->create([
            'date_of_admission'        => $secondDate->toDateString(),
            'actual_date_of_discharge' => null,
            'facility'                 => $user->facility
        ]);
        factory(Resident::class)->create([
            'date_of_admission'        => $secondDate->toDateString(),
            'actual_date_of_discharge' => null,
            'facility'                 => $user->facility
        ]);


        $manDays = Resident::calculateManDaysForMonth($firstDate->month);


        self::assertEquals(91, $manDays);
    }

    public function it_should_calculate_man_days_for_current_month()
    {
        $user = factory(User::class)->create([
            'facility' => 'Demo'
        ]);

        $this->actingAs($user);

        $admitDate   = Carbon::now()->subMonth()->firstOfMonth()->toDateString();
        $releaseDate = Carbon::now()->addDay()->toDateString();
        factory(Resident::class)->create([
            'date_of_admission'        => $admitDate,
            'actual_date_of_discharge' => $releaseDate,
            'facility'                 => $user->facility
        ]);

        $manDays = Resident::calculateManDaysForMonth(Carbon::now()->month);


        self::assertEquals(1, $manDays);

    }

}