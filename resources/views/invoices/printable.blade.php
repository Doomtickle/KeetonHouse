@extends('layouts.printable')

@section('content')
    <div class="page-break">
        <style>
            *{
                font-family:Arial, sans-serif;
            }
        </style>
        <table style="width:80%; margin:50px auto 0">
            <tr>
                <td style="border:1px solid #000; padding:5px;" class="has-text-centered"><strong>SUBSTANCE ABUSE
                        RESIDENTIAL MONTHLY PROGRAM INVOICE</strong></td>
            </tr>
            <tr>
                <td style="border:1px solid #000; padding:5px;"><strong>Contractor
                        Name</strong>: {{ $facilityInfo->contractor_name }}</td>
            </tr>
            <tr>
                <td style="border:1px solid #000; padding:5px;"><strong>Mailing
                        Address</strong>: {!! nl2br($facilityInfo->street_address) !!}</td>
            </tr>
            <tr>
                <td style="border:1px solid #000; padding:5px;">
                    <strong>FEIN#:</strong> {{ $facilityInfo->fein_number }}
                </td>
            </tr>
        </table>
        <table style="width:80%; margin:0 auto;">
            <tr>
                <td style="border:1px solid #000; width:45%; padding:5px;"><strong>Contract
                        Number</strong>: {{ $facilityInfo->contract_number }} </td>
                <td style="border:1px solid #000; padding-left:20px; padding-top:5px; padding-bottom:5px;"><strong>Invoice
                        #:</strong> {{ $invoiceNumber }}</td>
            </tr>
        </table>
        <table style="margin:10px auto; width:80%;">
            <tr>
                <td style="border:1px solid #000; padding:5px;"><strong>BILLING INVOICE FOR (MONTH AND
                        YEAR): {{ Carbon\Carbon::create($year, $month)->format('F Y') }}</strong></td>
            </tr>
        </table>
        <table style="margin:0 auto; width:80%">
            <td style="border:1px solid #000; text-align: right; padding:5px;"><strong>Total of Days in Month:</strong>
            </td>
            <td style="border:1px solid #000; text-align: center; padding:5px;">{{ \Carbon\Carbon::create($year, $month)->daysInMonth }}</td>
            </tr>
            <tr>
                <td style="border:1px solid #000; text-align: right; padding:5px;"><strong>Maximum Number of Annualized
                        Bed
                        Days:</strong></td>
                <td style="border:1px solid #000; text-align: center; padding:5px;">{{ $facilityInfo->max_annual_bed_days }}</td>
            </tr>
            <tr>
                <td style="border:1px solid #000; text-align: right; padding:5px;"><strong>*Cumulative Bed Days Used
                        Fiscal
                        Year-to-Date (through last day of prior billing
                        month):</strong></td>
                <td style="border:1px solid #000; text-align: center; padding:5px;">{{ $manDaysFY }}</td>
            </tr>
            <tr>
                <td style="border:1px solid #000; text-align: right; padding:5px;"><strong>Billing Month Occupied Bed
                        Days</strong></td>
                <td style="border:1px solid #000; text-align: center; padding:5px;">{{ $totalBedDaysForMonth }}</td>
            </tr>
            <tr>
                <td style="border:1px solid #000; text-align: right; padding:5px;"><strong>Per Diem Billing
                        Rate</strong>
                </td>
                <td style="border:1px solid #000; text-align: center; padding:5px;">${{ $facilityInfo->per_diem }}</td>
            </tr>
            <tr>
                <td style="border:1px solid #000; text-align: right; padding:5px;"><strong>Billing Month Occupied Bed
                        Days x
                        Per Diem Billing Rate = TOTAL INVOICE:</strong></td>
                <td style="border:1px solid #000; text-align: center; padding:5px;">
                    ${{ number_format($facilityInfo->per_diem * $totalBedDaysForMonth , 2, '.', ',') }}</td>
            </tr>
            <tr style="border:1px solid #000;">
                <td style="padding-top:200px;">* Fiscal Year runs July 1st through the following June 30.</td>
                <td>&nbsp;</td>
            </tr>
        </table>
    </div>
    <div class="columns" style="margin:35px 10px 0;">
        <div class="column">
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
                        <td>{{ \Carbon\Carbon::parse($resident->date_of_admission)->format('m-d-Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($resident->date_of_admission)->addMonths(2)->format('m-d-Y') }}</td>
                        <td>@if($resident->actual_date_of_discharge != null)
                            {{ \Carbon\Carbon::parse($resident->actual_date_of_discharge)->format('m-d-Y') }}
                        </td>
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
@endsection
