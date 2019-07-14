@extends('layouts.app')

@section('content')
<div class="wrapper wrapper--w790">
    <div class="card card-5">
        <div class="card-heading">
            <h2 class="title">LOGIN</h2>
                </div>
                <div class="card-body">
                @isset($url)
                    <form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
                    @else
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @endisset
                        @csrf

        <div class="form-row space">
        <div class="name">No ID</div>
            <div class="value">
                <div class="input-group-desc">
                                <input id="email" type=text class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </div>

        <div class="form-row space">
        <div class="name">Password</div>
            <div class="value">
                <div class="input-group-desc">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </div>
             <div class="row">
                <div class="col-md-4"></div>
			        <div class="form-group" col-md-4>
                        <button type="submit" class="btn btn-success" style="margin-left:38px">Login</button>
                </div>
                    </div>
                        </form>
                            </div>
@endsection
