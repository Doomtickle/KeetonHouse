@extends('layouts.main')

@section('title')
    Dashboard
@endsection

@section('content')
    <section class="hero is-small">
        <!-- Hero content: will be in the middle -->
        <!-- Hero footer: will stick at the bottom -->
        <div class="hero-foot">
            <div class="level">
                <div class="level-item has-text-centered">
                    <div class="column">
                        <p class="heading">Residents</p>
                        <p class="title">{{ App\Resident::all()->count() }}</p>
                    </div>
                </div>
                <div class="level-item has-text-centered">
                    <div class="column">
                        <p class="heading">Current Balance</p>
                        <p class="title green">${{ number_format(App\Transaction::all()->sum('credit') - App\Transaction::all()->sum('debit'), 2, '.', ',') }}</p>
                    </div>
                </div>
                <div class="level-item has-text-centered">
                    <div class="column">
                        <p class="heading">Due this week</p>
                        <p class="title">$2560</p>
                    </div>
                </div>
            </div>
            <h1 class="title has-text-centered">
                More content will go here soon
            </h1>
        </div>
    </section>
@endsection