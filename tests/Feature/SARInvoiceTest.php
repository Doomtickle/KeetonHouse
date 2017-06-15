<?php

namespace Tests\Feature;

use App\FacilityInfo;
use App\Resident;
use App\User;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SARInvoiceTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_should_have_an_invoice_select_page()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);

        $response = $this->get('/invoice/select');

        $response->assertStatus(200);

    }

    /** @test */
    public function it_should_generate_an_invoice()
    {
        factory(FacilityInfo::class)->create();

        $user = factory(User::class)->create([
            'facility' => 'Demo'
        ]);

        $this->actingAs($user);

        $admitDate   = Carbon::create(2017, 2, 1)->toDateString();
        $releaseDate = Carbon::create(2017, 2, 10)->toDateString();

        $resident = factory(Resident::class)->create([
            'date_of_admission'        => $admitDate,
            'actual_date_of_discharge' => $releaseDate,
            'facility'                 => 'Demo'
        ]);

        $response = $this->post('/invoice/' . $resident->facility . '/2017/2');

        $response->assertStatus(200);
        $response->assertSeeText($resident->last_name);
    }

}
