@extends('layouts.main')

@section('title')
    Dashboard
@endsection

@section('content')
    <section class="hero is-small">
        <!-- Hero content: will be in the middle -->
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Admin Dashboard
                </h1>
            </div>
        </div>
        <!-- Hero footer: will stick at the bottom -->
        <div class="hero-foot">
            <div class="level">
                <div class="level-item has-text-centered">
                    <div class="column">
                        <p class="heading">Residents</p>
                        <p class="title">56</p>
                    </div>
                </div>
                <div class="level-item has-text-centered">
                    <div class="column">
                        <p class="heading">Totoal Debits</p>
                        <p class="title">$123</p>
                    </div>
                </div>
                <div class="level-item has-text-centered">
                    <div class="column">
                        <p class="heading">Due this week</p>
                        <p class="title">$560</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection