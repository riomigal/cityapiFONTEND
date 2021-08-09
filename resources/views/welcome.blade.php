@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">


                    <div class="card-body">
                        @auth
                            <p>Your api key is: {{ auth()->user()->api_key }}.
                                <br><br>
                                To use the api follow <a target="_blank" href="https://github.com/riomigal/cityapi">the
                                    instructions</a>. You have 100 free requests in the demo account.
                            @else
                            <p>Register an account or login to use the api</p>
                            <a href="{{ route('register') }}" class="btn btn-primary">{{ __('Register') }}</a>
                            <a href="{{ route('login') }}" class="btn btn-primary">{{ __('Login') }}</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
