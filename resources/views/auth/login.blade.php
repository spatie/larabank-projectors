@extends('layouts.app')

@section('content')

    <div>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <label for="email">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                           name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div>
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div>
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

            <div>
                <button type="submit">
                    {{ __('Login') }}
                </button>
            </div>

        </form>
    </div>
@endsection
