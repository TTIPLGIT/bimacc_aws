@extends('layouts.basic')
@section('content')


<div class="limiter">

  <div style="width:36%; float:left;">
        
                <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
                    @csrf                
                    <div class="login100-form-avatar">
                        <h1 class="bold">Online Arbitration Systems</h1>
                    </div>
                    <div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
                        <div>
                            <h1 class="boldnew">LOGIN</h1>
                        </div>
                        <input id="email" type="email" class="input100 form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="example@email.com" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        <!-- <input class="input100" type="text" name="username" placeholder="Username"> -->
                    </div>

                    <div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
                        <input id="password" type="password" class="input100 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required  placeholder="Password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                <span class="symbol-input100">
                                    <i class="fa fa-eye"></i>
                                </span>
                        <!-- <input class="input100" type="password" name="pass" placeholder="Password"> -->
                    </div>

                    <div class="m-t-15">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="rememberme" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>

                    <div class="container-login100-form-btn p-t-10">
                        <button type="submit" class="login100-form-btn">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="text-center w-full p-t-25 p-b-0 txt1 btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Password!') }}
                                    </a>
                                @endif
                    </div>
                </form>
            
  </div>
  <div class="container-login100" style="width:64%; float:right;">
      <img src="images/arbitration_login4.jpg" style="border-radius: 30% 30% 30% 20%";  class="loginimg">
  </div>
    <div style="width: 100%">
        <div style="width: 50%; float: left;">
           <img src="images/logo1.png"  class="footimg" style="width: 180px; height:80px; "> 
        </div>
        <div class="footercredits">
            <a href="{{url('privacypolicy')}}">Privacy policy</a> 
            <p>&nbsp;&nbsp;|&nbsp;&nbsp;</p> 
            <a href="">Help</a> 
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <i class="fa fa-copyright"></i><p>2019 BIMACC. All Rights Reserved.</p>
            
        </div>
        
    </div>

    </div>


@endsection
