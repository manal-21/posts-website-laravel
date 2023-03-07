@extends('layouts/app')

@section('content')
    <div class="row">
        <div class="col s6 offset-s3">
            <div class="container">
                <div class="card-panel grey lighten-4">
                    <div class="row">
                        <form class="col s12" action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="input-field col s12">
                                    <input placeholder="" name="name" id="name" type="text" class="validate" value="{{ old('name') }}">
                                    <span class="helper-text red-text" data-error="@error('name') @enderror"></span>
                                    <label for="name" class="active">Name</label>

                                    @error('name')
                                        <span>
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input placeholder="" name="username" id="username" type="text" class="validate" value="{{ old('username') }}">
                                    <label for="username" class="active">Username</label>
                                </div>
                            </div>
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
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="password_confirmation" id="password_confirmation" type="password" class="validate">
                                    <label for="password" class="active">Password Again</label>
                                </div>
                            </div>
                            <div class="row center">
                                <button class="btn waves-effect waves-light" type="submit" name="action">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
        </div>
    </div>
@endsection