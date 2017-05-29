@extends('layouts.main')

@section('title')
    Ledger
@endsection

@section('content')
    <div class="container">
        <h2 class="title">{{ $residentInfo->last_name }}, {{ $residentInfo->first_name }}</h2>
        <hr>
        @include('partials.createTransactionForm')
        <hr>
        <div class="column">
            <table class="table">
                <thead>
                <tr>
                    <th>Transaction #</th>
                    <th>Date</th>
                    <th>Reason</th>
                    <th>Debit</th>
                    <th>Credit</th>
                </tr>
                </thead>
                <tbody>
                @foreach($residentInfo->transactions as $transaction)
                    <tr class="has-text-centered">
                        <th>{{ $transaction->id}}</th>
                        <td>{{ Carbon\Carbon::parse($transaction->date)->format('F d, Y') }}</td>
                        <td>{{ $transaction->reason }}</td>
                        @if($transaction->debit > 0)
                            <td class="debit"> - ${{ number_format($transaction->debit / 100, 2, '.', ',') }}</td>
                        @else
                            <td>&nbsp;</td>
                        @endif
                        @if($transaction->credit > 0)
                            <td class="credit">${{ number_format($transaction->credit / 100, 2, '.', ',') }}</td>
                        @else
                            <td>&nbsp;</td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
            <hr>
            <p class="column is-offset-three-quarters is-2 has-text-right">
                @php
                    $balanceColor = 'debit';
                    $currentBalance = $residentInfo->transactions()->sum('credit') / 100 - $residentInfo->transactions()->sum('debit') / 100;
                    if($currentBalance > 0)
                        $balanceColor = 'credit';
                @endphp
                <strong>Current Balance:</strong>
                <span class="{{ $balanceColor }}">${{ number_format($currentBalance, 2, '.', ',') }}</span>
            </p>
        </div>
    </div>
@endsection
@section('scripts.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#debit").maskMoney({
                'prefix': '$',
                'allowZero': true,
            });
            $("#credit").maskMoney({
                'prefix': '$',
                'allowZero': true,
            });
        });
    </script>
@endsection
