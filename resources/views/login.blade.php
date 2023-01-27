@extends('layouts.guest')
@section('guest')

<style>
/*
over-ride "Weak" message, show font in dark grey
*/

.progress-bar {
color: #333;
}

/*
Reference:
http://www.bootstrapzen.com/item/135/simple-login-form-logo/
*/

* {
-webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
        box-sizing: border-box;
outline: none;
}

.form-control {
position: relative;
font-size: 16px;
height: auto;
padding: 10px;

}

body {

background: url(../images/main/bgagdao.jpeg) repeat bottom center fixed ;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
}

.login-form {
margin-top: 60px;
}
#pwd-container{

    display: flex;
    justify-content: center;
    align-items: center;
}

form[role=login] {
color: #5d5d5d;
background: white;
padding: 26px;
border-radius: 10px;
-moz-border-radius: 10px;
-webkit-border-radius: 10px;
}
form[role=login] img {
display: block;
margin: 0 auto;
margin-bottom: 35px;
height: 90px;
}
form[role=login] input,
form[role=login] button {
font-size: 18px;
margin: 16px 0;
}
form[role=login] > div {
text-align: center;
}

.form-links {
text-align: center;
margin-top: 1em;
margin-bottom: 50px;
}
.form-links a {
color: #fff;
}

</style>

<div class="container">
    <div class="row" id="pwd-container">
     <div class="col-md-6">
        <section class="login-form">
            @error('credential')<small class="text-red-600 text-center">{{ $message }}</small>@enderror
            <form method="POST" action="{{ route('guest.authenticate') }}" role="login">
                @csrf
             <img src="../img/agdaologo.jpg" height="25px" class="img-responsive" alt="" />

            <input type="email" name="email" placeholder="Username"  class="form-control input-lg" />
            @error('email')<p style="color:red;">{{ $message }}</p>@enderror
            <input type="password" name="password" class="form-control input-lg" id="password" placeholder="Password"   />
            @error('password')<p style="color:red;">{{ $message }}</p>@enderror
            <div class="pwstrength_viewport_progress"></div>



            <button type="submit" name="btnLogin" class="btn btn-lg btn-primary btn-block">Login</button>
            <div> <a href="{{ route('guest.home') }}">Back</a></div>


            <!-- <div>
              <a href="#">Create account</a> or <a href="#">reset password</a>
            </div>
             -->
          </form>

          <div class="form-links">
            <!-- <a href="#">www.website.com</a> -->
          </div>
        </section>
        </div>
    </div>
  </div>

@endsection
