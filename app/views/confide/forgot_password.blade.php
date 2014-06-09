@extends('layouts.scaffold')

@section('main')


<div class="row">
 
<div class="offset4 span4">



  <div class="box gray-box confide">
    @if ( Session::get('error') )
        <div class="alert alert-error">{{{ Session::get('error') }}}</div>
    @endif

    @if ( Session::get('notice') )
        <div class="alert">{{{ Session::get('notice') }}}</div>
    @endif


   <legend>
    Forgot Password
  </legend>


<form method="POST" action="{{ (Confide::checkAction('UserController@do_forgot_password')) ?: URL::to('/user/forgot') }}" accept-charset="UTF-8">

 <fieldset>

    <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">

    <label for="email">{{{ Lang::get('confide::confide.e_mail') }}}</label>
    <div class="input-append">
        <input placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">

        <input class="btn" type="submit" value="{{{ Lang::get('confide::confide.forgot.submit') }}}">
    </div>


    </fieldset>
</form>
</div>
</div>
</div>

@stop