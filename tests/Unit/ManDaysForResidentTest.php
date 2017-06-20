<?php

namespace Tests\Unit;

use App\Resident;
use App\User;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ManDaysForResident extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_should_calculate_a_residents_man_days_for_a_specified_month()
    {
        $user = factory(User::class)->create([
            'facility' => 'Demo'
        ]);

        $this->actingAs($user);

        $admit  = Carbon::create(2016, 12, 20, 12)->toDateString();
        $release = Carbon::create(2017, 6, 9, 12)->toDateString();

        $resident = factory(Resident::class)->create([
            'date_of_admission'        => $admit,
            'actual_date_of_discharge' => $release,
            'facility'                 => $user->facility
        ]);

        $manDays = Resident::calculateManDaysForMonth(2017, 4, $resident);

        self::assertEquals(30, $manDays);
    }

    /** @test */
    public function it_should_calculate_a_residents_man_days_for_the_current_month()
    {
        $user = factory(User::class)->create([
            'facility' => 'Demo'
        ]);

        $currentDayOfMonth = Carbon::now()->day;

        $this->actingAs($user);

        $admit  = Carbon::create(2017, 1, 1, 12)->toDateString();

        $resident = factory(Resident::class)->create([
            'date_of_admission'        => $admit,
            'actual_date_of_discharge' => null,
            'facility'                 => $user->facility
        ]);

        $manDays = Resident::calculateManDaysForCurrentMonth($resident);

        self::assertEquals($currentDayOfMonth, $manDays);
    }

}