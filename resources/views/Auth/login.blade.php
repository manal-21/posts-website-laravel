@extends('layouts/app')

@section('content')
    <div class="row">
        <div class="col s6 offset-s3">
            <div class="container">
                <div class="card-panel grey lighten-4">
                    <div class="row">
                        @if (session('status'))
                            <div class="container">
                                {{ session('status') }}
                            </div>
                            
                        @endif
                        <form class="col s12" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="email" id="email" type="email" class="validate" value="{{ old('email') }}">
                                    <label for="email" class="active">Email</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="password" id="password" type="password" class="validate">
                                    <label for="password" class="active">Password</label>
                                </div>
                            </div>
                            <p>
                                <label>
                                    <input type="checkbox" class="filled-in" checked="checked"  name="remember" id="remember"/>
                                    <span>Remember Me</span>
                                </label>
                            </p>
                            <div class="row center">
                                <button class="btn waves-effect waves-light" type="submit" name="action">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
        </div>
    </div>
@endsection