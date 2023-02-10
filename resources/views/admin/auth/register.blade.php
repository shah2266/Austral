@extends('admin.layouts.master')

@section('title')
Register
@endsection

@section('currentPage')
Register
@endsection

@section('content')
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Register</h3>
        <div class="box-tools pull-right">
            <span class="btn btn-box-tool">
                <span class="pull-right"><a href="{{ url('/controlpanel/admin/register/manage') }}"
                        class="label bg-blue color-palette p__8 f__size__13">Back to user page <i
                            class="fa fa-mail-reply"></i></a></span>
            </span>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
            <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                        name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('Number') }}</label>

                <div class="col-md-6">
                    <input id="number" type="text" class="form-control{{ $errors->has('number') ? ' is-invalid' : '' }}"
                        name="number" value="{{ old('number') }}" required autofocus>

                    @if ($errors->has('number'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('number') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                        name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password"
                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                        required>

                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm"
                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-success btn-lg">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>
            </div>
        </div>
        
    </div>
</div>

@endsection
