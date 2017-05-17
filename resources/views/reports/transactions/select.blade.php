@extends('layouts.main')

@section('title')
    Select report
@endsection

@section('content')
    <form action="/transaction_report/run" method="post" id="reportForm">
        {{ csrf_field() }}
        <select id="resident" name="resident_id">
            <option value="">All</option>
            @foreach($residents as $resident)
                <option value="{{ $resident->id }}">{{ $resident->last_name }}, {{ $resident->first_name }}</option>
            @endforeach
        </select>
        <select id="month" name="date">
            <option value="">All</option>
            @for($i = 1; $i < 14; $i++)
                <option value="{{ Carbon\Carbon::now()->subMonths($i)->toDateString() }}">
                    {{ Carbon\Carbon::now()->subMonths($i)->format('F, Y') }}
                </option>
            @endfor

        </select>
        <button type="submit" class="button is-primary" id="reportSubmit">Run report</button>
    </form>

@endsection