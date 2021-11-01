@extends('layouts.app')
@section('title')
    Update your information
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="box s_cont">
            <h1>{{ __('Update') }} <i class="fa fa-snowflake-o"></i></h1><br>
            <form method="post" action="{{route('updateinfo', $user->id)}}">
            {{ csrf_field() }}
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$user->email}}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror " required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div> 
                <button type="submit" name="update">Update</button>
            </form>
        </div>
    </div>

@endsection
