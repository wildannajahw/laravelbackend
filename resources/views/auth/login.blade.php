@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6" style="border-right: solid 2px; border-color:#bf9b30">
            <h3>LOGIN</h3>
            <h4>Already have an account?</h4>
            <form method="POST" action="{{ route('login') }}">
              @csrf

                <div class="form-group d-flex justify-content-center">


                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                    <br>
                    @if ($errors->has('email'))

                        <span class="invalid-feedback" role="alert" style="width:100%;">
                            <br>
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>

                    @endif

                </div>
                <div class="form-group d-flex justify-content-center">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      <label class="form-check-label" for="remember">
                          {{ __('Remember Me') }}
                      </label>
                      @if (Route::has('password.request'))
                          <a href="{{ route('password.request') }}" class="passfor mr-auto">Forgot password?</a>
                      @endif
                  </div>
                  <button type="submit" class="btn" >Login</button>
            </form>
        </div>
        <div class="col-sm-6">
            <h3 style="margin-top:10%">New To HolyShirt?</h3>
            <h4>Let's get you started with a HolyShirt.</h4>
            <a href="{{ route('register') }}" style="text-decoration:none">  <button type="button" class="btn">Get started</button></a>
        </div>
    </div>
</div>
@endsection
