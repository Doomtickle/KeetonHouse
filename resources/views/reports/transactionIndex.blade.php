@extends('layouts.reports')

@section('title')
    Master Transaction Report
@endsection

@section('content')
    <div class="column wide-table">
        <table class="table">
            <thead>
            <tr>
                <th>Transaction ID</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Date</th>
                <th>Reason</th>
                <th>Debit</th>
                <th>Credit</th>
            </tr>
            </thead>
            <tbody>
            @foreach($transactions as $transaction)
                <tr class="has-text-centered">
                    <td>{{ $transaction->id }}</td>
                    <td><a href="/resident/{{ $transaction->resident_id }}" class="blackish">{{ App\Resident::find($transaction->resident_id)->last_name }}</a></td>
                    <td><a href="/resident/{{ $transaction->resident_id }}" class="blackish">{{ App\Resident::find($transaction->resident_id)->first_name }}</a></td>
                    <td>{{ $transaction->date }}</td>
                    <td>{{ $transaction->reason }}</td>
                    <td><span class="debit is-danger"> - ${{ $transaction->debit }}</span></td>
                    <td><span class="credit is-success"> + ${{ $transaction->credit }}</span></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

