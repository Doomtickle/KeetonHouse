<?php

namespace App\Http\Controllers;

use App\Resident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResidentController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $residents = DB::table('residents')->where('facility', \Auth::user()->facility)->orderBy('last_name')->get();

        return view('residents.index', compact('residents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('residents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'last_name'                   => 'required',
            'first_name'                  => 'required',
            'middle_initial'              => 'required',
            'email'                       => '',
            'sex'                         => 'required',
            'race'                        => 'required',
            'document_number'             => 'required',
            'service_center_number'       => 'required',
            'dob'                         => 'required',
            'age'                         => 'required',
            'drug'                        => '',
            'date_of_admission'           => 'required',
            'projected_date_of_discharge' => 'required',
            'status'                      => 'required',
            'counselor'                   => 'required',
            'program_level'               => 'required',
            'payment_method'              => 'required',
            'referral_source'             => 'required',
        ]);
        $resident = Resident::create($request->all());

        return "Success";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Resident $resident
     * @return \Illuminate\Http\Response
     */
    public function show(Resident $resident)
    {
        $resident = Resident::with('notes', 'transactions')->find($resident->id);

        return view('residents.show', compact('resident'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Resident $resident
     * @return \Illuminate\Http\Response
     */
    public function edit(Resident $resident)
    {
        return view('residents.edit', compact('resident'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Resident $resident
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resident $resident)
    {
        $this->validate($request, [

            'last_name'                   => 'required',
            'first_name'                  => 'required',
            'middle_initial'              => 'required',
            'email'                       => '',
            'sex'                         => 'required',
            'race'                        => 'required',
            'document_number'             => 'required',
            'service_center_number'       => 'required',
            'dob'                         => 'required',
            'age'                         => 'required',
            'drug'                        => '',
            'date_of_admission'           => 'required',
            'projected_date_of_discharge' => 'required',
            'status'                      => 'required',
            'counselor'                   => 'required',
            'program_level'               => 'required',
            'payment_method'              => 'required',
            'referral_source'             => 'required',
        ]);

        $resident->update($request->all());

        return redirect()->action('HomeController@index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Resident $resident
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resident $resident)
    {
        //
    }
}
