@extends('layouts.main')

@section('title')
    {{ $resident->last_name }}, {{ $resident->first_name }} {{ $resident->middle_initial }}
    <p><small>{{ $resident->document_number }}</small></p>
@endsection

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column">
                <p><strong>Sex: </strong>{{ $resident->sex }}</p>
                <p><strong>Race: </strong>{{ $resident->race }}</p>
                <p><strong>Service Center #: </strong>{{ $resident->service_center_number }}</p>
                <p><strong>DOB: </strong>{{ $resident->dob }}</p>
                <p><strong>Age: </strong>{{ $resident->age }}</p>
                <p><strong>Drug of choice: </strong>{{ $resident->drug }}</p>
                <p><strong>Date of admission: </strong>{{ $resident->date_of_admission }}</p>
                <p><strong>Projected date of discharge: </strong>{{ $resident->projected_date_of_discharge }}</p>
                <p><strong>Acutal date of discharge: </strong>{{ $resident->actual_date_of_discharge }}</p>
                <p><strong>Status: </strong>{{ $resident->status }}</p>
                <p><strong>Status at discharge: </strong>{{ $resident->status_at_discharge }}</p>
                <p><strong>Treatment level placement: </strong>{{ $resident->treatment_level_placement }}</p>
                <p><strong>Counselor: </strong>{{ $resident->counselor }}</p>
                <p><strong>Program level: </strong>{{ $resident->program_level }}</p>
                <p><strong>Employment date: </strong>{{ $resident->employment_date }}</p>
                <p><strong>Payment method: </strong>{{ $resident->payment_method }}</p>
                <p><strong>Referral source: </strong>{{ $resident->referral_source }}</p>

            </div>
        </div>
    </div>
@endsection