@extends('layouts.main')

@section('title')
    Substance Abuse Program Monthly Performance Report
@endsection

@section('content')
    <div class="container">
        @if(! empty(App\FacilityInfo::where('facility_name', \Auth::user()->facility)->first()))
            <div class="columns">
                <div class="column is-full">
                    <div class="notification is-default intro">
                        Select your the month for your report.
                    </div>
                </div>
            </div>
    </div>
    <div class="container is-flex trans_select_form">
        <div class="columns full-width-columns">
            <form action="" method="post" id="invoice-form">
                {{ csrf_field() }}
                <input type="hidden" id="facility" name="facility" value="{{ \Auth::user()->facility }}">
                <div class="column is-5">
                    <div class="field padding-10-lr first">
                        <label class="label">Month</label>
                        <p class="control">
                        <span class="select is-large">
                        <select id="invoice_date" name="date">
                            @for($i = 1; $i < 15; $i++)
                                <option value="/{{ Carbon\Carbon::now()->subMonths($i)->year}}/{{ Carbon\Carbon::now()->subMonths($i)->month}}">
                                    {{ Carbon\Carbon::now()->subMonths($i)->format('F, Y') }}
                                </option>
                            @endfor
                        </select>
                    </span>
                        </p>
                    </div>
                </div>
                <button type="submit" class="button is-primary" id="reportSubmit">Generate Invoice</button>
            </form>
        </div>
        @else
            <div class="container">
                <div class="columns">
                    <div class="column">
                        <div class="notification is-danger">
                            Before you can create an invoice, you have to update your facility information in the
                            "Facility
                            Settings" page on the left.
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('scripts.footer')
    <script>
        $(document).ready(function () {
            $("#invoice_date").select2();
            $('#reportSubmit').on('click', function (e) {
                e.preventDefault();
                var form = $(this).closest('form');
                var facility = $("#facility").val();
                console.log(facility)
                var reportDate = $("#invoice_date").val();
                form.attr('action', '/invoice/' + facility + reportDate).submit();
            });
        });
    </script>
@endsection

