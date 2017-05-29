@extends('layouts.main')

@section('title')
    {{ $resident->last_name }}, {{ $resident->first_name }} {{ $resident->middle_initial }}
    <p class="subtitle">
        <small>DOC Number: {{ $resident->document_number }}</small>
    </p>
@endsection

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column padding-40">
                <div class="box is-flex single-resident-attributes">
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
                    <p><strong>Counselor: </strong>{{ $resident->counselor }}</p>
                    <p><strong>Program level: </strong>{{ $resident->program_level }}</p>
                    <p><strong>Employer: </strong>{{ $resident->employer }}</p>
                    <p><strong>Employment date: </strong>{{ $resident->employment_date }}</p>
                    <p><strong>Payment method: </strong>{{ $resident->payment_method }}</p>
                    <p><strong>Referral source: </strong>{{ $resident->referral_source }}</p>
                </div>

            </div>
        </div>
        <hr>
        <h2 class="title">Payment Arrangements</h2>
        <div class="columns">
            <div class="column is-full">
                <form action="{{ route('note.store') }}" method="POST" id="new-note">
                    <div class="columns">
                        {{ csrf_field() }}
                        <input type="hidden" name="resident_id" value="{{ $resident->id }}">
                        <input type="hidden" name="updated_by" value="{{ \Auth::user()->id }}">
                        <div class="column is-2">
                            <label class="label">Date</label>
                            <p class="control">
                                <input class="input" type="text" name="date" id="note-date">
                            </p>
                        </div>
                        <div class="column is-5">
                            <label class="label">Note</label>
                            <p class="control">
                                <textarea class="textarea" name="note" id="note"></textarea>
                            </p>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column is-7">
                            <button class="button is-info is-pulled-right" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <hr>
        <table class="table" style="table-layout: fixed; max-width: 90%;">
            <thead>
            <tr>
                <th>Date</th>
                <th>Note</th>
                <th style="text-align:right;">Updated By</th>
            </tr>
            </thead>
            <tbody id="transaction-table-body">
            @foreach($resident->notes as $note)
                <tr>
                    <td>{{ $note->date }}</td>
                    <td style="word-wrap: break-word;">{{ $note->note }}</td>
                    <td style="text-align:right;">{{ App\User::find($note->updated_by)->name }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <hr>
        <h2 class="title">Transactions</h2>
        <p class="subtitle">Create a new transaction record by completing the form below.</p>
        <section class="section">
            @include('partials.createTransactionFormShow')
        </section>
        <div class="column">
            <section class="section">
                <p class="subtitle notification is-info">Below is a list of all transactions
                    for {{ $resident->first_name }} {{ $resident->last_name }}</p>
                <table id="transaction-table" class="table">
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
                    @foreach($resident->transactions as $transaction)
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
            </section>
            <hr>
            <p class="column is-offset-three-quarters is-2 has-text-right">
                @php
                    $balanceColor = 'debit';
                    $currentBalance = $resident->transactions()->sum('credit') / 100 - $resident->transactions()->sum('debit') / 100;
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
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
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
            $('.table').DataTable();
        });
    </script>
@endsection
