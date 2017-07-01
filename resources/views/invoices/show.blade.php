@extends('layouts.invoice')

@section('title')
    Substance Abuse Residential Program Monthly Performance Report - {{ $invoiceMonth }}
@endsection

@section('downloadButton')
    <button class="button is-warning" onClick="window.print()">Print</button>
@endsection

@section('content')
    <div class="column">
        <div class="columns">
            <div class="column is-10" style="margin-top:30px;">
                <table class="table is-striped is-bordered">
                    <tr>
                        <td><strong>Contractor Name</strong></td>
                        <td>{{ $facilityInfo->contractor_name }}</td>
                    </tr>
                    <tr>
                        <td><strong>Mailing Address</strong></td>
                        <td>{!! nl2br($facilityInfo->street_address) !!}</td>
                    </tr>
                    <tr>
                        <td><strong>FEIN#:</strong></td>
                        <td>{{ $facilityInfo->fein_number }}</td>
                    </tr>
                    <tr>
                        <td><strong>Contract Number</strong></td>
                        <td>{{ $facilityInfo->contract_number }}</td>
                    </tr>
                    <tr>
                        <td><strong>Invoice #:</strong></td>
                        <td>{{ $invoiceNumber }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="columns">
            <div class="column is-10">
                <table class="table is-striped is-bordered" style="margin-bottom:-10px;">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>DC#</th>
                        <th>Offender Name</th>
                        <th>Entry Date</th>
                        <th>ERC Entry Date</th>
                        <th>Exit Date</th>
                        <th>Discharge Code</th>
                        <th>Bed Days</th>
                        <th>Total Per Diem</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($residents as $resident)
                        <tr class="has-text-centered">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $resident->document_number }}</td>
                            <td>{{ $resident->last_name }}, {{ $resident->first_name }}</td>
                            <td>{{ $resident->date_of_admission }}</td>
                            <td>{{ \Carbon\Carbon::parse($resident->date_of_admission)->addMonths(2)->toDateString() }}</td>
                            <td>{{ $resident->actual_date_of_discharge }}</td>
                            <td>
                                @if($resident->status_at_discharge == 'Administrative')
                                    A
                                @elseif($resident->status_at_discharge == 'Successful')
                                    S
                                @elseif(preg_match('/Unsuccessful*/', $resident->status_at_discharge))
                                    U
                                @endif
                            </td>
                            <td>{{ App\Resident::calculateManDaysForMonth($year, $month, $resident) }}</td>
                            <td>
                                ${{ number_format($facilityInfo->per_diem * App\Resident::calculateManDaysForMonth($year, $month, $resident), 2, '.', ',') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="column is-10">
            <table class="table is-striped is-bordered">
                <tr>
                    <td class="has-text-right">Total days in month:</td>
                    <td class="has-text-right">{{ \Carbon\Carbon::create($year, $month)->daysInMonth }}</td>
                </tr>
                <tr>
                    <td class="has-text-right">Maximum annualized bed days</td>
                    <td class="has-text-right">{{ $facilityInfo->max_annual_bed_days }}</td>
                </tr>
                <tr>
                    <td class="has-text-right">Bed days used fiscal year-to-date</td>
                    <td class="has-text-right">{{ $manDaysFY }}</td>
                </tr>
                <tr>
                    <td class="has-text-right">Occupied bed days for billing month</td>
                    <td class="has-text-right">{{ $totalBedDaysForMonth }}</td>
                </tr>
                <tr>
                    <td class="has-text-right">Per Diem Billing Rate</td>
                    <td class="has-text-right">${{ $facilityInfo->per_diem }}</td>
                </tr>
                <tr>
                    <td class="has-text-right total">Total</td>
                    <td class="has-text-right total">
                        ${{ number_format($facilityInfo->per_diem * $totalBedDaysForMonth , 2, '.', ',') }}</td>
                </tr>
            </table>
        </div>
        <div class="columns">
            <div class="column">
                Authorized Signature ________________________________________
            </div>
            <div class="column">
                Date _______________________________________________
            </div>
        </div>
        <hr>
        <div class="columns">
            <div class="column">
                Verified By <p> _______________________________________________</p>
            </div>
            <div class="column">
                Printed Name <p>_______________________________________________</p>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                Title <p>_______________________________________________</p>
            </div>
        </div>
    </div>
@endsection
