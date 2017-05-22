@extends('layouts.main')

@section('title')
    Transaction reports
@endsection

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-full">
                <div class="notification is-default intro">
                    Select the resident, type of transaction, and month for your report. If you want to run a report
                    everything, just click "Run Report".
                </div>

            </div>
        </div>
    </div>
    <div class="container is-flex trans_select_form">
        <form action="/transaction_report/run" method="post" id="reportForm">
            {{ csrf_field() }}
            <div class="field is-horizontal">
                <div class="field padding-10-lr first">
                    <label class="label">Resident</label>
                    <p class="control">
                    <span class="select is-large">
                        <select id="transaction_resident" name="resident_id">
                            <option value="">All</option>
                            @foreach($residents as $resident)
                                <option value="{{ $resident->id }}">{{ $resident->last_name }}
                                    , {{ $resident->first_name }}</option>
                            @endforeach
                        </select>
                    </span>
                    </p>
                </div>
                <div class="field padding-10-lr">
                    <label class="label">Type</label>
                    <p class="control">
                    <span class="select is-large">
                        <select name="type" id="transaction_type">
                            <option value="">All</option>
                            <option value="Urinalysis">Urinalysis</option>
                            <option value="Rides">Rides</option>
                            <option value="Anger Management">Anger Management</option>
                            <option value="Physical">Physical</option>
                            <option value="Payment">Payment</option>
                            <option value="Sustenance">Sustenance</option>
                        </select>
                    </span>
                    </p>
                </div>
                <div class="field padding-10-lr last">
                    <p class="control">
                        <label class="label">Month</label>
                        <span class="select is-large">
                        <select id="transaction_date" name="date">
                            <option value="">All</option>
                            @for($i = 0; $i < 14; $i++)
                                <option value="{{ Carbon\Carbon::now()->subMonths($i)->toDateString() }}">
                                    {{ Carbon\Carbon::now()->subMonths($i)->format('F, Y') }}
                                </option>
                            @endfor
                        </select>
                    </span>
                    </p>
                </div>
            </div>
            <button type="submit" class="button is-primary" id="reportSubmit">Run report</button>
        </form>
    </div>

@endsection