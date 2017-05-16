@extends('layouts.reports')

@section('title')
    Report sorted by {{ $sortType }}
@endsection

@section('downloadButton')
    <a href="{{ $downloadLink }}" class="button is-primary">Download to Excel</a>
@endsection

@section('content')
    <div class="column wide-table">
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Middle Initial</th>
                <th>Sex</th>
                <th>Race</th>
                <th>Document Number</th>
                <th>Service Center Number</th>
                <th>DOB</th>
                <th>Age</th>
                <th>Drug of Choice</th>
                <th>Date of Admission</th>
                <th>Projected Date of Discharge</th>
                <th>Actual Discharge</th>
                <th>Status</th>
                <th>Status at discharge</th>
                <th>Treatment Level Placement</th>
                <th>Counselor</th>
                <th>Program Level</th>
                <th>Employment Date</th>
                <th>Payment Method</th>
                <th>Referral Source</th>
            </tr>
            </thead>
            <tbody>
            @foreach($residents as $resident)
                <tr class="has-text-centered">
                    <td>{{ $resident->id }}</td>
                    <td><a href="/resident/{{ $resident->id }}" class="blackish">{{ $resident->last_name }}</a></td>
                    <td>{{ $resident->first_name }}</td>
                    <td>{{ $resident->middle_initial }}</td>
                    <td>{{ $resident->sex }}</td>
                    <td>{{ $resident->race }}</td>
                    <td>{{ $resident->document_number }}</td>
                    <td>{{ $resident->service_center_number }}</td>
                    <td>{{ $resident->dob }}</td>
                    <td>{{ $resident->age }}</td>
                    <td>{{ $resident->drug }}</td>
                    <td>{{ $resident->date_of_admission }}</td>
                    <td>{{ $resident->projected_date_of_discharge }}</td>
                    <td>{{ $resident->actual_date_of_discharge }}</td>
                    <td>{{ $resident->status }}</td>
                    <td>{{ $resident->status_at_discharge }}</td>
                    <td>{{ $resident->treatment_level_placement }}</td>
                    <td>{{ $resident->counselor }}</td>
                    <td>{{ $resident->program_level }}</td>
                    <td>{{ $resident->employment_date }}</td>
                    <td>{{ $resident->payment_method }}</td>
                    <td>{{ $resident->referral_source }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

