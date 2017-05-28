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
                        <p class="title">{{ $residents->count() }}</p>
                    </div>
                </div>
                <div class="level-item has-text-centered">
                    <div class="column">
                        <p class="heading">Current Balance</p>
                        <p class="title">
                            ${{ $balance }}
                        </p>
                    </div>
                </div>
            </div>
            <hr>
            <section class="section">
                <h1 class="title has-text-centered">
                    More content will go here soon
                </h1>
            </section>
        </div>
    </section>
@endsection